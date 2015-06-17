<?php
	class Product {
		var $product_id;
		var $category_id;
		var $manufacturer_id;
		var $name;
		var $price;
		var $quantity;
		var $age;
		var $gender;
		var $avatar;
		var $quick_review;
		var $status;
		var $description;

		function __construct() {

		}

		// SET METHODS //

		function set_product_id($product_id) {
			$this->product_id = $product_id;
		}

		function set_category_id($category_id) {
			$this->category_id = $category_id;
		}

		function set_manufacturer_id($manufacturer_id) {
			$this->manufacturer_id = $manufacturer_id;
		}

		function set_name($name) {
			$this->name = $name;
		}

		function set_price($price) {
			$this->price = $price;
		}

		function set_quantity($quantity) {
			$this->quantity = $quantity;
		}

		function set_age($age) {
			$this->age = $age;
		}

		function set_gender($gender) {
			$this->gender = $gender;
		}

		function set_avatar($avatar) {
			$this->avatar = $avatar;
		}

		function set_quick_review($quick_review) {
			$this->quick_review = $quick_review;
		}

		function set_status($status) {
			$this->status = $status;
		}

		function set_description($description) {
			$this->description = $description;
		}
		
		// GET METHODS //

		function get_product_id() {
			return $this->product_id;
		}

		function get_category_id() {
			return $this->category_id;
		}

		function get_manufacturer_id() {
			return $this->manufacturer_id;
		}

		function get_name() {
			return $this->name;
		}

		function get_price() {
			return $this->price;
		}

		function get_quantity() {
			return $this->quantity;
		}

		function get_age() {
			return $this->age;
		}

		function get_gender() {
			return $this->gender;
		}

		function get_avatar() {
			return $this->avatar;
		}

		function get_quick_review() {
			return $this->quick_review;
		}

		function get_status() {
			return $this->status;
		}

		function get_description() {
			return $this->description;
		}
	}
?>