package com.crawler.dao.impl;

import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.LockModeType;

import com.crawler.dao.Dao;
import com.crawler.model.Queue;
import com.crawler.model.Wait;
import com.crawler.utils.enumurate.WAITSTATUS;

public class WaitDao extends Dao<Wait>{

	public WaitDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Wait create() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public Wait get(Object key) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public List<Wait> getAll() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void put(Wait object) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void putAll(List<Wait> object) {
		// TODO Auto-generated method stub
		
	}

}
