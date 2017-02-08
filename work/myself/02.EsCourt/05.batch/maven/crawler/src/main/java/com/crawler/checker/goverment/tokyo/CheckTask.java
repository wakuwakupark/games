package com.crawler.checker.goverment.tokyo;

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
import com.crawler.reserver.goverment.tokyo.ReserveTask;
import com.crawler.utils.CourtTypeConverter;
import com.crawler.utils.WrappedWebDriver;

import java.util.Date;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.NoSuchElementException;
import org.openqa.selenium.WebElement;

public class CheckTask extends Crawler {

	private Administrator tokyo;

	public boolean crawle() {
		// Driverを生成
		WrappedWebDriver driver = new WrappedWebDriver();

		// 都営の施設情報を取得
		tokyo = administratorDao.getTokyo();

		// スタートページヘ遷移
		goToTop(driver);

		// 日付を取得してループ開始
		Calendar calendar = Calendar.getInstance();
		calendar.set(Calendar.SECOND, 0);
		calendar.set(Calendar.MILLISECOND, 0);
		int nowMonth = calendar.get(Calendar.MONTH);
		calendar.add(Calendar.DATE, 1);
		System.out.println(calendar.getTime());
		for (int i = 0; i < 32; i++) {
			// 次の日へ
			calendar.add(Calendar.DATE, 1);

			// 月が変わったらページ遷移
			int chekingMonth = calendar.get(Calendar.MONTH);
			if (chekingMonth != nowMonth) {
				goToNextMonth(driver);
				nowMonth = chekingMonth;
			}

			// 次の日付へ遷移
			if (!goToTheDate(calendar.get(Calendar.DATE), driver)) {
				// クリックできないためスキップ
				continue;
			}

			// 施設情報を全て取得
			do {
				getFacilityStatus(driver, calendar);
			} while (goToNextPage(driver));

		}

		// 施設情報を保存
		administratorDao.startTransaction();
		tokyo.setModified(new Date());
		administratorDao.endTransaction();
		System.out.println(tokyo);

		driver.close();
		
		return true;
	}

	/**
	 * 検索トップまで辿りつく
	 * 
	 * @param driver
	 */
	private void goToTop(WrappedWebDriver driver) {
		driver.getAndWait("https://yoyaku.sports.metro.tokyo.jp/user/view/user/homeIndex.html", "#purposeSearch");
		driver.clickAndWait("#purposeSearch", "#srchBtn");
		List<WebElement> checkboxs = driver.getElements("span#label");
		for (WebElement checkbox : checkboxs) {
			if (checkbox.getText().equals("テニス（ハード）") || checkbox.getText().equals("テニス（人工芝）")) {
				checkbox.click();
			}
		}
		try {
			Thread.sleep(3000);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		driver.clickAndWait("#srchBtn", null);
	}

	/**
	 * 次の月へ遷移
	 * 
	 * @param driver
	 */
	private void goToNextMonth(WrappedWebDriver driver) {
		try {
			driver.wait(30, "td.calender > div > a");
			driver.clickAndWait("td.calender > div > a", null);
		} catch (NoSuchElementException e) {
			
		}
	}

	/**
	 * 次の日へ遷移
	 * 
	 * @param date
	 * @param driver
	 */
	private boolean goToTheDate(Integer date, WrappedWebDriver driver) {
		List<WebElement> elements = driver.getElements("a.calclick");
		for (WebElement element : elements) {
			if (element.getText().equals(date.toString())) {
				element.click();
				driver.wait(30, null);
				return true;
			}
		}
		return false;
	}

	/**
	 * 次のページ番号へ進む
	 * 
	 * @param pageNumber
	 * @param driver
	 */
	private boolean goToNextPage(WrappedWebDriver driver) {
		try {
			WebElement goToNext = driver.getElement("a#goNextPager");
			goToNext.click();
			driver.wait(30, null);
		} catch (NoSuchElementException e) {
			return false;
		}
		return true;
	}

	/**
	 * 各施設の空き情報を取得する
	 * 
	 * @param driver
	 * @return
	 */
	private boolean getFacilityStatus(WrappedWebDriver driver, Calendar theDate) {
		try {
			Thread.sleep(3000);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		List<WebElement> facilityTables = driver.getElements(".tablebg2");
		for (int i = 2; i < facilityTables.size(); i++) {
			try {
				WebElement facilityTable = facilityTables.get(i);
				Facility facility = null;
				Court court = null;
		
				facilityDao.startTransaction();
				
				// header
				String name = facilityTable.findElement(By.cssSelector("span#bnamem")).getText();
				facility = facilityDao.getByName(tokyo, name);
				if (facility == null) {
					facility = facilityDao.create();
					facility.setName(name);
					tokyo.addFacility(facility);
					facility.setAdministrator(tokyo);
				}
				facility.setModified(new Date());

				String courtName = facilityTable.findElement(By.cssSelector("span#ppsname")).getText();
				court = courtDao.getByName(facility, courtName);
				if (court == null) {
					court = courtDao.create();
					court.setName(courtName);
					facility.addCourt(court);
					court.setFacility(facility);

					String typeName = CourtTypeConverter.convertToRightName((courtName.split("（")[1].split("）")[0]));
					CourtType courtType = courtTypeDao.getByName(typeName);
					courtType.addCourt(court);
					court.setCourtType(courtType);
				}
				court.setModified(new Date());

				// time
				List<WebElement> timeTables = facilityTable.findElements(By.cssSelector("span#tzoneStimeLabel"));
				List<Frame> frames = new ArrayList<>();
				for (WebElement time : timeTables) {
					String[] dateStrings = time.getText().split(":");

					theDate.set(Calendar.HOUR_OF_DAY, Integer.parseInt(dateStrings[0]));
					theDate.set(Calendar.MINUTE, Integer.parseInt(dateStrings[1]));
					Date start = theDate.getTime();

					Frame frame = frameDao.getByStart(court, start);
					if (frame == null) {
						frame = frameDao.create();
						frame.setStart(start);
						frame.setCourt(court);
						court.addFrame(frame);
						theDate.set(Calendar.HOUR_OF_DAY, Integer.parseInt(dateStrings[0]) + 2);
						Date end = theDate.getTime();
						frame.setEnd(end);
					}

					frames.add(frame);
				}

				// 空き面数
				List<WebElement> emptyTables = facilityTable.findElements(By.cssSelector("#emptyFieldCnt"));
				for (int k = 0; k < frames.size(); k++) {
					Integer size = Integer.parseInt(emptyTables.get(k).getText());
					Frame frame = frames.get(k);
					frame.setSize(size);
					frame.setModified(new Date());
					
					History history = historyDao.create();
					history.setSize(size);
					frame.addHistory(history);
					
					if(size >= 1){
						this.resolveQueue(frame, new ReserveTask());
					}
				}
				
				facilityDao.endTransaction();
				
			} catch (NoSuchElementException e) {
				//System.out.println(e.getMessage());
				facilityDao.rollback();
				return false;
			} catch (Exception e) {
				e.printStackTrace();
				facilityDao.rollback();
				return false;
			}
		}
		return true;
	}

}
