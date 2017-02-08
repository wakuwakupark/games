package com.crawler.reserver.goverment.tokyo;

import java.util.Calendar;
import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.NoSuchElementException;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.crawler.Reserver;
import com.crawler.model.Reserve;
import com.crawler.utils.CourtTypeConverter;
import com.crawler.utils.WrappedWebDriver;

public class ReserveTask extends Reserver {

	private static final Logger logger = LoggerFactory.getLogger(ReserveTask.class);

	@Override
	public Reserve crawle() {
		// 該当のアカウントについて予約する
		WrappedWebDriver driver = new WrappedWebDriver();

		// ログイン
		if (!doLogin(driver)) {
			logger.info("login take a mistake by going to error page");
			driver.close();
			return null;
		}

		// 該当日へ遷移
		if (!goToTheDay(driver)) {
			logger.info("goToTheDay take a mistake by going to error page");
			driver.close();
			return null;
		}
		
		//該当コートへ移動
		if (!goToTheCourt(driver)) {
			logger.info("goToTheCourt take a mistake by going to error page");
			driver.close();
			return null;
		}

		// 予約アクションの実行
		Reserve reserve = null;
		if (!doReserve(driver)) {
			logger.error("researvation is fault");
		} else {
			logger.info("researvation is success");
			reserve = this.postSuccessed();
		}

		driver.close();

		return reserve;
	}

	private boolean goToTheCourt(WrappedWebDriver driver) {
		
		do{
			try {
				Thread.sleep(3000);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
			
			List<WebElement> facilityTables = driver.getElements(".tablebg2");
			for (int i = 2; i < facilityTables.size(); i++) {
				try {
					//施設名を確認
					WebElement facilityTable = facilityTables.get(i);
					String facilityName = facilityTable.findElement(By.cssSelector("span#bnamem")).getText();
					if(!facilityName.equals(frame.getCourt().getFacility().getName())){
						continue;
					}
					
					//コート名を確認
					String courtName = facilityTable.findElement(By.cssSelector("span#ppsname")).getText();
					if(!courtName.equals(frame.getCourt().getName())){
						continue;
					}
					
					//タイムテーブルを確認
					List<WebElement> timeTables = facilityTable.findElements(By.cssSelector("span#tzoneStimeLabel"));
					List<WebElement> emptyTables = facilityTable.findElements(By.cssSelector("#emptyFieldCnt"));
					List<WebElement> iconTables = facilityTable.findElements(By.cssSelector("div#isNotEmp"));
					Calendar calendar = Calendar.getInstance();
					calendar.setTime(frame.getStart());
					for (int j = 0; j < timeTables.size(); j++) {
						Integer shour = Integer.parseInt( timeTables.get(j).getText().split(":")[0] );
						if(shour.equals(calendar.get(Calendar.HOUR_OF_DAY))){
							Integer size = Integer.parseInt(emptyTables.get(j).getText());
							if (size > 0){
								WebElement iconTable = iconTables.get(j);
								WebElement button = iconTable.findElement(By.cssSelector("img#emptyStateIcon"));
								button.click();
								
								WebElement confirmButton = driver.findElement(By.cssSelector("input#doReserve"));
								confirmButton.click();
								waitFromRequest();
								return true;
							}else{
								return false;
							}
						}
					}
				} catch (NoSuchElementException e) {
				}
			}
			
		}while(goToNextPage(driver));
		
		return false;
	}

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

	private boolean goToTheDay(WrappedWebDriver driver) {

		try {

			List<WebElement> checkboxs = driver.getElements("span#label");
			String courtTypeString = CourtTypeConverter.convertToLabel(frame.getCourt().getCourtType());
			for (WebElement checkbox : checkboxs) {
				if (checkbox.getText().contains(courtTypeString)) {
					checkbox.click();
				}
			}

			Calendar calendar = Calendar.getInstance();
			calendar.setTime(frame.getStart());

			Select year = new Select(driver.getElement("select#year"));
			year.selectByValue(String.valueOf(calendar.get(Calendar.YEAR)));

			Select month = new Select(driver.getElement("select#month"));
			month.selectByValue(String.valueOf(calendar.get(Calendar.MONTH) + 1));

			Select date = new Select(driver.getElement("select#day"));
			date.selectByValue(String.valueOf(calendar.get(Calendar.DAY_OF_MONTH)));

			Select startHour = new Select(driver.findElement(By.id("sHour")));
			startHour.selectByValue(String.valueOf(calendar.get(Calendar.HOUR_OF_DAY)));

			calendar.setTime(frame.getEnd());
			Select endHour = new Select(driver.findElement(By.id("eHour")));
			endHour.selectByValue(String.valueOf(calendar.get(Calendar.HOUR_OF_DAY)));

			waitFromRequest();

			driver.clickAndWait("#srchBtn", null);
			return true;

		} catch (Exception e) {
			e.printStackTrace();
			return false;
		}
	}

	private boolean doLogin(WrappedWebDriver driver) {

		try {
			String startUrl = "https://yoyaku.sports.metro.tokyo.jp/user/view/user/mypIndex.html";
			waitFromRequest();
			driver.getAndWait(startUrl, "body");

			driver.executeScript("doSubmit('childForm', 'doLogin')");
			waitFromRequest();
			driver.wait(30, "body");

			WebElement usernameInput = driver.getElement("input#userid");
			usernameInput.clear();
			usernameInput.sendKeys(password.getUsername());

			WebElement passwordInput = driver.getElement("input#passwd");
			passwordInput.clear();
			passwordInput.sendKeys(password.getPassword());

			waitFromRequest();

			WebElement loginButton = driver.getElement("input#login");
			loginButton.click();
			driver.wait(30, "a#dateSearch");
			waitFromRequest();

			WebElement goSearchButton = driver.getElement("a#dateSearch > img");
			goSearchButton.click();
			waitFromRequest();
			driver.wait(30, "#srchBtn");

			return true;
		} catch (Exception e) {
			e.printStackTrace();
			return false;
		}
	}

	private boolean doReserve(WrappedWebDriver driver) {
		try {
			WebElement button = driver.findElement(By.cssSelector("input#apply"));
			button.click();
			waitFromRequest();
			return true;
		} catch (NoSuchElementException e) {
			return false;
		} catch (Exception e) {
			e.printStackTrace();
			return false;
		}
	}
}
