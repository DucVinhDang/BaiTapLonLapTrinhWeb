<?php

	class user_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'login':
					require_once("views/frontend/sign_in.php");
					break;
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$user = new User();
						$user_group_service = new User_group_service();
						$user_groups = $user_group_service->seeAllUserGroup();
						require_once("views/backend/users/add_user.php");
						break;
					}

					$avatar_target_dir = "uploads/users/";
					$avatar_target_file = $avatar_target_dir . basename($_FILES["newavatar"]["name"]);
					$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
					move_uploaded_file($_FILES["newavatar"]["tmp_name"], $avatar_target_file);	

					$new_user = new User();
					$new_user->set_fullname($_POST['newfullname']);
					$new_user->set_address($_POST['newaddress']);
					$new_user->set_phone_number($_POST['newphonenumber']);
					$new_user->set_email($_POST['newemail']);
					$new_user->set_password($_POST['newpassword']);
					$new_user->set_avatar($avatar_target_file);
					$new_user->set_user_group_id($_POST['newusergroupid']);
					$new_user->set_description($_POST['newdescription']);

					$user_service = new User_service();
					$user_service->createUser($new_user);

					if (!$user_service) {
						$_SESSION["create_user_fail"] = "Thêm mới người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_user_successful"] = "Tạo tài khoản mới thành công !";
					}
					header("Location: admin.php?controller=user");
					break;

				case 'edit':
					
					$user_id = $_GET["user_id"];
					$action_POST = isset($_POST["user_id"]) ? $_POST["user_id"] : '';
					if (empty($action_POST)) {
						$user_service = new User_service();
						$result = $user_service->showUserById($user_id);

						$user_group_service = new User_group_service();
						$user_groups = $user_group_service->seeAllUserGroup();

						require_once("views/backend/users/edit_user.php");
						break;
					}

					$avatar_link = basename($_FILES["editavatar"]["name"]);
					$avatar_target_file = '';
					if($avatar_link!='') {
						$avatar_target_dir = "uploads/users/";
						$avatar_target_file = $avatar_target_dir . basename($_FILES["editavatar"]["name"]);
						$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["editavatar"]["tmp_name"], $avatar_target_file);
					}

					$edit_user = new User();
					$edit_user->set_user_id($_POST['user_id']);
					$edit_user->set_fullname($_POST['editfullname']);
					$edit_user->set_address($_POST['editaddress']);
					$edit_user->set_phone_number($_POST['editphonenumber']);
					$edit_user->set_email($_POST['editemail']);
					$edit_user->set_password($_POST['editpassword']);
					$edit_user->set_avatar($avatar_target_file);
					$edit_user->set_user_group_id($_POST['editusergroupid']);
					$edit_user->set_description($_POST['editdescription']);

					$user_service = new User_service();
					$user_service->editUser($edit_user);

					if (!$user_service) {
						$_SESSION["edit_user_fail"] = "Chỉnh sửa tài khoản thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_user_successful"] = "Chỉnh sửa tài khoản thành công !";
					}
					header("Location: admin.php?controller=user");
					break;

				case 'delete':
					$user_id = $_GET["user_id"];
					$user_service = new User_service();
					$user_service->deleteUser($user_id);

					if (!$user_service) {
						$_SESSION["delete_user_fail"] = "Xóa người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_user_successful"] = "Xóa người dùng thành công !";
					}
					header("Location: admin.php?controller=user");
					break;

				case 'search':
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : '';
					$user_service = new User_service();
					$result = $user_service->searchUserByKeyword($keyword);
					require_once("views/backend/users/index.php");
					break;

				case 'show':
					$a = $_SESSION["current_user"];

					$user_service = new User_service();
					$result = $user_service->showUserById($_GET["user_id"]);
					if($a["user_group_id"] == 1) {
						require_once("views/frontend/users/show_user.php");
					} else if ($a["user_group_id"] == 2) {
						require_once("views/backend/users/show_user.php");
					}
					break;

				default:
					$user_service = new User_service();
					$result = $user_service->seeAllUser();
					require_once("views/backend/users/index.php");

					break;
			}

		}
	}
?>