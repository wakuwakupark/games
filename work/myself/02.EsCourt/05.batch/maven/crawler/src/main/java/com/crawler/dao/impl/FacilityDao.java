package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Administrator;
import com.crawler.model.Court;
import com.crawler.model.Facility;

public class FacilityDao extends Dao<Facility>{

	public FacilityDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Facility get(Object key) {
		Facility facility = entityManager.find(Facility.class, key);
		return facility;
	}

	@Override
	public List<Facility> getAll() {
		return entityManager
                .createNamedQuery("Facility.findAll", Facility.class)
                .getResultList();
	}

	@Override
	public void put(Facility object) {
		entityManager.persist(object);
	}

	@Override
	public void putAll(List<Facility> object) {
		entityManager.getTransaction().begin();
		for (Facility facility : object) {
			entityManager.persist(facility);
		}		
		entityManager.getTransaction().commit();
	}

	public Facility getByName(Administrator administrator, String name) {
		return getSingleResultOrNot(entityManager
                .createNamedQuery("Facility.findByName", Facility.class)
                .setParameter("administrator", administrator)
                .setParameter("name", name));
	}
	
	@Override
	public Facility create() {
		Facility facility = new Facility();
		facility.setCreated(new Date());
		facility.setModified(new Date());
		entityManager.persist(facility);
		entityManager.flush();
		entityManager.refresh(facility);
		return facility;
	}

}
