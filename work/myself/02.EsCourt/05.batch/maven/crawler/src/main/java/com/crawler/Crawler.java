package com.crawler;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.concurrent.Callable;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

import javax.persistence.EntityManager;
import javax.persistence.Persistence;

import com.crawler.dao.impl.AdministratorDao;
import com.crawler.dao.impl.CourtDao;
import com.crawler.dao.impl.CourtTypeDao;
import com.crawler.dao.impl.FacilityDao;
import com.crawler.dao.impl.FrameDao;
import com.crawler.dao.impl.HistoryDao;
import com.crawler.dao.impl.PasswordDao;
import com.crawler.dao.impl.QueueDao;
import com.crawler.model.Administrator;
import com.crawler.model.Frame;
import com.crawler.model.Notify;
import com.crawler.model.Password;
import com.crawler.model.Queue;
import com.crawler.model.Reserve;
import com.crawler.model.User;
import com.crawler.model.Wait;
import com.crawler.utils.Constants;
import com.crawler.utils.ModifiedComparator;
import com.crawler.utils.NotifyUtils;
import com.crawler.utils.enumurate.NOTIFYMODE;
import com.crawler.utils.enumurate.WAITSTATUS;

public abstract class Crawler {
	
	private EntityManager em = Persistence.createEntityManagerFactory(Constants.persistenceName).createEntityManager();
	
	protected AdministratorDao administratorDao = new AdministratorDao(em);
	protected FacilityDao facilityDao = new FacilityDao(em);
	protected CourtDao courtDao = new CourtDao(em);
	protected FrameDao frameDao = new FrameDao(em);
	protected CourtTypeDao courtTypeDao = new CourtTypeDao(em);
	protected HistoryDao historyDao = new HistoryDao(em);
	
	private static ExecutorService executorService = Executors.newFixedThreadPool(5);
	
	public abstract boolean crawle();
	
	public void resolveQueue(Frame frame, Reserver reserver){
		ResolveTask resolveTask = new ResolveTask(reserver, frame);
		executorService.submit(resolveTask);
	}
	
	private class ResolveTask implements Callable<List>{
		
		private EntityManager em = Persistence.createEntityManagerFactory(Constants.persistenceName).createEntityManager();
		private FrameDao frameDao = new FrameDao(em);
		private PasswordDao passwordDao = new PasswordDao(em);
		private QueueDao queueDao = new QueueDao(em);
		
		private Reserver reserver;
		private Integer size;
		private Frame frame;
		
		public ResolveTask(Reserver reserver, Frame frame) {
			super();
			this.reserver = reserver;
			this.size = frame.getSize();
			this.frame = frameDao.get(frame.getId());
		}

		@Override
		public List call() throws Exception {
			Administrator administrator = frame.getCourt().getFacility().getAdministrator();
			List<Queue> queues = frame.getQueues();
			List<Reserve> reservedResults = new ArrayList<>();
			List<Queue> notifyQueues = new ArrayList<>();
			Collections.sort(queues, new ModifiedComparator());
			
			for (Queue queue : queues) {
				if (size <= 0){
					continue;
				}
				
				//ロック中かどうかの判定
				queue = queueDao.shouldReserve(queue);
				if(queue == null){
					continue;
				}
				
				Wait wait = queue.getWait();
				if(wait.getNotify().getId() == NOTIFYMODE.NOTIFY.ordinal()){
					//通知モードの場合は即時予約はしない
					notifyQueues.add(queue);
					continue;
				}
				
				//予約を設定
				User user = wait.getUser();
				Password password = passwordDao.getByUserAndAdministrator(user, administrator);
				reserver.setFrame(frame);
				reserver.setPassword(password);
				Reserve reserve = reserver.crawle();
				if(reserve != null){
					//予約成功
					size --;
					queueDao.updateStatus(queue, WAITSTATUS.RESERVED);
					reservedResults.add(reserve);
				}else{
					//予約失敗
					queueDao.updateStatus(queue, WAITSTATUS.ERRORED);
				}
			}
			
			//空き面数の更新
			frameDao.startTransaction();
			frame.setSize(size);
			frameDao.endTransaction();
			
			//メール送信
			for (Reserve reserve : reservedResults) {
				NotifyUtils.notify(reserve);
			}
			
			//キューの通知
			for (Queue queue : notifyQueues) {
				NotifyUtils.notify(queue, NOTIFYMODE.NOTIFY);
			}
			
			return null;
		}
	}
}