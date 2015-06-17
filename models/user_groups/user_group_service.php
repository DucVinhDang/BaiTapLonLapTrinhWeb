<?php 
	class User_group_service {
		var $user_group_database;

		function __construct() {
			$this->user_group_database = new User_group_db();		
		}

		function createUserGroup(User_group $new_user_group) {
			/*Kiem tra user_group xem co trung hay khong*/
			/*Goi den phuong thuc insert() cua DA*/
			// user_group_DB::insert()		
			$result = $this->user_group_database->insert_user_group($new_user_group);
			return $result;
		}

		function seeAllUserGroup() {
			$result = $this->user_group_database->all_user_group();
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function deleteUserGroup($usergroupId) {
			$result = $this->user_group_database->delete_user_group($usergroupId);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function editUserGroup(User_group $edit_user_group) {
			$result = $this->user_group_database->edit_user_group($edit_user_group);
			if (!$result) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showUserGroupById($usergroupId) {
			$result = $this->user_group_database->show_user_group_by_id($usergroupId);
			if (!isset($result)) {
				print mysql_error();
				exit();
			} else {
				return $result;
			}
		}

		function showUserGroupInRange($first, $last) {
			$result = $this->user_group_database->show_user_group_in_range($first, $last);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; } 
		}

		function searchUserGroupByKeyword($keyword) {
			$result = $this->user_group_database->search_user_group_by_keyword($keyword);
			if(isset($result)) {
				$arr = array();
				while($row =  mysql_fetch_array($result)) {
				    $arr[] = $row;
				}
				return $arr;
			} else { return NULL; }
		}

		function searchUserGroupByKeywordInRange($keyword, $first, $last) {
			$result = $this->user_group_database->search_user_group_by_keyword_in_range($keyword, $first, $last);
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