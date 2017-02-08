package com.crawler.utils;

import java.util.Comparator;

import com.crawler.model.ModifiedComparable;

public class ModifiedComparator implements Comparator<ModifiedComparable>{

	@Override
	public int compare(ModifiedComparable o1, ModifiedComparable o2) {
		if (o1.getModified() == null){
			if(o2.getModified() == null){
				return 1;
			}else{
				return 0;
			}
		}
		return o1.getModified().compareTo(o2.getModified());
	}
	
}
