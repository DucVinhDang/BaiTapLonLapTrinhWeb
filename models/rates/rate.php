<?php
	class Rate {
		var $rate_id;
		var $user_id;
		var $product_id;
		var $rate_point;

		function __construct() {

		}

		// SET METHODS //

		function set_rate_id($rate_id) {
			$this->rate_id = $rate_id;
		}

		function set_user_id($user_id) {
			$this->user_id = $user_id;
		}

		function set_product_id($product_id) {
			$this->product_id = $product_id;
		}

		function set_rate_point($point) {
			$this->rate_point = $rate_point;
		}

		// GET METHODS //

		function get_rate_id() {
			return $this->rate_id;
		}

		function get_user_id() {
			return $this->user_id;
		}

		function get_product_id() {
			return $this->product_id;
		}

		function get_rate_point() {
			return $this->rate_point;
		}
	}
?>