<?php
	class home_controller {
		function __construct() {

		}

		function run() {

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : "index";
			switch ($action_GET) {
				case 'login':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if(!$action_POST) {
						if(!isset($_SESSION["current_user"])) {
							require_once("views/frontend/sign_in.php");
							break;
						} else {
							header("Location: index.php?controller=home");
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
							header("Location: index.php?controller=home&action=login");
							break;
						} else {
							$_SESSION["current_user"] = $result;
							unset($_SESSION["CART"]);
							header("Location: index.php?controller=home");
							break;
						}
					}
					break;

				case 'logout':
					unset($_SESSION["current_user"]);
					header("Location: index.php?controller=home");
					break;

				case 'signup':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if(!$action_POST) {
						require_once("views/frontend/sign_up.php");
						break;
					} else {
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
						$new_user->set_user_group_id(1);
						$new_user->set_description('Tài khoản của khách hàng');



						$user_service = new User_service();
						$result = $user_service->createUser($new_user);

						if (!$result) {
							$_SESSION["sign_up_account_fail"] = "Đăng ký tài khoản thất bại, xin hãy thử lại !";
						} else {
							$_SESSION["sign_up_account_successful"] = "Đăng ký tài khoản thành công !";
							$account = $user_service->checkLoginAccount($new_user);
							$_SESSION["current_user"] = $account;
							unset($_SESSION["CART"]);

						}
						header("Location: index.php?controller=home&action=signup_result");
						break;
					}

				case 'signup_result':
					require_once("views/frontend/sign_up_result.php");
					break;

				case 'index':
					$category_service = new Category_service();
					$categories = $category_service->seeAllcategory();

					$product_service = new Product_service();
					$newest_products = $product_service->getNewestProductsWithLimit(8);
					$most_comment_products = $product_service->getMostCommentProductsWithLimit(4);

					$manufacturer_service = new Manufacturer_service();
					$manufacturers = $manufacturer_service->seeAllmanufacturer();

					$comment_service = new Comment_service();
					$comments = $comment_service->seeAllComment();

					$product_comments = array();
					foreach($comments as $row) {
						$product_comments[$row["productname"]][] = $row;
					}

					require_once("views/frontend/home.php");
					break;
				
				default:
					# code...
					break;
			}
		}
	}
?>