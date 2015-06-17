<?php
	class User_db {
		var $db_core;

		function __construct() {
			// $this->db_core = $_SESSION["DB_CORE"];
			$this->connect_db();
		}

		function connect_db() {
			$this->db_core = new DBCORE('mysql');
			$this->db_core->db_connect();
		}

		function insert_user(User $new_user) {
			$new_fullname = $new_user->get_fullname();
			$new_address = $new_user->get_address();
			$new_phone_number = $new_user->get_phone_number();
			$new_email = $new_user->get_email();
			$new_password = $new_user->get_password();
			$new_avatar = $new_user->get_avatar();
			$new_description = $new_user->get_description();
			$new_user_group_id = $new_user->get_user_group_id();

			$queryCommand = "INSERT INTO users(fullname, address, phone_number, email, password, avatar, description, user_group_id) VALUES ('" . $new_fullname . "','" . $new_address . "', '" . $new_phone_number . "', '" . $new_email . "', '" . $new_password . "', '" . $new_avatar . "', '" . $new_description . "' , '" . $new_user_group_id . "')";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function all_user() {
			$queryCommand = "select u.user_id, u.fullname, u.address, u.phone_number, u.email, u.password, u.avatar, u.description, ug.name as user_group_id
			from users as u inner join user_groups as ug on u.user_group_id = ug.user_group_id";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function delete_user($user_id) {
			$queryCommand = "DELETE FROM users WHERE user_id = " . $user_id;
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return false; }
			else { return true; }
		}

		function edit_user(User $edit_user) {
			$user_id = $edit_user->get_user_id();
			$new_fullname = $edit_user->get_fullname();
			$new_address = $edit_user->get_address();
			$new_phone_number = $edit_user->get_phone_number();
			$new_email = $edit_user->get_email();
			$new_password = $edit_user->get_password();
			$new_avatar = '';
			if($edit_user->get_avatar() != '') {
				$new_avatar = $edit_user->get_avatar();
			}
			$new_description = $edit_user->get_description();
			$new_user_group_id = $edit_user->get_user_group_id();

			$queryCommand = "UPDATE users SET fullname = '" . $new_fullname . "', address ='" . $new_address . "', phone_number = '" . $new_phone_number . "', email = '" . $new_email . "', password = '" . $new_password . "', description = '" . $new_description . "', user_group_id = '" . $new_user_group_id . "' WHERE user_id = " . $user_id;
			$queryResult1 = $this->db_core->db_query($queryCommand);

			$queryResult2 = true;
			if($new_avatar!='') {
				$queryCommand = "UPDATE users SET avatar = '" . $new_avatar ."' WHERE user_id = " . $user_id;
				$queryResult2 = $this->db_core->db_query($queryCommand);
			}
			if($queryResult1==true && $queryResult2==true) { return true; }
			else { return false; }
		}

		function show_user_by_id($user_id) {
			$queryCommand = "select u.user_id, u.fullname, u.address, u.phone_number, u.email, u.password, u.avatar, u.description, u.created_at, ug.name as user_group_id
			from users as u inner join user_groups as ug on u.user_group_id = ug.user_group_id WHERE u.user_id = " . $user_id;
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);

			if(!$result) { return NULL; }
			else { return $result; }
		}

		function search_user_by_keyword($keyword) {
			$queryCommand = "select u.user_id, u.fullname, u.address, u.phone_number, u.email, u.password, u.avatar, u.description, ug.name as user_group_id
			from users as u inner join user_groups as ug on u.user_group_id = ug.user_group_id WHERE u.user_id LIKE '%" . $keyword . "%' OR u.fullname LIKE '%" . $keyword . "%' OR u.address LIKE '%" . $keyword . "%' OR u.phone_number LIKE '%" . $keyword . "%' OR u.email LIKE '%" . $keyword . "%' OR u.description LIKE '%" . $keyword . "%' OR u.user_group_id LIKE '%" . $keyword . "%'";
			$queryResult = $this->db_core->db_query($queryCommand);

			if(!$queryResult) { return NULL; }
			else { return $queryResult; }
		}

		function check_login_account($account) {
			$email = $account->get_email();
			$password = md5($account->get_password());

			$queryCommand = "SELECT * FROM users WHERE email = '" . $email . "' AND password ='" . $password . "'";
			$queryResult = $this->db_core->db_query($queryCommand);
			$result = $this->db_core->db_fetch_array($queryResult);
			if(!$result) { return false; }
			else { return $result; }
		}
	}
?>