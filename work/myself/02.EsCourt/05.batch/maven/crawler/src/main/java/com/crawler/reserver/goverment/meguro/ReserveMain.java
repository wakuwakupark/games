package com.crawler.reserver.goverment.meguro;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.crawler.model.Reserve;
import com.crawler.reserver.goverment.meguro.ReserveTask;
import com.crawler.reserver.utils.ReserveUtils;

public class ReserveMain {
	
	
	private static final Logger logger = LoggerFactory.getLogger(ReserveMain.class);
	
	public static void main(String[] args){
		if(args.length != 2){
			System.out.println("Invalid Argumemt. Argument should be two parameters.");
			return;
		}
		
		Integer userId = Integer.parseInt(args[0]);
		Integer frameId = Integer.parseInt(args[1]);
		
		logger.info("Start reservation: user:" + userId + " frame:" + frameId);
		
		Reserve reserve = ReserveUtils.doReserve(userId, frameId, new ReserveTask());
		
		logger.info("End reservation: user:" + userId + " frame:" + frameId + " reserve:" + reserve);
	}
	

}
