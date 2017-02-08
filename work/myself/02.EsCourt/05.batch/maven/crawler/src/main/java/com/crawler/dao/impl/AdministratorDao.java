package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import com.crawler.dao.Dao;
import com.crawler.model.Administrator;
import com.crawler.utils.enumurate.GOVERMENTID;

public class AdministratorDao extends Dao<Administrator> {

	public AdministratorDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Administrator get(Object key) {
		Administrator administrator = entityManager.find(Administrator.class, key);
		return administrator;
	}
	
	public Administrator getTokyo(){
		return get(GOVERMENTID.TOKYO.ordinal());
	}
	
	public Administrator getMeguro() {
		return get(GOVERMENTID.MEGURO.ordinal());
	}

	@Override
	public List<Administrator> getAll() {
		return entityManager
                .createNamedQuery("Administrator.findAll", Administrator.class)
                .getResultList();
	}

	@Override
	public void put(Administrator object) {
		entityManager.getTransaction().begin();
		entityManager.persist(object);
		entityManager.getTransaction().commit();
	}

	@Override
	public void putAll(List<Administrator> object) {
		entityManager.getTransaction().begin();
		for (Administrator administrator : object) {
			entityManager.persist(administrator);
		}		
		entityManager.getTransaction().commit();
	}

	@Override
	public Administrator create() {
		Administrator administrator = new Administrator();
		administrator.setCreated(new Date());
		administrator.setModified(new Date());
		entityManager.persist(administrator);
		entityManager.flush();
		entityManager.refresh(administrator);
		return administrator;
	}

	
}
