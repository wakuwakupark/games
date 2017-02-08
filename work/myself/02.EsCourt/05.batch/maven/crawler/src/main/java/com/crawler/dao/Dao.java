package com.crawler.dao;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.Persistence;
import javax.persistence.Query;
import javax.persistence.TypedQuery;

public abstract class Dao<T> {

	protected EntityManager entityManager;
	
	public Dao(EntityManager entityManager) {
		super();
		this.entityManager = entityManager;
	}

	public abstract T create();
	
	public abstract T get(Object key);
	
	public abstract List<T> getAll();
	
	public abstract void put(T object);
	
	public abstract void putAll(List<T> object);
	
	protected T getSingleResultOrNot(Query query){
		List<T> list = query.getResultList();
		if (list.isEmpty()){
			return null;
		}else{
			return list.get(0);
		}
	}
	
	public void startTransaction(){
		if(!entityManager.getTransaction().isActive()){
			entityManager.getTransaction().begin();
		}
	}
	
	public void save(){
		entityManager.flush();
	}
	
	public void rollback(){
		if(entityManager.getTransaction().isActive()){
			entityManager.getTransaction().rollback();
		}
	}
	
	public void endTransaction(){
		if(entityManager.getTransaction().isActive()){
			save();
			entityManager.getTransaction().commit();
		}
	}
}
