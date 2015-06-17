<?php
	class Manufacturer {
		var $manufacturer_id;
		var $name;
		var $description;
		var $phone_number;
		var $address;
		var $avatar;

		function __construct() {

		}

		// SET METHODS //

		function set_manufacturer_id($manufacturer_id) {
			$this->manufacturer_id = $manufacturer_id;
		}

		function set_name($name) {
			$this->name = $name;
		}

		function set_description($description) {
			$this->description = $description;
		}

		function set_phone_number($phone_number) {
			$this->phone_number = $phone_number;
		}

		function set_address($address) {
			$this->address = $address;
		}

		function set_avatar($avatar) {
			$this->avatar = $avatar;
		}

		// GET METHODS //

		function get_manufacturer_id() {
			return $this->manufacturer_id;
		}

		function get_name() {
			return $this->name;
		}

		function get_description() {
			return $this->description;
		}

		function get_phone_number() {
			return $this->phone_number;
		}

		function get_address() {
			return $this->address;
		}

		function get_avatar() {
			return $this->avatar;
		}
	}
?>