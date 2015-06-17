<?php
	class category_controller {
		function __construct() {

		}

		function run() {
			

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$category = new Category();
						require_once("views/backend/categories/add_category.php");
						break;
					}		

					$new_category = new Category();
					$new_category->set_name($_POST['newname']);
					$new_category->set_description($_POST['newdescription']);

					$category_service = new Category_service();
					$result = $category_service->createCategory($new_category);

					if (!$result) {
						$_SESSION["create_category_fail"] = "Thêm mới danh mục thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_category_successful"] = "Tạo danh mục mới thành công !";
					}
					header("Location: admin.php?controller=category");
					break;

				case 'edit':
					$category_id = $_GET["category_id"];
					$action_POST = isset($_POST["category_id"]) ? $_POST["category_id"] : '';
					if (empty($action_POST)) {
						$category_service = new Category_service();
						$result = $category_service->showCategoryById($category_id);
						require_once("views/backend/categories/edit_category.php");
						break;
					}

					$edit_category = new Category();
					$edit_category->set_category_id($_POST['category_id']);
					$edit_category->set_name($_POST['editname']);
					$edit_category->set_description($_POST['editdescription']);

					$category_service = new Category_service();
					$result = $category_service->editCategory($edit_category);

					if (!$result) {
						$_SESSION["edit_category_fail"] = "Chỉnh sửa danh mục thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_category_successful"] = "Chỉnh sửa danh mục thành công !";
					}
					header("Location: admin.php?controller=category");
					break;

				case 'delete':
					$category_id = $_GET["category_id"];
					$category_service = new Category_service();
					$result = $category_service->deleteCategory($category_id);

					if (!$result) {
						$_SESSION["delete_category_fail"] = "Xóa danh mục thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_category_successful"] = "Xóa danh mục thành công !";
					}
					header("Location: admin.php?controller=category");
					break;

				case 'search':
					$category_service = new Category_service();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $category_service->searchCategoryByKeyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1) {
						$result = $category_service->searchCategoryByKeywordInRange($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $category_service->showCategoryInRange(0,5);
					}
					require_once("views/backend/categories/index.php");
					break;

				case 'show':
					$category_service = new Category_service();
					$result = $category_service->showCategoryById($_GET["category_id"]);
					$products = $category_service->getAllProductsFromCategoryById($_GET["category_id"]);

					if(!isset($_SESSION["current_user"])) {
						$category_service = new Category_service();
						$categories = $category_service->seeAllcategory();

						require_once("views/frontend/categories/show_category.php");
					} else {
						$a = $_SESSION["current_user"];
						if($a["user_group_id"] == 1) {
							$category_service = new Category_service();
							$categories = $category_service->seeAllcategory();
							
							require_once("views/frontend/categories/show_category.php");
						} else if ($a["user_group_id"] == 2) {
							require_once("views/backend/categories/show_category.php");
						}
					}

					break;

				default:
					$category_service = new Category_service();
					$page_number = $category_service->seeAllcategory();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $category_service->showCategoryInRange(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $category_service->showCategoryInRange(0,5);
					}
					require_once("views/backend/categories/index.php");
					break;
			}

		}
	}
?>