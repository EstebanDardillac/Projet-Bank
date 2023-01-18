<?php

class DbObject {
    public function getCreatedAt() {
		$date = new DateTime($this->created_at);
		return $date->format('d/m/Y H:i:s');
	}
	public function getTableName(){
		return strtolower(get_class($this))."s";	
	}
	public function getdata(){
		$var = get_var_object($dbObj);
		var_dump($var);
	}
}
