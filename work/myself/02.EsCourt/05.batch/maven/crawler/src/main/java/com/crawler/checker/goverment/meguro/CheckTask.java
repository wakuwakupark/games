package com.crawler.checker.goverment.meguro;

import java.util.Calendar;
import java.util.Date;
import java.util.List;
import java.util.regex.Pattern;

import org.openqa.selenium.By;
import org.openqa.selenium.NoSuchElementException;
import org.openqa.selenium.WebElement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.crawler.Crawler;
import com.crawler.dao.impl.AdministratorDao;
import com.crawler.dao.impl.CourtDao;
import com.crawler.dao.impl.CourtTypeDao;
import com.crawler.dao.impl.FacilityDao;
import com.crawler.dao.impl.FrameDao;
import com.crawler.dao.impl.HistoryDao;
import com.crawler.model.Administrator;
import com.crawler.model.Court;
import com.crawler.model.CourtType;
import com.crawler.model.Facility;
import com.crawler.model.Frame;
import com.crawler.model.History;
import com.crawler.model.Queue;
import com.crawler.reserver.goverment.meguro.ReserveTask;
import com.crawler.utils.WrappedWebDriver;

public class CheckTask extends Crawler{

	private static final Logger logger = LoggerFactory.getLogger(CheckTask.class);
	
	private Administrator meguro;
	
	private static String dateRegex = "([0-9]+)年([0-9]+)月([0-9]+)日";
	private static Pattern datePattern = Pattern.compile(dateRegex);
	
	@Override
	public boolean crawle() {
		// Driverを生成
		WrappedWebDriver driver = new WrappedWebDriver();
		
		//目黒区の施設情報を取得
		meguro = administratorDao.getMeguro();
		
		//空き状況予約ページまで遷移
		if(!goToTop(driver)){
			logger.error("goToTop is failed");
		}
		
		//実行日を取得
		Calendar calendar = Calendar.getInstance();
		calendar.set(Calendar.SECOND, 0);
		calendar.set(Calendar.MILLISECOND, 0);
		
		do{
			
			logger.info("Start crawle:" + calendar.getTime());			
			List<WebElement> infoTables = null;
			try{
				infoTables = driver.getElements("table.STTL");
			}catch (Exception e) {
				logger.error("getting info tables is failed");
				e.printStackTrace();
				break;
			}
			if (infoTables == null || infoTables.size() < 2){
				logger.info("arrived at error page");
				break;
			}
			
			for (int i = 2; i < infoTables.size(); i++) {
				getFacilityStatus(driver, infoTables.get(i), calendar);
			}

			calendar.add(Calendar.DAY_OF_MONTH, 1);
			
			//遷移失敗したら終了
		}while(goToNextPage(driver));
		
		driver.close();
		return true;
	}

	private boolean goToNextPage(WrappedWebDriver driver) {
		driver.executeScript("fcSubmit(FRM_RSGU302,'SEARCH_NEXT1D','rsv.bean.RSGU302BusinessMoveWeek','RSGU302');");
		waitFromRequest();
		return true;
	}

	private boolean goToTop(WrappedWebDriver driver) {
		try {
			String url = "https://yoyaku.city.meguro.tokyo.jp/sports-user/mainservlet/UserPublic";
			driver.getAndWait(url, "a>img");
			goBackHomeFromError(driver);
			
			driver.executeScript("fcSubmit(FRM_RSGU001,'INIT','rsv.bean.RSGU301BusinessInit','RSGU301');");
			waitFromRequest();
			
			driver.executeScript("fcSubmit_RSGU301(FRM_RSGU301,'START','rsv.bean.RSGU302BusinessStart','RSGU302','0700','1','硬式テニス');");
			waitFromRequest();
			return true;
		} catch (NoSuchElementException e) {
			e.printStackTrace();
			return false;
		}
	}
	
	private void goBackHomeFromError(WrappedWebDriver driver){
		driver.executeScript("doSubmit(FRM_RSGU999S);");
		waitFromRequest();
	}
	
	private void waitFromRequest(){
		try {
			Thread.sleep(3000);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
	}
	
	private void getFacilityStatus(WrappedWebDriver driver, WebElement infoTable, Calendar theDate){
		try {
			facilityDao.startTransaction();

			List<WebElement> timeList = infoTable.findElements(By.cssSelector("td.GATR"));
			List<WebElement> statusList = infoTable.findElements(By.cssSelector("td.NATR"));
			
			//String nameText = statusList.get(0).findElement(By.cssSelector("a")).getText();
			String nameText = statusList.get(0).getText();
			String facilityName = nameText.split("(ゲートボール|庭球)場[　]*")[0] + "庭球場";
			String courtName = nameText.split("(ゲートボール|庭球)場[　]*")[1];
			
			Facility facility = facilityDao.getByName(meguro, facilityName);
			if(facility == null){
				facility = facilityDao.create();
				facility.setName(facilityName);
				meguro.addFacility(facility);
				logger.info("New facility is created:" + facility.getName());
			}
			
			Court court = courtDao.getByName(facility, courtName);
			if(court == null){
				court = courtDao.create();
				court.setName(courtName);
				CourtType courtType = courtTypeDao.getByName("オムニコート");
				court.setCourtType(courtType);
				facility.addCourt(court);
				logger.info("New court is created:" + court.getName() );
			}
			
			for (int i = 1; i < timeList.size(); i++) {
				String time = timeList.get(i).getText();
				Integer startInt = Integer.parseInt(time.split("時から")[0]);
				Integer endInt = Integer.parseInt(time.split("時から")[1].split("時")[0]);
				
				theDate.set(Calendar.HOUR_OF_DAY, startInt);
				theDate.set(Calendar.MINUTE, 0);
				Date start = theDate.getTime();
				
				theDate.set(Calendar.HOUR_OF_DAY, endInt);
				theDate.set(Calendar.MINUTE, 0);
				Date end = theDate.getTime();
				
				Integer size = statusList.get(i).getText().length() < 2 ? 1 : 0;
				
				Frame frame = frameDao.getByStart(court, start);
				if (frame == null){
					frame = frameDao.create();
					frame.setStart(start);
					frame.setEnd(end);
					court.addFrame(frame);
					logger.info("New frame is created:" + frame.getStart());
				}
				frame.setSize(size);
				
				//sizeが1以上の場合はqueueをresearvableに変更
				if(size >= 1){
					this.resolveQueue(frame, new ReserveTask());
				}
				
				History history = historyDao.create();
				history.setSize(size);
				frame.addHistory(history);
			}
			
			//facilityDao.rollback();
			facilityDao.endTransaction();
		} catch (NoSuchElementException e) {
			facilityDao.rollback();
			logger.error("NoSuchElementException");
			e.printStackTrace();
		} catch (Exception e) {
			facilityDao.rollback();
			logger.error("UnpredicatedException");
			e.printStackTrace();
		}
	}
}
