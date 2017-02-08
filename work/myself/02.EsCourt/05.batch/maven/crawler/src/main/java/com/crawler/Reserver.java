package com.crawler;

import javax.persistence.EntityManager;
import javax.persistence.Persistence;

import com.crawler.dao.impl.FrameDao;
import com.crawler.dao.impl.PasswordDao;
import com.crawler.dao.impl.ReserveDao;
import com.crawler.model.Administrator;
import com.crawler.model.Frame;
import com.crawler.model.Password;
import com.crawler.model.Reserve;
import com.crawler.model.User;
import com.crawler.utils.Constants;

public abstract class Reserver { 
	
	protected EntityManager em = Persistence.createEntityManagerFactory(Constants.persistenceName).createEntityManager();
	private ReserveDao reserveDao = new ReserveDao(em); 
	
	protected Password password;
	protected Frame frame;
	
	public Reserver() {
		super();
	}

	public void setup(Administrator administrator, User user, Frame frame) {
		this.frame = frame;
		
		PasswordDao passwordDao = new PasswordDao(em);
		this.password = passwordDao.getByUserAndAdministrator(user, administrator);
	}

	
	public Password getPassword() {
		return password;
	}

	public void setPassword(Password password) {
		this.password = password;
	}

	public Frame getFrame() {
		return frame;
	}

	public void setFrame(Frame frame) {
		this.frame = frame;
	}
	
	public abstract Reserve crawle();
	

	protected Reserve postSuccessed(){
		reserveDao.startTransaction();
		Reserve reserve = reserveDao.create();
		reserve.setFrame(frame);
		reserve.setUser(password.getUser());
		reserveDao.endTransaction();
		
		return reserve;
	}
	
	protected void waitFromRequest() {
		try {
			Thread.sleep(3000);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
	}
}
