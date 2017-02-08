package com.crawler.utils;

import com.crawler.model.CourtType;

public class CourtTypeConverter {

	public static String convertToRightName(String labelName) {
		switch (labelName) {
		case "人工芝":
			return "オムニコート";
		case "クレー":
			return "クレイコート";
		case "ハード":
			return "ハードコート";
		default:
			return "その他";
		}
	}

	public static String convertToLabel(CourtType courtType) {
		switch (courtType.getId()) {
		case 1:
			return "人工芝";
		case 2:
			return "クレー";
		case 3:
			return "ハード";
		default:
			return "その他";
		}
	}
}
