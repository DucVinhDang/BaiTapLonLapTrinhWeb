<?php 

class DBCORE {
	var $db;
	var $db_type;
	
	function __construct($db_type) {
		$this->db_type = $db_type;
		switch($this->db_type) {
			case 'mysql':
				require_once 'db_mysql.php';
				break;
			case 'sqlserver':
				require_once 'db_sqlserver.php';
				break;
			default:
				break;
		}
		$this->create_database();	
	}

	function create_database() {
		$this->db = new DATABASE("localhost","root","","baitaplon");
	}

	function db_connect() {
		$this->db->db_connect();
	}

	function db_query($query) {
		$result = $this->db->db_query($query);
		if (isset($result)) { return $result; }
	}

	function db_fetch_array($result) {
		$result = $this->db->db_fetch_array($result);
		if (isset($result)) { return $result; }
	}
	
}


?>