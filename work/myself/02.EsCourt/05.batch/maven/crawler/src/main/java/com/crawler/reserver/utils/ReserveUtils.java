package com.crawler.reserver.utils;

import javax.persistence.EntityManager;
import javax.persistence.Persistence;

import com.crawler.Reserver;
import com.crawler.dao.impl.FrameDao;
import com.crawler.dao.impl.PasswordDao;
import com.crawler.dao.impl.UserDao;
import com.crawler.model.Administrator;
import com.crawler.model.Frame;
import com.crawler.model.Password;
import com.crawler.model.Reserve;
import com.crawler.model.User;

import com.crawler.utils.Constants;
import com.crawler.utils.enumurate.GOVERMENTID;

public class ReserveUtils {
	
	private static EntityManager em = Persistence.createEntityManagerFactory(Constants.persistenceName).createEntityManager();
	private static FrameDao frameDao = new FrameDao(em);
	private static UserDao userDao = new UserDao(em);
	private static PasswordDao passwordDao = new PasswordDao(em);
	
	
	public static Reserve doReserve(Integer userId, Integer frameId, Reserver reserver){
		Password password = getPassword(userId, frameId);
		if (password == null){
			return null;
		}
		
		FrameDao frameDao = new FrameDao(em);
		Frame frame = frameDao.get(frameId);
		if (frame == null){
			return null;
		}
		
		return doReserve(password, frame, reserver);
	}
	
	public static Reserve doReserve(Password password, Frame frame, Reserver reserver){
		
		reserver.setPassword(password);
		reserver.setFrame(frame);
		
		return reserver.crawle();
	}
	
	public static Password getPassword(Integer userId, Integer frameId){
		
		Frame frame = frameDao.get(frameId);
		if (frame == null){
			return null;
		}

		Administrator administrator = frame.getCourt().getFacility().getAdministrator();
		if (administrator == null){
			return null;
		}
		
		User user = userDao.get(userId);
		if (user == null){
			return null;
		}
		
		return passwordDao.getByUserAndAdministrator(user, administrator);
	}
}
