<?php
	class Order_detail {
		var $order_detail_id;
		var $order_id;
		var $product_id;
		var $quantity;

		function __construct() {

		}

		// SET METHODS //

		function set_order_detail_id($order_detail_id) {
			$this->order_detail_id = $order_detail_id;
		}

		function set_order_id($order_id) {
			$this->order_id = $order_id;
		}

		function set_product_id($product_id) {
			$this->product_id = $product_id;
		}

		function set_quantity($quantity) {
			$this->quantity = $quantity;
		}

		// GET METHODS //

		function get_order_detail_id() {
			return $this->order_detail_id;
		}

		function get_order_id() {
			return $this->order_id;
		}

		function get_product_id() {
			return $this->product_id;
		}

		function get_quantity() {
			return $this->quantity;
		}
 	}
?>