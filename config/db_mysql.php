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
		mysql_connect($this->host, $this->user, $this->pass);
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($this->db);
	}
	function db_query($query) {
		return mysql_query($query);
	}

	function db_fetch_array($result) {
		return mysql_fetch_array($result);
	}
}
?>
