<?php 
	/**
	 * translates utskotts acronyms into full names
	 */
	function organizer($string) {
		
		$oversatt = array(
			'SfU' 	=> 'Svenska föreningen för Upphovsrätt',
			'CU' 	=> 'Civilutskottet',
			'FiU' 	=> 'Finansutskottet',
			'AU' 	=> 'Arbetsmarknadsutskottet',
			'NU' 	=> 'Näringsutskottet',
			'SoU' 	=> 'Socialutskottet',
			'UU' 	=> 'Utrikesutskottet',
			'UbU' 	=> 'Utbildningsutskottet',
			'SfU' 	=> 'Socialförsäkringsutskottet',
			'MJU' 	=> 'Miljö- och Jordbruksutskottet',
			'SkU' 	=> 'Skatteutskottet',
			'JuU' 	=> 'Justitieutskottet',
			'TU' 	=> 'Trafikutskottet',
			'KU' 	=> 'Konstitutionsutskottet',
			'KrU' 	=> 'Kulturutskottet',
			'FöU' 	=> 'Försvarsutskottet',
		);
		
		foreach($oversatt as $acro => $full) {
			if(strtolower($string) == strtolower($acro)) {
				return $full;
			}
		}
		
		return false;
		
	}