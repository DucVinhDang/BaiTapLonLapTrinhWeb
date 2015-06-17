<?php
	class user_group_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$user_group = new User_group();
						require_once("views/backend/use_groups/add_user_group.php");
						break;
					}		

					$new_user_group = new User_group();
					$new_user_group->set_name($_POST['newname']);
					$new_user_group->set_description($_POST['newdescription']);

					$user_group_service = new User_group_service();
					$user_group_service->createUserGroup($new_user_group);

					if (!$user_group_service) {
						$_SESSION["create_user_group_fail"] = "Thêm mới nhóm người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_user_group_successful"] = "Tạo nhóm người dùng mới thành công !";
					}
					header("Location: admin.php?controller=user_group");
					break;

				case 'edit':
					$user_group_id = $_GET["user_group_id"];
					$action_POST = isset($_POST["user_group_id"]) ? $_POST["user_group_id"] : '';
					if (empty($action_POST)) {
						$user_group_service = new User_group_service();
						$result = $user_group_service->showUserGroupById($user_group_id);
						require_once("views/backend/user_groups/edit_user_group.php");
						break;
					}

					$edit_user_group = new User_group();
					$edit_user_group->set_user_group_id($_POST['user_group_id']);
					$edit_user_group->set_name($_POST['editname']);
					$edit_user_group->set_description($_POST['editdescription']);

					$user_group_service = new User_group_service();
					$user_group_service->editUserGroup($edit_user_group);

					if (!$user_group_service) {
						$_SESSION["edit_user_group_fail"] = "Chỉnh sửa nhóm người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_user_group_successful"] = "Chỉnh sửa nhóm người dùng thành công !";
					}
					header("Location: admin.php?controller=user_group");
					break;

				case 'delete':
					$user_group_id = $_GET["user_group_id"];
					$user_group_service = new User_group_service();
					$user_group_service->deleteUserGroup($user_group_id);

					if (!$user_group_service) {
						$_SESSION["delete_user_group_fail"] = "Xóa nhóm người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_user_group_successful"] = "Xóa nhóm người dùng thành công !";
					}
					header("Location: admin.php?controller=user_group");
					break;

				case 'search':
					$user_group_service = new User_group_service();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $user_group_service->searchUserGroupByKeyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1) {
						$result = $user_group_service->searchUserGroupByKeywordInRange($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $user_group_service->showUserGroupInRange(0,5);
					}
					require_once("views/backend/user_groups/index.php");
					break;

				case 'show':
					$user_group_service = new User_group_service();
					$result = $user_group_service->showUserGroupById($_GET["user_group_id"]);
					require_once("views/backend/user_groups/show_user_group.php");
					break;

				default:
					$user_group_service = new User_group_service();
					$page_number = $user_group_service->seeAllUserGroup();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $user_group_service->showUserGroupInRange(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : page_number;
						$result = $user_group_service->showUserGroupInRange(0,5);
					}
					require_once("views/backend/user_groups/index.php");
					break;
			}

		}
	}
?>