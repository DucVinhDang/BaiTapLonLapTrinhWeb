<?php
	class Rate_db {
		var $db_core;

		function __construct() {
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Rate $new_rate) {
			$user_id = $new_rate->get_user_id();
			$product_id = $new_rate->get_product_id();
			$rate_point = $new_rate->get_rate_point();

			$queryCommand = "INSERT INTO rates(user_id, product_id, rate_point) VALUES ('" . $user_id . "', '" . $product_id . "', '" . $rate_point . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
	}
?>