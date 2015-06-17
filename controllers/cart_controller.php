<?php
	class cart_controller {
		function __construct() {

		}

		function run() {
			$category_service = new Category_service();
			$categories = $category_service->seeAllcategory();

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					if(!isset($_SESSION["current_user"])) {
						header("Location: index.php?controller=home&action=login");
						break;
					}
					$product_id = $_GET["product_id"];
					$quantity_to_add = isset($_GET["product_quantity"]) ? $_GET["product_quantity"] : 1;

					$list_product = array();

					$product_service = new Product_service();
					$all_products = $product_service->seeAllproduct();

					foreach($all_products as $row) {
						$list_product[$row["product_id"]] = $row;
					}

					if(!isset($_SESSION["CART"])) {
						$list_product[$product_id]["cart_quantity"] = $quantity_to_add;
						$_SESSION["CART"][$product_id] = $list_product[$product_id];
					} else {
						if(array_key_exists($product_id, $_SESSION["CART"])) {
							if($_SESSION["CART"][$product_id]["cart_quantity"] <= (5-intval($quantity_to_add))) {
								$_SESSION["CART"][$product_id]["cart_quantity"] += $quantity_to_add;
							}
						} else {
							$list_product[$product_id]["cart_quantity"] = $quantity_to_add;
							$_SESSION["CART"][$product_id] = $list_product[$product_id];
						}
					}
					header("Location: index.php");
					break;

				case 'edit':
					$cartQuantity = $_POST["cartQuantity"];
					foreach ($cartQuantity as $key => $value) {
						$_SESSION["CART"][$key]["cart_quantity"] = $value;
					}
					header("Location: index.php?controller=cart");
					break;

				case 'delete':
					$product_id = $_GET["product_id"];
					unset($_SESSION["CART"][$product_id]);
					if(count($_SESSION["CART"])==0) {
						unset($_SESSION["CART"]);
					}
					header("Location: index.php?controller=cart");
					break;

				case 'show':

					break;

				case 'deleteall':
					unset($_SESSION["CART"]);
					header("Location: index.php?controller=cart");
					break;

				case 'paymentmethod':
					
					require_once("views/frontend/carts/payment_method.php");
					break;

				case 'paymentconfirm':
					include("publics/library/nganluong/nganluong.php");
					require_once("views/frontend/carts/payment_confirm.php");
					break;

				case 'paymentcomplete':
					
					require_once("views/frontend/carts/payment_complete.php");
					break;

				default:
					$products = array();
					if(isset($_SESSION["CART"])) {
						$products = $_SESSION["CART"];
					}

					require_once("views/frontend/carts/index.php");
					break;
			}

		}
	}
?>