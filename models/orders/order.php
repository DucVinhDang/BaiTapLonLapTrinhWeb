<?php
	class Order {
		var $order_id;
		var $user_id;
		var $description;
		var $order_date;
		var $receiver_address;
		var $receiver_phone;
		var $customer_request;
		var $shipping_method;
		var $payment_method;
		var $transaction_id;
		var $status;

		function __construct() {

		}

		// SET METHODS //

		function set_order_id($order_id) {
			$this->order_id = $order_id;
		}

		function set_user_id($user_id) {
			$this->user_id = $user_id;
		}

		function set_description($description) {
			$this->description = $description;
		}

		function set_order_date($order_date) {
			$this->order_date = $order_date;
		}

		function set_receiver_address($receiver_address) {
			$this->receiver_address = $receiver_address;
		}

		function set_receiver_phone($receiver_phone) {
			$this->receiver_phone = $receiver_phone;
		}

		function set_customer_request($customer_request) {
			$this->customer_request = $customer_request;
		}

		function set_shipping_method($shipping_method) {
			$this->shipping_method = $shipping_method;
		}

		function set_payment_method($payment_method) {
			$this->payment_method = $payment_method;
		}

		function set_transaction_id($transaction_id) {
			$this->transaction_id = $transaction_id;
		}

		function set_status($status) {
			$this->status = $status;
		}

		// GET METHODS //

		function get_order_id() {
			return $this->order_id;
		}

		function get_user_id() {
			return $this->user_id;
		}

		function get_description() {
			return $this->description;
		}

		function get_order_date() {
			return $this->order_date;
		}

		function get_receiver_address() {
			return $this->receiver_address;
		}

		function get_receiver_phone() {
			return $this->receiver_phone;
		}

		function get_customer_request() {
			return $this->customer_request;
		}

		function get_shipping_method() {
			return $this->shipping_method;
		}

		function get_payment_method() {
			return $this->payment_method;
		}

		function get_transaction_id() {
			return $this->transaction_id;
		}

		function get_status() {
			return $this->status;
		}		
	}
?>