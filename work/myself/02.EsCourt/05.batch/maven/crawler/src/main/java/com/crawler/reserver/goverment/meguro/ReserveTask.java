package com.crawler.reserver.goverment.meguro;

import java.util.Calendar;
import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.NoSuchElementException;
import org.openqa.selenium.WebElement;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.crawler.Reserver;
import com.crawler.dao.impl.ReserveDao;
import com.crawler.model.Frame;
import com.crawler.model.Reserve;
import com.crawler.utils.WrappedWebDriver;

public class ReserveTask extends Reserver {

	private static final Logger logger = LoggerFactory.getLogger(ReserveTask.class);
	
	@Override
	public Reserve crawle() {
		// Driverを生成
		WrappedWebDriver driver = new WrappedWebDriver();

		// ログイン
		if(!doLogin(driver)){
			logger.info("login take a mistake by going to error page");
			driver.close();
			return null;
		}

		// 該当月へ遷移
		if(!goToMonth(driver)){
			logger.info("moveToNextMonth take a mistake by going to error page");
			driver.close();
			return null;
		}

		// 該当日付のページへ遷移
		if(!goToDay(driver)){
			logger.error("moveToTheDay is missed");
			driver.close();
			return null;
		}
		
		// 予約アクションの実行
		Reserve reserve = null;
		if(!doReserve(driver)){
			logger.error("researvation is fault");
		}else{
			logger.info("researvation is success");
			reserve = this.postSuccessed();
		}
		
		driver.close();
		return reserve;
	}

	private boolean doReserve(WrappedWebDriver driver) {
		
		if(!clickReserveButton(driver)){
			logger.error("reserve botton is not found");
			return false;
		}

		String next = "fcSubmitRestrict(FRM_RSGU302,'NEXT','rsv.bean.RSGU303BusinessFromRSGU302Y','RSGU302YOYAKU');";
		driver.executeScript(next);
		waitFromRequest();

		String confirm = "fcSubmitRestrict(FRM_RSGU303,'NEXT_CLICK','rsv.bean.RSGU304BusinnessShinkiYoyaku','RSGU304');";
		driver.executeScript(confirm);
		waitFromRequest();
		
		return true;
	}
	
	private boolean clickReserveButton(WrappedWebDriver driver){
		try{
			List<WebElement> infoTables = driver.getElements("table.STTL");
			if (infoTables == null || infoTables.size() < 2){
				logger.error("fail to get infoTables");
				return false;
			}
			for (int i = 2; i < infoTables.size(); i++) {
				WebElement infoTable = infoTables.get(i);
				List<WebElement> timeList = infoTable.findElements(By.cssSelector("td.GATR"));
				List<WebElement> statusList = infoTable.findElements(By.cssSelector("td.NATR"));
				
				String nameText = statusList.get(0).getText();
				String facilityName = nameText.split("(ゲートボール|庭球)場[　]*")[0] + "庭球場";
				String courtName = nameText.split("(ゲートボール|庭球)場[　]*")[1];
				if(!facilityName.equals(frame.getCourt().getFacility().getName()) ){
					continue;
				}
				if(!courtName.equals(frame.getCourt().getName())){
					continue;
				}
				for (int j = 1; j < timeList.size(); j++) {
					String time = timeList.get(j).getText();
					Integer startInt = Integer.parseInt(time.split("時から")[0]);
					
					if (startInt.equals(frame.getStart().getHours())){
						WebElement statusElement = statusList.get(j);
						WebElement buttonElement = statusElement.findElement(By.cssSelector("input"));
						//String onclick = buttonElement.getAttribute("onclick").split("javascript:return")[1];
						//driver.executeScript(onclick);
						buttonElement.click();
						waitFromRequest();
						return checkNoError(driver);
					}
				}
			}
		}catch (NoSuchElementException e) {
			logger.error("NoSuchElementException");
			e.printStackTrace();
			return false;
		}
		return false;
	}

	private boolean goToDay(WrappedWebDriver driver) {
		Integer date = frame.getStart().getDate();
		String formatted = String.format("%02d", date);
		String goToDay = "fcSubmit_CalYOYAKU(FRM_RSGU302,'SEARCH_POINT','rsv.bean.RSGU302BusinessMoveWeek','RSGU302Y','"
				+ formatted + "');";
		driver.executeScript(goToDay);
		waitFromRequest();
		return checkNoError(driver);
	}

	private boolean goToMonth(WrappedWebDriver driver) {
		String nextMonth = "fcSubmitRestrict(FRM_RSGU302,'SEARCH_NEXT1M','rsv.bean.RSGU302BusinessMoveWeek','RSGU302Y');";
		Calendar calendar = Calendar.getInstance();
		while (calendar.get(Calendar.MONTH) != frame.getStart().getMonth()) {
			calendar.add(Calendar.MONTH, 1);
			driver.executeScript(nextMonth);
			waitFromRequest();
		}
		return checkNoError(driver);
	}

	private boolean checkNoError(WrappedWebDriver driver) {
		try {
			List<WebElement> infoTables = driver.getElements("table.STTL");
			if (infoTables == null || infoTables.size() < 2) {
				logger.warn("Now is Errorpage");
				return false;
			}
		} catch (NoSuchElementException e) {
			logger.error("NoSuchElementException");
			e.printStackTrace();
			return false;
		}
		return true;
	}

	private boolean doLogin(WrappedWebDriver driver) {
		
		try {
			// 空き状況確認ページへ遷移
			String url = "https://yoyaku.city.meguro.tokyo.jp/sports-user/mainservlet/UserPublic";
			driver.getAndWait(url, "a>img");
			goBackHomeFromError(driver);

			driver.executeScript("fcSubmit(FRM_RSGU001,'INIT','rsv.bean.RSGU301BusinessInit','RSGU301');");
			waitFromRequest();

			driver.executeScript(
					"fcSubmit_RSGU301(FRM_RSGU301,'START','rsv.bean.RSGU302BusinessStart','RSGU302','0700','1','硬式テニス');");
			waitFromRequest();
			driver.wait(30, "table.STTL");

			
			// ログインページへ
			driver.executeScript(
					"fcSubmit_Login(FRM_RSGU302,'YOYAKU_CLICK','NONE','RSGU302','LOGIN','rsv.bean.RSGU302YBusinessInit','RSGU302');");
			waitFromRequest();
			
			//ログイン処理
			WebElement usernameInput = driver.findElement(By.cssSelector("input.TCH_LOGIN[type='text']"));
			WebElement passwordInput = driver.findElement(By.cssSelector("input.TCH_LOGIN[type='password']"));

			usernameInput.clear();
			usernameInput.sendKeys(password.getUsername());

			passwordInput.clear();
			passwordInput.sendKeys(password.getPassword());

			driver.executeScript("fcSubmitRestrict(FRM_RSGU000,'LOGIN','rsv.bean.RSGU302YBusinessInit','RSGU302');");

			driver.wait(30, "table.STTL");
			
			return true;
		} catch (Exception e) {
			e.printStackTrace();
			return false;
		}
	}

	private void goBackHomeFromError(WrappedWebDriver driver) {
		driver.executeScript("doSubmit(FRM_RSGU999S);");
		waitFromRequest();
	}
}
