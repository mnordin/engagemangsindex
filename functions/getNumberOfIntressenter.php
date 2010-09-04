<?php
	
	function getNumberOfIntressenter($motion) {
		return count($motion->dokaktivitet->aktivitet);
	}