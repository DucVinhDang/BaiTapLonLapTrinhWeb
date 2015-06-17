<?php
	class product_controller {
		function __construct() {

		}

		function run() {
			

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
					if (empty($action_POST)) {
						$product = new Product();

						$category_service = new Category_service();
						$categories = $category_service->seeAllcategory();

						$manufacturer_service = new Manufacturer_service();
						$manufacturers = $manufacturer_service->seeAllmanufacturer();

						require_once("views/backend/products/add_product.php");
						break;
					}		

					$avatar_target_dir = "uploads/products/";
					$avatar_target_file = $avatar_target_dir . basename($_FILES["newavatar"]["name"]);
					$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
					move_uploaded_file($_FILES["newavatar"]["tmp_name"], $avatar_target_file);

					$new_product = new Product();
					$new_product->set_category_id($_POST['newcategoryid']);
					$new_product->set_manufacturer_id($_POST['newmanufacturerid']);
					$new_product->set_name($_POST['newname']);
					$new_product->set_price($_POST['newprice']);
					$new_product->set_quantity($_POST['newquantity']);
					$new_product->set_age($_POST['newage']);
					$new_product->set_gender($_POST['newgender']);
					$new_product->set_avatar($avatar_target_file);
					$new_product->set_quick_review($_POST['newquickreview']);
					$new_product->set_status($_POST['newstatus']);
					$new_product->set_description(htmlspecialchars($_POST['newdescription'], ENT_COMPAT));

					$product_service = new Product_service();
					$product_service->createProduct($new_product);

					if (!$product_service) {
						$_SESSION["create_product_fail"] = "Thêm mới sản phẩm thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["create_product_successful"] = "Tạo sản phẩm mới thành công !";
					}
					header("Location: admin.php?controller=product");
					break;

				case 'edit':
					$product_id = $_GET["product_id"];
					$action_POST = isset($_POST["product_id"]) ? $_POST["product_id"] : '';
					if (empty($action_POST)) {
						$product_service = new Product_service();
						$result = $product_service->showProductById($product_id);

						$category_service = new Category_service();
						$categories = $category_service->seeAllcategory();

						$manufacturer_service = new Manufacturer_service();
						$manufacturers = $manufacturer_service->seeAllmanufacturer();
						
						require_once("views/backend/products/edit_product.php");
						break;
					}

					$avatar_link = basename($_FILES["editavatar"]["name"]);
					$avatar_target_file = '';
					if($avatar_link!='') {
						$avatar_target_dir = "uploads/products/";
						$avatar_target_file = $avatar_target_dir . basename($_FILES["editavatar"]["name"]);
						$productAvatarFileType = pathinfo($avatar_target_file, PATHINFO_EXTENSION);
						move_uploaded_file($_FILES["editavatar"]["tmp_name"], $avatar_target_file);
					}

					$edit_product = new Product();
					$edit_product->set_product_id($_POST["product_id"]);
					$edit_product->set_category_id($_POST['editcategoryid']);
					$edit_product->set_manufacturer_id($_POST['editmanufacturerid']);
					$edit_product->set_name($_POST['editname']);
					$edit_product->set_price($_POST['editprice']);
					$edit_product->set_quantity($_POST['editquantity']);
					$edit_product->set_age($_POST['editage']);
					$edit_product->set_gender($_POST['editgender']);
					$edit_product->set_avatar($avatar_target_file);
					$edit_product->set_quick_review($_POST['editquickreview']);
					$edit_product->set_status($_POST['editstatus']);
					$edit_product->set_description(htmlspecialchars($_POST['editdescription'], ENT_COMPAT));

					$product_service = new Product_service();
					$product_service->editProduct($edit_product);

					if (!$product_service) {
						$_SESSION["edit_product_fail"] = "Chỉnh sửa sản phẩm thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_product_successful"] = "Chỉnh sửa sản phẩm thành công !";
					}
					header("Location: admin.php?controller=product");
					break;

				case 'delete':
					$product_id = $_GET["product_id"];
					$product_service = new Product_service();
					$product_service->deleteProduct($product_id);

					if (!$product_service) {
						$_SESSION["delete_product_fail"] = "Xóa sản phẩm thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_product_successful"] = "Xóa sản phẩm thành công !";
					}
					header("Location: admin.php?controller=product");
					break;

				case 'search':
					$product_service = new Product_service();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $product_service->searchProductByKeyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1) {
						$result = $product_service->searchProductByKeywordInRange($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $product_service->showProductInRange(0,5);
					}
					require_once("views/backend/products/index.php");
					break;

				case 'show':
					$product_service = new Product_service();
					$result = $product_service->showProductById($_GET["product_id"]);
					$manufacturer = $product_service->showManufacturerOfProductById($_GET["product_id"]);

					if(!isset($_SESSION["current_user"])) {
						$category_service = new Category_service();
						$categories = $category_service->seeAllcategory();
						$manufacturer_service = new Manufacturer_service();
						$manufacturers = $manufacturer_service->seeAllmanufacturer();
						$comment_service = new Comment_service();
						$comments = $comment_service->getAllCommentsFromProductById($_GET["product_id"]);

						$products_same_category = $product_service->getProductsInTheSameCategory($result["categoryname"], $result["product_id"]);

						require_once("views/frontend/products/show_product.php");
					} else {
						$a = $_SESSION["current_user"];
						if($a["user_group_id"] == 1) {
							$category_service = new Category_service();
							$categories = $category_service->seeAllcategory();
							$manufacturer_service = new Manufacturer_service();
							$manufacturers = $manufacturer_service->seeAllmanufacturer();
							$comment_service = new Comment_service();
							$comments = $comment_service->getAllCommentsFromProductById($_GET["product_id"]);

							$products_same_category = $product_service->getProductsInTheSameCategory($result["categoryname"], $result["product_id"]);
							
							require_once("views/frontend/products/show_product.php");
						} else if ($a["user_group_id"] == 2) {
							require_once("views/backend/products/show_product.php");
						}
					}
					break;

				default:
					$product_service = new Product_service();
					$page_number = $product_service->seeAllproduct();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $product_service->showProductInRange(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $product_service->showProductInRange(0,5);
					}
					require_once("views/backend/products/index.php");
					break;
			}

		}
	}
?>