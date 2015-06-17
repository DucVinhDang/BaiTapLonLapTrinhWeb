<?php 
	class Product_service {
		var $product_database;

		function __construct() {
			$this->product_database = new Product_db();		
		}

		function createProduct(Product $new_product) {
			/*Kiem tra product xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// product_DB::insert()		
			$result = $this->product_database->insert_product($new_product);
			return $result;
		}

		function seeAllproduct() {
			$result = $this->product_database->all_product();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function seeAllproductWithLimit($limit) {
			$result = $this->product_database->all_product_with_limit($limit);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}


		function deleteProduct($productId) {
			$result = $this->product_database->delete_product($productId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editProduct(Product $edit_product) {
			$result = $this->product_database->edit_product($edit_product);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showProductById($productId) {
			$result = $this->product_database->show_product_by_id($productId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showProductInRange($first, $last) {
			$result = $this->product_database->show_product_in_range($first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function searchProductByKeyword($keyword) {
			$result = $this->product_database->search_product_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function searchProductByKeywordInRange($keyword, $first, $last) {
			$result = $this->product_database->search_product_by_keyword_in_range($keyword, $first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function showManufacturerOfProductById($productId) {
			$result = $this->product_database->show_manufacturer_of_product_by_id($productId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function getProductCountByCategoryId($categoryId) {
			$result = $this->product_database->get_product_count_by_category_id($categoryId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function getProductsInTheSameCategory($category_name, $current_product_id) {
			$result = $this->product_database->get_products_in_the_same_category($category_name, $current_product_id);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function getNewestProductsWithLimit($limit) {
			$result = $this->product_database->get_newest_products_with_limit($limit);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function getMostCommentProductsWithLimit($limit) {
			$result = $this->product_database->get_most_comment_products_with_limit($limit);
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