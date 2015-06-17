<?php
	class Manufacturer_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_manufacturer(Manufacturer $new_manufacturer) {
			$name = $new_manufacturer->get_name();
			$description = $new_manufacturer->get_description();
			$phone_number = $new_manufacturer->get_phone_number();
			$address = $new_manufacturer->get_address();
			$avatar = $new_manufacturer->get_avatar();

			$queryCommand = "INSERT INTO manufacturers(name, description, phone_number, address, avatar) VALUES ('" . $name . "', '" . $description . "', '" . $phone_number . "', '" . $address . "', '" . $avatar . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_manufacturer() {
			$queryCommand = "SELECT * FROM manufacturers";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_manufacturer($manufacturer_id) {
			$queryCommand = "DELETE FROM manufacturers WHERE manufacturer_id = " . $manufacturer_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_manufacturer(Manufacturer $edit_manufacturer) {
			$manufacturer_id = $edit_manufacturer->get_manufacturer_id();
			$edit_name = $edit_manufacturer->get_name();
			$edit_description = $edit_manufacturer->get_description();
			$edit_phone_number = $edit_manufacturer->get_phone_number();
			$edit_address = $edit_manufacturer->get_address();
			$edit_avatar = '';
			if($edit_manufacturer->get_avatar() != '') {
				$edit_avatar = $edit_manufacturer->get_avatar();
			}

			$queryCommand = "UPDATE manufacturers SET name = '" . $edit_name . "', description = '" . $edit_description . "', phone_number = '" . $edit_phone_number . "', address = '" . $edit_address . "' WHERE manufacturer_id = " . $manufacturer_id;
			$queryResult1 = $this->db_core->db_query($queryCommand);

			$queryResult2 = true;
			if($edit_avatar!='') {
				$queryCommand = "UPDATE manufacturers SET avatar = '" . $edit_avatar ."' WHERE manufacturer_id = " . $manufacturer_id;
				$queryResult2 = $this->db_core->db_query($queryCommand);
			}
			if($queryResult1==true && $queryResult2==true) { return true; }
			else { return false; }
		}

		function show_manufacturer_by_id($manufacturer_id) {
			$queryCommand = "SELECT * FROM manufacturers WHERE manufacturer_id = " . $manufacturer_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function show_manufacturer_in_range($first, $last) {
			$queryCommand = "SELECT * FROM manufacturers LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_manufacturer_by_keyword($keyword) {
			$queryCommand = "SELECT * FROM manufacturers WHERE manufacturer_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%' OR phone_number LIKE '%" . $keyword . "%' OR address LIKE '%" . $keyword . "%' OR avatar LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_manufacturer_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "SELECT * FROM manufacturers WHERE manufacturer_id LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%' OR phone_number LIKE '%" . $keyword . "%' OR address LIKE '%" . $keyword . "%' OR avatar LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}
	}
?>