<?php 
	class Category_service {
		var $category_database;

		function __construct() {
			$this->category_database = new Category_db();		
		}

		function createCategory(Category $new_category) {
			/*Kiem tra category xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// category_DB::insert()		
			$result = $this->category_database->insert_category($new_category);
			return $result;
		}

		function seeAllcategory() {
			$result = $this->category_database->all_category();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function deleteCategory($categoryId) {
			$result = $this->category_database->delete_category($categoryId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editCategory(Category $edit_category) {
			$result = $this->category_database->edit_category($edit_category);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showCategoryById($categoryId) {
			$result = $this->category_database->show_category_by_id($categoryId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showCategoryInRange($first, $last) {
			$result = $this->category_database->show_category_in_range($first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function searchCategoryByKeyword($keyword) {
			$result = $this->category_database->search_category_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function searchCategoryByKeywordInRange($keyword, $first, $last) {
			$result = $this->category_database->search_category_by_keyword_in_range($keyword, $first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function getAllProductsFromCategoryById($categoryId) {
			$result = $this->category_database->get_all_products_from_category_by_id($categoryId);
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