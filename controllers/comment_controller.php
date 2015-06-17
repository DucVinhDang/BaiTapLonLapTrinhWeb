<?php
	class comment_controller {
		function __construct() {

		}

		function run() {
			

			$action_GET = isset($_GET["action"]) ? $_GET["action"] : '';
			//die('action='.$action_GET);
			switch ($action_GET) {
				case 'add':
					if(!isset($_SESSION["current_user"])) {
						header("Location: index.php");
					} else {
						if($_SESSION["current_user"]["user_group_id"] == 2) {
							$action_POST = isset($_POST["submit"]) ? $_POST["submit"] : '';
							if (empty($action_POST)) {
								$comment = new Comment();

								$product_service = new Product_service();
								$products = $product_service->seeAllproduct();

								$user_service = new User_service();
								$users = $user_service->seeAllUser();

								require_once("views/backend/comments/add_comment.php");
								break;
							}		

							$new_comment = new Comment();
							$new_comment->set_product_id($_POST['newproductid']);
							$new_comment->set_user_id($_POST['newuserid']);
							$new_comment->set_comment($_POST['newcomment']);
							$new_comment->set_description($_POST['newdescription']);

							$comment_service = new Comment_service();
							$result = $comment_service->createComment($new_comment);

							if (!$result) {
								$_SESSION["create_comment_fail"] = "Thêm mới bình luận thất bại, xin hãy thử lại !";
							} else {
								$_SESSION["create_comment_successful"] = "Tạo bình luận mới thành công !";
							}
							header("Location: admin.php?controller=comment");
							break;
						} else if($_SESSION["current_user"]["user_group_id"] == 1) {
							
							$new_comment = new Comment();
							$new_comment->set_product_id($_GET['newproductid']);
							$new_comment->set_user_id($_GET['newuserid']);
							$new_comment->set_comment($_GET['newcomment']);
							$new_comment->set_description($_GET['newdescription']);

							$comment_service = new Comment_service();
							$result = $comment_service->createComment($new_comment);

							if (!$result) {
								$_SESSION["create_comment_fail"] = "Thêm mới bình luận thất bại, xin hãy thử lại !";
							} else {
								$_SESSION["create_comment_successful"] = "Tạo bình luận mới thành công !";
							}
							header("Location: index.php?controller=product&action=show&product_id=" . $_GET['newproductid']);
							break;
						}
					}
					break;

				case 'edit':
					$comment_id = $_GET["comment_id"];
					$action_POST = isset($_POST["comment_id"]) ? $_POST["comment_id"] : '';
					if (empty($action_POST)) {
						$comment_service = new Comment_service();
						$result = $comment_service->showCommentById($comment_id);

						$product_service = new Product_service();
						$products = $product_service->seeAllproduct();

						$user_service = new User_service();
						$users = $user_service->seeAllUser();
						require_once("views/backend/comments/edit_comment.php");
						break;
					}

					$edit_comment = new Comment();
					$edit_comment->set_comment_id($_POST['comment_id']);
					$edit_comment->set_product_id($_POST['editproductid']);
					$edit_comment->set_user_id($_POST['edituserid']);
					$edit_comment->set_comment($_POST['editcomment']);
					$edit_comment->set_description($_POST['editdescription']);

					$comment_service = new Comment_service();
					$result = $comment_service->editComment($edit_comment);

					if (!$result) {
						$_SESSION["edit_comment_fail"] = "Chỉnh sửa danh mục thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["edit_comment_successful"] = "Chỉnh sửa danh mục thành công !";
					}
					header("Location: admin.php?controller=comment");
					break;

				case 'delete':
					$comment_id = $_GET["comment_id"];
					$comment_service = new Comment_service();
					$result = $comment_service->deleteComment($comment_id);

					if (!$result) {
						$_SESSION["delete_comment_fail"] = "Xóa người dùng thất bại, xin hãy thử lại !";
					} else {
						$_SESSION["delete_comment_successful"] = "Xóa người dùng thành công !";
					}
					header("Location: admin.php?controller=comment");
					break;

				case 'search':
					$comment_service = new Comment_service();
					if(!isset($keyword)) { $keyword = ''; }
					$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : $keyword;
					$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : $keyword;
					$page_number = $comment_service->searchCommentByKeyword($keyword);
					$page_number = ceil(count($page_number)/5);
					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1) {
						$result = $comment_service->searchCommentByKeywordInRange($keyword, 5*($_GET["page"] - 1),5);
					} else {
						$result = $comment_service->showCommentInRange(0,5);
					}
					require_once("views/backend/comments/index.php");
					break;

				case 'show':
					$comment_service = new Comment_service();
					$result = $comment_service->showCommentById($_GET["comment_id"]);
					$products = $comment_service->getAllProductsFromCommentById($_GET["comment_id"]);

					if(!isset($_SESSION["current_user"])) {
						$comment_service = new Comment_service();
						$comments = $comment_service->seeAllcomment();

						require_once("views/frontend/comments/show_comment.php");
					} else {
						$a = $_SESSION["current_user"];
						if($a["user_group_id"] == 1) {
							$comment_service = new Comment_service();
							$comments = $comment_service->seeAllcomment();
							
							require_once("views/frontend/comments/show_comment.php");
						} else if ($a["user_group_id"] == 2) {
							require_once("views/backend/comments/show_comment.php");
						}
					}

					break;

				default:
					$comment_service = new Comment_service();
					$page_number = $comment_service->seeAllcomment();
					$page_number = ceil(count($page_number)/5);

					if (!isset($_GET["page"])) {
						$_GET["page"] = 1;
					}

					if($_GET["page"] >= 1 && $_GET["page"] <= $page_number) {
						$result = $comment_service->showCommentInRange(5*($_GET["page"] - 1),5);
					} else {
						$_GET["page"] = $_GET["page"] = 1 ? 1 : $page_number;
						$result = $comment_service->showCommentInRange(0,5);
					}
					require_once("views/backend/comments/index.php");
					break;
			}

		}
	}
?>