<?php
	class Order_db {
		var $db_core;

		function __construct() {
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert(Order $new_order) {

			$user_id = $new_order->get_user_id();
			$description = $new_order->get_description();
			$order_date = $new_order->get_order_date();
			$receiver_address = $new_order->get_receiver_address();
			$receiver_phone = $new_order->get_receiver_phone();
			$customer_request = $new_order->get_customer_request();
			$shipping_method = $new_order->get_shipping_method();
			$payment_method = $new_order->get_payment_method();
			$transaction_id = $new_order->get_transaction_id();
			$status = $new_order->get_status();

			$queryCommand = "INSERT INTO orders(user_id, description, order_date, receiver_address, receiver_phone, customer_request, shipping_method, payment_method, transaction_id, status) VALUES ('" . $user_id . "', '" . $description . "', '" . $order_date . "', '" . $receiver_address . "', '" . $receiver_phone . "', '" . $customer_request . "', '" . $shipping_method . "', '" . $payment_method . "', '" . $transaction_id . "', '" . $status . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}
	}
?>