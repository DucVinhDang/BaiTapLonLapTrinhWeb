<?php 
	class Comment_service {
		var $comment_database;

		function __construct() {
			$this->comment_database = new Comment_db();		
		}

		function createComment(comment $new_comment) {
			/*Kiem tra comment xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// comment_DB::insert()		
			$result = $this->comment_database->insert_comment($new_comment);
			return $result;
		}

		function seeAllComment() {
			$result = $this->comment_database->all_comment();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function deleteComment($commentId) {
			$result = $this->comment_database->delete_comment($commentId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editComment(comment $edit_comment) {
			$result = $this->comment_database->edit_comment($edit_comment);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showCommentById($commentId) {
			$result = $this->comment_database->show_comment_by_id($commentId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showCommentInRange($first, $last) {
			$result = $this->comment_database->show_comment_in_range($first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function searchCommentByKeyword($keyword) {
			$result = $this->comment_database->search_comment_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function searchCommentByKeywordInRange($keyword, $first, $last) {
			$result = $this->comment_database->search_comment_by_keyword_in_range($keyword, $first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function getAllCommentsFromProductById($productId) {
			$result = $this->comment_database->get_all_comments_from_product_by_id($productId);
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