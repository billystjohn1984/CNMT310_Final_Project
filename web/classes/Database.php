<?php
class Database{
	private $_host;
	private $_user;
	private $_password;
	private $_database;

	function __construct($host, $user, $password, $database) {
		$this->_host = $host;
		$this->_user = $user;
		$this->_password = $password;
		$this->_database = $database;
	}

	function connect(){
		return mysqli_connect($this->_host, $this->_user, $this->_password, $this->_database);
	}
}
?>
