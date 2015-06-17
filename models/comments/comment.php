<?php
	class Comment {
		var $comment_id;
		var $user_id;
		var $product_id;
		var $comment;
		var $description;

		function __construct() {

		}

		// SET METHODS //

		function set_comment_id($comment_id) {
			$this->comment_id = $comment_id;
		}

		function set_user_id($user_id) {
			$this->user_id = $user_id;
		}

		function set_product_id($product_id) {
			$this->product_id = $product_id;
		}

		function set_comment($comment) {
			$this->comment = $comment;
		}

		function set_description($description) {
			$this->description = $description;
		}

		// GET METHODS //

		function get_comment_id() {
			return $this->comment_id;
		}

		function get_user_id() {
			return $this->user_id;
		}

		function get_product_id() {
			return $this->product_id;
		}

		function get_comment() {
			return $this->comment;
		}

		function get_description() {
			return $this->description;
		}
	}
?>