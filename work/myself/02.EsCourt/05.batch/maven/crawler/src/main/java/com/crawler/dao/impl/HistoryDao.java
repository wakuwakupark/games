package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Frame;
import com.crawler.model.History;

public class HistoryDao extends Dao<History> {

	public HistoryDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public History get(Object key) {
		return entityManager.find(History.class, key);
	}

	@Override
	public List<History> getAll() {
		return null;
	}

	@Override
	public void put(History object) {
		entityManager.persist(object);
	}

	@Override
	public void putAll(List<History> object) {
	}

	@Override
	public History create() {
		History history = new History();
		history.setCreated(new Date());
		history.setModified(new Date());
		entityManager.persist(history);
		entityManager.flush();
		entityManager.refresh(history);
		return history;
	}
}
