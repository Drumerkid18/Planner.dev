<?php

require_once '../../inc/filestore.php';

class ToDoDataStore extends Filestore {

	public $toDoList = [];


	function whatFile(){
		return $this->readLines();
	}
		
		
	function saveFile($array){
		$this->writeLines($array);
	}
}


?>