package com.crawler.dao.impl;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.TypedQuery;

import com.crawler.dao.Dao;
import com.crawler.model.Court;
import com.crawler.model.CourtType;

public class CourtTypeDao extends Dao<CourtType>{

	public CourtTypeDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public CourtType get(Object key) {
		CourtType courtType = entityManager.find(CourtType.class, key);
		return courtType;
	}
	
	public CourtType getByName(String name){
		return entityManager.createNamedQuery("CourtType.findByName", CourtType.class).setParameter("name", name).getSingleResult();
	}

	@Override
	public List<CourtType> getAll() {
		return entityManager
                .createNamedQuery("CourtType.findAll", CourtType.class)
                .getResultList();
	}

	@Override
	public void put(CourtType object) {
		entityManager.getTransaction().begin();
		entityManager.persist(object);
		entityManager.getTransaction().commit();
	}

	@Override
	public void putAll(List<CourtType> object) {
		entityManager.getTransaction().begin();
		for (CourtType courtType : object) {
			entityManager.persist(courtType);
		}		
		entityManager.getTransaction().commit();
	}

	@Override
	public CourtType create() {
		CourtType courtType = new CourtType();
		entityManager.persist(courtType);
		return courtType;
	}
	
}
