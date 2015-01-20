<?php

require_once '../../inc/filestore.php';

class AddressDataStore extends Filestore {
	
	public $addressBook = [];

	function saveFile($array){
		$this->writeCSV($array);
	}

	function readMe(){
		return $this->readCSV();
		
	}

	function cleanInput($value){
		$value = htmlentities(strip_tags($value));
		return $value;
	}
}

?>