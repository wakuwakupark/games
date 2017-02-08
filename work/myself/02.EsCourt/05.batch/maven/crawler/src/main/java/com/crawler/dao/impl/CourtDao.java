package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Administrator;
import com.crawler.model.Court;
import com.crawler.model.Facility;

public class CourtDao extends Dao<Court>{
	
	public CourtDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Court get(Object key) {
		Court court = entityManager.find(Court.class, key);
		return court;
	}
	
	@Override
	public List<Court> getAll() {
		return entityManager
                .createNamedQuery("Court.findAll", Court.class)
                .getResultList();
	}

	@Override
	public void put(Court object) {
		entityManager.getTransaction().begin();
		entityManager.persist(object);
		entityManager.getTransaction().commit();
	}

	@Override
	public void putAll(List<Court> object) {
		entityManager.getTransaction().begin();
		for (Court court : object) {
			entityManager.persist(court);
		}		
		entityManager.getTransaction().commit();
	}

	public Court getByName(Facility facility, String name) {
		Court courts = getSingleResultOrNot(entityManager.createNamedQuery("Court.findByName", Court.class)
				.setParameter("facility", facility)
				.setParameter("name", name));
		return courts;
	}
	
	@Override
	public Court create() {
		Court court = new Court();
		court.setCreated(new Date());
		court.setModified(new Date());
		entityManager.persist(court);
		entityManager.flush();
		entityManager.refresh(court);
		return court;
	}
}
