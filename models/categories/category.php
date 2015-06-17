<?php
	class Category {
		var $category_id;
		var $name;
		var $description;

		function __construct() {

		}

		// SET METHODS //

		function set_category_id($category_id) {
			$this->category_id = $category_id;
		}

		function set_name($name) {
			$this->name = $name;
		}

		function set_description($description) {
			$this->description = $description;
		}

		// GET METHODS //

		function get_category_id() {
			return $this->category_id;
		}

		function get_name() {
			return $this->name;
		}

		function get_description() {
			return $this->description;
		}
	}
?>