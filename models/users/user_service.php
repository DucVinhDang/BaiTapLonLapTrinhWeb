<?php 
	class User_service {
		var $user_database;

		function __construct() {
			$this->user_database = new User_db();		
		}

		function createUser(User $new_user) {
			/*Kiem tra user xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// USER_DB::insert()		
			$result = $this->user_database->insert_user($new_user);
			return $result;
		}

		function seeAllUser() {
			$result = $this->user_database->all_user();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function deleteUser($userId) {
			$result = $this->user_database->delete_user($userId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editUser(User $edit_user) {
			$result = $this->user_database->edit_user($edit_user);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showUserById($userId) {
			$result = $this->user_database->show_user_by_id($userId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function searchUserByKeyword($keyword) {
			$result = $this->user_database->search_user_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function checkLoginAccount($account) {
			$result = $this->user_database->check_login_account($account);
			return $result;
		}
	}



 ?>