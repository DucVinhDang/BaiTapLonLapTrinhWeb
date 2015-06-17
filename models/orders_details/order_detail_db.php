<?php
	class Orders_details_db {
		var $db_core;

		function __construct() {
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Order_detail $new_order_detail) {

			$order_id = $new_order_detail->get_order_id();
			$product_id = $new_order_detail->get_product_id();
			$quantity = $new_order_detail->get_quantity();

			$queryCommand = "INSERT INTO orders_details(order_id, product_id, quantity) VALUES ('" . $order_id . "', '" . $product_id . "', '" . $quantity . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
	}
?>