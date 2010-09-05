<?php 
	/**
	 * translates utskotts acronyms into full names
	 */
	function organizer($string) {
		
		$oversatt = array(
			'SfU' 	=> 'Svenska föreningen för Upphovsrätt',
			'CU' 	=> 'Civil',
			'FiU' 	=> 'Finans',
			'AU' 	=> 'Arbetsmarknad',
			'NU' 	=> 'Näring',
			'SoU' 	=> 'Social',
			'UU' 	=> 'Utrikes',
			'UbU' 	=> 'Utbildning',
			'SfU' 	=> 'Socialförsäkring',
			'MJU' 	=> 'Miljö- och Jordbruk',
			'SkU' 	=> 'Skatte',
			'JuU' 	=> 'Justitie',
			'TU' 	=> 'Trafik',
			'KU' 	=> 'Konstitution',
			'KrU' 	=> 'Kultur',
			'FöU' 	=> 'Försvar',
		);
		
		/*$oversatt = array(
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
		);*/
		
		foreach($oversatt as $acro => $full) {
			if(strtolower($string) == strtolower($acro)) {
				return $full;
			}
		}
		
		return false;
		
	}