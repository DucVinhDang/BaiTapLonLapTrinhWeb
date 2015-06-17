<?php
	class Comment_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_comment(Comment $new_comment) {
			
			$user_id = $new_comment->get_user_id();
			$product_id = $new_comment->get_product_id();
			$comment = $new_comment->get_comment();
			$description = $new_comment->get_description();

			$queryCommand = "INSERT INTO comments(user_id, product_id, comment, description) VALUES ('" . $user_id . "', '" . $product_id . "', '" . $comment . "', '" . $description . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_comment() {
			$queryCommand = "select c.comment_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join 
			users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_comment($comment_id) {
			$queryCommand = "DELETE FROM comments WHERE comment_id = " . $comment_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_comment(comment $edit_comment) {
			$comment_id = $edit_comment->get_comment_id();
			$user_id = $edit_comment->get_user_id();
			$product_id = $edit_comment->get_product_id();
			$comment = $edit_comment->get_comment();
			$description = $edit_comment->get_description();

			$queryCommand = "UPDATE comments SET user_id = '" . $user_id . "', product_id = '" . $product_id . "', comment = '" . $comment . "', description = '" . $description . "' WHERE comment_id = " . $comment_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function show_comment_by_id($comment_id) {
			$queryCommand = "select c.comment_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join 
			users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id where c.comment_id = " . $comment_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function show_comment_in_range($first, $last) {
			$queryCommand = "select c.comment_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join 
			users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_comment_by_keyword($keyword) {
			$queryCommand = "select c.comment_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join 
			users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id WHERE c.comment_id LIKE '%" . $keyword . "%' OR c.comment LIKE '%" . $keyword . "%' OR c.description LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function search_comment_by_keyword_in_range($keyword, $first, $last) {
			$queryCommand = "select c.comment_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join 
			users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id WHERE c.comment_id LIKE '%" . $keyword . "%' OR c.comment LIKE '%" . $keyword . "%' OR c.description LIKE '%" . $keyword . "%' LIMIT " . $first . ", " . $last;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function get_all_comments_from_product_by_id($product_id) {
			$queryCommand = "select c.comment_id, c.product_id, c.user_id, u.fullname as username, u.avatar as useravatar, p.name as productname, c.comment, c.description, c.created_at from comments as c inner join users as u on c.user_id = u.user_id inner join products as p on c.product_id = p.product_id WHERE c.product_id = " . $product_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}
	}
?>