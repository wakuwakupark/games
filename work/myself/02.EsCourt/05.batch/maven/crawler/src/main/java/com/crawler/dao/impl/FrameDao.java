package com.crawler.dao.impl;

import java.util.Date;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.EntityManager;
import javax.persistence.TemporalType;

import com.crawler.dao.Dao;
import com.crawler.model.Court;
import com.crawler.model.Facility;
import com.crawler.model.Frame;

public class FrameDao extends Dao<Frame> {
	
	public FrameDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Frame get(Object key) {
		Frame frame = entityManager.find(Frame.class, key);
		return frame;
	}
	
	@Override
	public List<Frame> getAll() {
		return entityManager
                .createNamedQuery("Frame.findAll", Frame.class)
                .getResultList();
	}

	@Override
	public void put(Frame object) {
		entityManager.persist(object);
	}

	@Override
	public void putAll(List<Frame> object) {
		entityManager.getTransaction().begin();
		for (Frame frame : object) {
			entityManager.persist(frame);
		}		
		entityManager.getTransaction().commit();
	}

	public Frame getByStart(Court court, Date start) {
		return getSingleResultOrNot(entityManager.createNamedQuery("Frame.findByStart", Frame.class)
				.setParameter("court", court)
				.setParameter("start", start, TemporalType.TIMESTAMP));
	}
	
	@Override
	public Frame create() {
		Frame frame = new Frame();
		frame.setCreated(new Date());
		frame.setModified(new Date());
		entityManager.persist(frame);
		entityManager.flush();
		entityManager.refresh(frame);
		return frame;
	}
}
