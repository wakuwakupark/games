package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Reserve;

public class ReserveDao extends Dao<Reserve>{

	public ReserveDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Reserve get(Object key) {
		return entityManager.find(Reserve.class, key);
	}

	@Override
	public List<Reserve> getAll() {
		return null;
	}

	@Override
	public void put(Reserve object) {
		entityManager.persist(object);
	}

	@Override
	public void putAll(List<Reserve> object) {
		
	}

	@Override
	public Reserve create() {
		Reserve reserve = new Reserve();
		reserve.setCreated(new Date());
		reserve.setModified(new Date());
		entityManager.persist(reserve);
		entityManager.flush();
		entityManager.refresh(reserve);
		return reserve;
	}
}
