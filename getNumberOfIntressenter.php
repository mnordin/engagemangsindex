<?php
	
	function getNumberOfIntressenter($motion) {
		return count($motion->dokintressent->aktivitet);
	}