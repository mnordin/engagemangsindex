<?php
	
	function getCategories($motion) {
		foreach ($motion->dokkategori->kategori as $kategori) {
			$categories[] = (string)$kategori->domain_name;
		}
		return array_unique($categories);
	}