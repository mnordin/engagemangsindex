<?php
	
	function getNumberOfIntressenter($motion) {
		return count($motion->dokintressent->intressent);
	}