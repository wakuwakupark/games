package com.crawler.dao.impl;

import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Administrator;
import com.crawler.model.Facility;
import com.crawler.model.History;
import com.crawler.model.Password;
import com.crawler.model.User;

public class PasswordDao extends Dao<Password>{

	public PasswordDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Password get(Object key) {
		return entityManager.find(Password.class, key);
	}

	@Override
	public List<Password> getAll() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void put(Password object) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void putAll(List<Password> object) {
		// TODO Auto-generated method stub
	}
	

	public Password getByUserAndAdministrator(User user, Administrator administrator) {
		return getSingleResultOrNot(entityManager.createNamedQuery("Password.findByUserAndAdministrator")
				.setParameter("user", user)
				.setParameter("administrator", administrator)
				);
	}
	
	@Override
	public Password create() {
		//TODO
		return null;
	}
	
}
