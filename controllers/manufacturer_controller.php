<?php
	class manufacturer_controller {
		function __construct() {

		}

		function run() {
			

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$manufacturer = new Manufacturer();
						require_once("views/backend/manufacturers/add_manufacturer.php");
						break;
					}

					$avatar_target_dir = "uploads/manufacturers/";
					$avatar_target_file = $avatar_target_dir . basename($_FILES["newavatar"]["name"]);
					$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
					move_uploaded_file($_FILES["newavatar"]["tmp_name"], $avatar_target_file);

					$new_manufacturer = new Manufacturer();
					$new_manufacturer->set_name($_POST['newname']);
					$new_manufacturer->set_description($_POST['newdescription']);
					$new_manufacturer->set_phone_number($_POST['newphonenumber']);
					$new_manufacturer->set_address($_POST['newaddress']);
					$new_manufacturer->set_avatar($avatar_target_file);

					$manufacturer_service = new Manufacturer_service();
					$manufacturer_service->createManufacturer($new_manufacturer);

					if (!$manufacturer_service) {
						$_SESSION["create_manufacturer_fail"] = "Thêm mới nhà cung cấp thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_manufacturer_successful"] = "Tạo nhà cung cấp mới thành công !";
					}
					header("Location: admin.php?controller=manufacturer");
					break;

				case 'edit':
					$manufacturer_id = $_GET["manufacturer_id"];
					$action_POST = isset($_POST["manufacturer_id"]) ? $_POST["manufacturer_id"] : '';
					if (empty($action_POST)) {
						$manufacturer_service = new Manufacturer_service();
						$result = $manufacturer_service->showManufacturerById($manufacturer_id);
						require_once("views/backend/manufacturers/edit_manufacturer.php");
						break;
					}

					$avatar_link = basename($_FILES["editavatar"]["name"]);
					$avatar_target_file = '';
					if($avatar_link!='') {
						$avatar_target_dir = "uploads/manufacturers/";
						$avatar_target_file = $avatar_target_dir . basename($_FILES["editavatar"]["name"]);
						$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["editavatar"]["tmp_name"], $avatar_target_file);
					}

					$edit_manufacturer = new Manufacturer();
					$edit_manufacturer->set_manufacturer_id($_POST['manufacturer_id']);
					$edit_manufacturer->set_name($_POST['editname']);
					$edit_manufacturer->set_description($_POST['editdescription']);
					$edit_manufacturer->set_phone_number($_POST['editphonenumber']);
					$edit_manufacturer->set_address($_POST['editaddress']);
					$edit_manufacturer->set_avatar($avatar_target_file);

					$manufacturer_service = new Manufacturer_service();
					$manufacturer_service->editManufacturer($edit_manufacturer);

					if (!$manufacturer_service) {
						$_SESSION["edit_manufacturer_fail"] = "Chỉnh sửa nhà cung cấp thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_manufacturer_successful"] = "Chỉnh sửa nhà cung cấp thành công !";
					}
					header("Location: admin.php?controller=manufacturer");
					break;

				case 'delete':
					$manufacturer_id = $_GET["manufacturer_id"];
					$manufacturer_service = new Manufacturer_service();
					$manufacturer_service->deleteManufacturer($manufacturer_id);

					if (!$manufacturer_service) {
						$_SESSION["delete_manufacturer_fail"] = "Xóa nhà cung cấp thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_manufacturer_successful"] = "Xóa nhà cung cấp thành công !";
					}
					header("Location: admin.php?controller=manufacturer");
					break;

				case 'search':
					$manufacturer_service = new Manufacturer_service();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $manufacturer_service->searchManufacturerByKeyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1) {
						$result = $manufacturer_service->searchManufacturerByKeywordInRange($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $manufacturer_service->showManufacturerInRange(0,5);
					}
					require_once("views/backend/manufacturers/index.php");
					break;

				case 'show':
					$manufacturer_service = new Manufacturer_service();
					$result = $manufacturer_service->showManufacturerById($_GET["manufacturer_id"]);
					require_once("views/backend/manufacturers/show_manufacturer.php");
					break;

				default:
					$manufacturer_service = new Manufacturer_service();
					$page_number = $manufacturer_service->seeAllmanufacturer();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $manufacturer_service->showManufacturerInRange(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $manufacturer_service->showManufacturerInRange(0,5);
					}
					require_once("views/backend/manufacturers/index.php");
					break;
			}

		}
	}
?>