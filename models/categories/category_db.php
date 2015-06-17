<?php
	class Category_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_category(Category $new_category) {
			
			$name = $new_category->get_name();
			$description = $new_category->get_description();

			$queryCommand = "INSERT INTO categories(name, description) VALUES ('" . $name . "', '" . $description . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_category() {
			$queryCommand = "SELECT * FROM categories";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_category($category_id) {
			$queryCommand = "DELETE FROM categories WHERE category_id = " . $category_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_category(Category $edit_category) {
			$category_id = $edit_category->get_category_id();
			$edit_name = $edit_category->get_name();
			$edit_description = $edit_category->get_description();

			$queryCommand = "UPDATE categories SET name = '" . $edit_name . "', description = '" . $edit_description . "' WHERE category_id = " . $category_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_category_by_id($category_id) {
			$queryCommand = "SELECT * FROM categories WHERE category_id = " . $category_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function show_category_in_range($first, $last) {
			$queryCommand = "SELECT * FROM categories LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_category_by_keyword($keyword) {
			$queryCommand = "SELECT * FROM categories WHERE category_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_category_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "SELECT * FROM categories WHERE category_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function get_all_products_from_category_by_id($category_id) {
			$queryCommand = "SELECT * FROM products WHERE category_id = " . $category_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}
	}
?>