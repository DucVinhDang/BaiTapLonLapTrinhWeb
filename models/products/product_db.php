<?php
	class Product_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_product(Product $new_product) {

			// $product_id = $new_product->get_product_id();
			$category_id = $new_product->get_category_id();
			$manufacturer_id = $new_product->get_manufacturer_id();
			$name = $new_product->get_name();
			$price = $new_product->get_price();
			$quantity = $new_product->get_quantity();
			$age = $new_product->get_age();
			$gender = $new_product->get_gender();
			$avatar = $new_product->get_avatar();
			$quick_review = $new_product->get_quick_review();
			$status = $new_product->get_status();
			$description = $new_product->get_description();

			$queryCommand = 'INSERT INTO products(category_id, manufacturer_id, name, price, quantity, age, gender, avatar, quick_review, status, description) VALUES ("' . $category_id . '", "' . $manufacturer_id . '", "' . $name . '", "' . $price . '", "' . $quantity . '", "' . $age . '", "' . $gender . '", "' . $avatar . '", "' . $quick_review . '", "' . $status . '", "' . $description . '")';
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_product() {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function all_product_with_limit($limit) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id limit ".$limit;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_product($product_id) {
			$queryCommand = "DELETE FROM products WHERE product_id = " . $product_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_product(Product $edit_product) {
			$product_id = $edit_product->get_product_id();
			$category_id = $edit_product->get_category_id();
			$manufacturer_id = $edit_product->get_manufacturer_id();
			$name = $edit_product->get_name();
			$price = $edit_product->get_price();
			$quantity = $edit_product->get_quantity();
			$age = $edit_product->get_age();
			$gender = $edit_product->get_gender();
			$avatar = '';
			if($edit_product->get_avatar() != '') {
				$avatar = $edit_product->get_avatar();
			}
			$quick_review = $edit_product->get_quick_review();
			$status = $edit_product->get_status();
			$description = $edit_product->get_description();
		

			$queryCommand = 'UPDATE products SET category_id = ' . $category_id . ', manufacturer_id = ' . $manufacturer_id . ', name = "' . $name . '", price = ' . $price . ', quantity = ' . $quantity . ', age = ' . $age . ', gender = ' . $gender . ', quick_review = "' . $quick_review . '", status = ' . $status . ', description = "' . $description . '" WHERE product_id = ' . $product_id;
			$queryResult1 = $this->db_core->db_query($queryCommand);

			$queryResult2 = true;
			if($avatar!='') {
				$queryCommand = 'UPDATE products SET avatar = "' . $avatar . '" WHERE product_id = ' . $product_id;
				$queryResult2 = $this->db_core->db_query($queryCommand);
			}
			if($queryResult1==true && $queryResult2==true) { return true; }
			else { return false; }
		}

		function show_product_by_id($product_id) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description, p.created_at
					from products as p inner join categories as c on p.category_id = c.category_id
					inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id where p.product_id = " . $product_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function show_product_in_range($first, $last) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description, p.created_at
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id limit " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_product_by_keyword($keyword) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description, p.created_at
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id WHERE p.product_id LIKE '%" . $keyword . "%' OR c.name LIKE '%" . $keyword . "%' OR m.name LIKE '%" . $keyword . "%' OR p.name LIKE '%" . $keyword . "%' OR p.price LIKE '%" . $keyword . "%' OR p.quantity LIKE '%" . $keyword . "%' OR p.age LIKE '%" . $keyword . "%' OR p.gender LIKE '%" . $keyword . "%' OR p.avatar LIKE '%" . $keyword . "%' OR p.quick_review LIKE '%" . $keyword . "%' OR p.status LIKE '%" . $keyword . "%' OR p.description LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);
			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_product_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description, p.created_at
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id WHERE p.product_id LIKE '%" . $keyword . "%' OR c.name LIKE '%" . $keyword . "%' OR m.name LIKE '%" . $keyword . "%' OR p.name LIKE '%" . $keyword . "%' OR p.price LIKE '%" . $keyword . "%' OR p.quantity LIKE '%" . $keyword . "%' OR p.age LIKE '%" . $keyword . "%' OR p.gender LIKE '%" . $keyword . "%' OR p.avatar LIKE '%" . $keyword . "%' OR p.quick_review LIKE '%" . $keyword . "%' OR p.status LIKE '%" . $keyword . "%' OR p.description LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function show_manufacturer_of_product_by_id($product_id) {
			$queryCommand = "SELECT * FROM manufacturers WHERE manufacturer_id = (SELECT manufacturer_id FROM products where product_id = " . $product_id . ")";
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function get_product_count_by_category_id($category_id) {
			$queryCommand = "SELECT COUNT(*) FROM products WHERE category_id = " . $category_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function get_products_in_the_same_category($category_name, $current_product_id) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id where c.name = '{$category_name}' AND p.product_id <> {$current_product_id}";
			
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return $queryResult; }
		}

		function get_newest_products_with_limit($limit) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id limit ".$limit;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function get_most_comment_products_with_limit($limit) {
			$queryCommand = "select p.product_id, c.name as categoryname, m.name as manufacturername, p.name, p.price, p.quantity, p.age, p.gender, p.avatar, p.quick_review, p.status, p.description, cm.comment_count
			from products as p inner join categories as c on p.category_id = c.category_id
			inner join manufacturers as m on p.manufacturer_id = m.manufacturer_id inner join (select product_id, count(comment) as comment_count from comments group by product_id) as cm where p.product_id = cm.product_id order by cm.comment_count DESC limit ".$limit;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}
	}
?>