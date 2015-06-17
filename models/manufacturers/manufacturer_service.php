<?php 
	class Manufacturer_service {
		var $manufacturer_database;

		function __construct() {
			$this->manufacturer_database = new Manufacturer_db();		
		}

		function createManufacturer(Manufacturer $new_manufacturer) {
			/*Kiem tra category xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// category_DB::insert()		
			$result = $this->manufacturer_database->insert_manufacturer($new_manufacturer);
			return $result;
		}

		function seeAllmanufacturer() {
			$result = $this->manufacturer_database->all_manufacturer();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function deleteManufacturer($manufacturerId) {
			$result = $this->manufacturer_database->delete_manufacturer($manufacturerId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editManufacturer(Manufacturer $edit_manufacturer) {
			$result = $this->manufacturer_database->edit_manufacturer($edit_manufacturer);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showManufacturerById($manufacturerId) {
			$result = $this->manufacturer_database->show_manufacturer_by_id($manufacturerId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showManufacturerInRange($first, $last) {
			$result = $this->manufacturer_database->show_manufacturer_in_range($first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function searchManufacturerByKeyword($keyword) {
			$result = $this->manufacturer_database->search_manufacturer_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function searchManufacturerByKeywordInRange($keyword, $first, $last) {
			$result = $this->manufacturer_database->search_manufacturer_by_keyword_in_range($keyword, $first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}
	}



 ?>