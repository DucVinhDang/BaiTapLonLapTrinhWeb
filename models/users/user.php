<?php
	class User {
		var $user_id;
		var $fullname;
		var $address;
		var $phone_number;
		var $email;
		var $password;
		var $avatar;
		var $description;
		var $user_group_id;

		function __construct() {

		}

		// SET METHODS //

		function set_user_id($user_id) {
			$this->user_id = $user_id;
		}

		function set_fullname($fullname) {
			$this->fullname = $fullname;
		}

		function set_address($address) {
			$this->address = $address;
		}

		function set_phone_number($phone_number) {
			$this->phone_number = $phone_number;
		}

		function set_email($email) {
			$this->email = $email;
		}

		function set_password($password) {
			$this->password = $password;
		}

		function set_avatar($avatar) {
			$this->avatar = $avatar;
		}

		function set_description($description) {
			$this->description = $description;
		}

		function set_user_group_id($user_group_id) {
			$this->user_group_id = $user_group_id;
		}

		// GET METHODS //

		function get_user_id() {
			return $this->user_id;
		}

		function get_fullname() {
			return $this->fullname;
		}

		function get_address() {
			return $this->address;
		}

		function get_phone_number() {
			return $this->phone_number;
		}

		function get_email() {
			return $this->email;
		}

		function get_password() {
			return $this->password;
		}

		function get_avatar() {
			return $this->avatar;
		}

		function get_description() {
			return $this->description;
		}

		function get_user_group_id() {
			return $this->user_group_id;
		}

	}
?>