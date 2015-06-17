<?php
	class admin_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : 'index';
			switch ($action_GET) {
				case 'login':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if(!$action_POST) {
						if(!isset($_SESSION["current_user"])) {
							require_once("views/frontend/sign_in.php");
							break;
						} else {
							header("Location: admin.php?controller=admin");
							break;
						}
					} else {
						$current_user = new User();
						$current_user->set_email($_POST["email"]);
						$current_user->set_password($_POST["password"]);

						$user_service = new User_service();
						$result = $user_service->checkLoginAccount($current_user);
						if(!$result) {
							$_SESSION["login_fail"] = "Đăng nhập thất bại, xin mời thử lại";
							header("Location: admin.php?controller=admin");
							break;
						} else {
							$_SESSION["current_user"] = $result;
							header("Location: admin.php?controller=admin");
							break;
						}
					}
					break;

				case 'logout':
					unset($_SESSION["current_user"]);
					header("Location: admin.php?controller=admin");
					break;

				case 'index':
					if(!isset($_SESSION["current_user"])) {
						header("Location: admin.php?controller=admin&action=login");
						break;
					} else {
						if($_SESSION["current_user"]["user_group_id"]!=2) {
							header("Location: index.php");
						}
						require_once("views/backend/admin.php");
					}
					# code...
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>