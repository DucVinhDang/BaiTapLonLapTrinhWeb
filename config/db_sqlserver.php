<?php
include 'db_interface.php';
class DATABASE IMPLEMENTS INTDATABASE{
	var $host;
	var $user;
	var $pass;
	var $db;

	function __construct($host, $user, $pass,$db) {
		$this->host = isset($host) ? $host : "localhost";
		$this->user = isset($user) ? $user : "root";
		$this->pass = isset($pass) ? $pass : "";
		$this->db = $db;
	}
	function db_connect() {
		mssql_connect($this->host, $this->user, $this->pass);
		mssql_select_db($this->db);
	}
	function db_query($query) {
		return mssql_query($query);
	}

	function db_fetch_array($result) {
		return mssql_fetch_array($result);
	}
}
?>
