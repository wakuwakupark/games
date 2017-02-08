package com.crawler.checker.goverment.meguro;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class CheckMain {
	
	private static final Logger logger = LoggerFactory.getLogger(CheckMain.class);
	
	public static void main(String[] args){
		logger.info("Start Crawling");
		new CheckTask().crawle();
		logger.info("End Crawling");
	}
}
