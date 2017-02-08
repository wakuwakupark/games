package com.crawler.dao.impl;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.LockModeType;

import com.crawler.dao.Dao;
import com.crawler.model.Frame;
import com.crawler.model.Queue;
import com.crawler.model.Wait;
import com.crawler.utils.enumurate.WAITSTATUS;

public class QueueDao extends Dao<Queue>{

	public QueueDao(EntityManager entityManager) {
		super(entityManager);
	}

	@Override
	public Queue create() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public Queue get(Object key) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public List<Queue> getAll() {
		// TODO Auto-generated method stub
		return null;
	}
	
	@Override
	public void put(Queue object) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void putAll(List<Queue> object) {
		// TODO Auto-generated method stub
	}
	
	public Queue shouldReserve(Queue queue){
		startTransaction();
		entityManager.merge(queue);
		entityManager.refresh(queue);
		Wait wait = queue.getWait();
		entityManager.refresh(wait, LockModeType.PESSIMISTIC_READ);
		
		if(wait.getStatus() == WAITSTATUS.WAITING.ordinal()){
			wait.setStatus(WAITSTATUS.RESERVING.ordinal());
			queue.setStatus(WAITSTATUS.RESERVING.ordinal());
			endTransaction();
			return queue;
		}else{
			endTransaction();
			return null;
		}
	}
	
	public void updateStatus(Queue queue, WAITSTATUS status){
		startTransaction();
		
		entityManager.merge(queue);
		entityManager.refresh(queue);
		Wait wait = queue.getWait();
		entityManager.refresh(wait, LockModeType.PESSIMISTIC_READ);
		
		queue.setStatus(status.ordinal());
		if (status.equals(WAITSTATUS.ERRORED)){
			wait.setStatus(WAITSTATUS.WAITING.ordinal());
		}else{
			wait.setStatus(WAITSTATUS.RESERVED.ordinal());
		}
		
		endTransaction();
	}
}
