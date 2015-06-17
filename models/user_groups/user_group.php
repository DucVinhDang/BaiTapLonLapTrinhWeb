<?php
	class User_group {
		var $user_group_id;
		var $name;
		var $description;

		function __construct() {

		}

		// SET METHODS //

		function set_user_group_id($user_group_id) {
			$this->user_group_id = $user_group_id;
		}

		function set_name($name) {
			$this->name = $name;
		}

		function set_description($description) {
			$this->description = $description;
		}

		// GET METHODS //

		function get_user_group_id() {
			return $this->user_group_id;
		}

		function get_name() {
			return $this->name;
		}

		function get_description() {
			return $this->description;
		}
	}
?>