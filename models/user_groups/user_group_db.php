<?php
	class User_group_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_user_group(User_group $new_user_group) {
			$new_name = $new_user_group->get_name();
			$new_description = $new_user_group->get_description();

			$queryCommand = "INSERT INTO user_groups(name, description) VALUES ('" . $new_name . "','" . $new_description . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_user_group() {
			$queryCommand = "SELECT * FROM user_groups";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_user_group($user_group_id) {
			$queryCommand = "DELETE FROM user_groups WHERE user_group_id = " . $user_group_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_user_group(User_group $edit_user_group) {
			$user_group_id = $edit_user_group->get_user_group_id();
			$edit_name = $edit_user_group->get_name();
			$edit_description = $edit_user_group->get_description();

			$queryCommand = "UPDATE user_groups SET name = '" . $edit_name . "', description = '" . $edit_description . "' WHERE user_group_id = " . $user_group_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_user_group_by_id($user_group_id) {
			$queryCommand = "SELECT * FROM user_groups WHERE user_group_id = " . $user_group_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function show_user_group_in_range($first, $last) {
			$queryCommand = "SELECT * FROM user_groups LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_user_group_by_keyword($keyword) {
			$queryCommand = "SELECT * FROM user_groups WHERE user_group_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_user_group_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "SELECT * FROM user_groups WHERE user_group_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}
	}
?>