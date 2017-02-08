package com.crawler.dao.impl;

import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.User;

public class UserDao extends Dao<User>{

	public UserDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public User get(Object key){
		return entityManager.find(User.class, key);
	}

	@Override
	public List<User> getAll() {
		return null;
	}

	@Override
	public void put(User object) {
	}

	@Override
	public void putAll(List<User> object) {
		
	}

	@Override
	public User create() {
		// TODO Auto-generated method stub
		return null;
	}

}
