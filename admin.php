<?php
	session_start();
	
	require_once 'views/backend/layouts/share_view.php';

	require_once "models/users/user.php";
	require_once "models/users/user_db.php";
	require_once "models/users/user_service.php";
	require_once "config/db_core.php";

	require_once "models/categories/category.php";
	require_once "models/categories/category_db.php";
	require_once "models/categories/category_service.php";

	require_once "models/manufacturers/manufacturer.php";
	require_once "models/manufacturers/manufacturer_db.php";
	require_once "models/manufacturers/manufacturer_service.php";

	require_once "models/products/product.php";
	require_once "models/products/product_db.php";
	require_once "models/products/product_service.php";

	require_once "models/comments/comment.php";
	require_once "models/comments/comment_db.php";
	require_once "models/comments/comment_service.php";

	require_once "models/user_groups/user_group.php";
	require_once "models/user_groups/user_group_db.php";
	require_once "models/user_groups/user_group_service.php";

	// $db_core = new DBCORE('mysql');
	// $db_core->db_connect();

	// $_SESSION["DB_CORE"] = $db_core;

	$controller = isset($_GET["controller"]) ? strtolower($_GET["controller"]) : "admin";
	require_once("controllers/" . $controller . "_controller.php");
	// require_once("models/" . $controller . "_model.php");
	// require_once("models/" . $controller . ".php");	

	$controller_class = $controller . "_controller()";
	$cmd = '$controller = new ' . $controller_class . ';';
	eval($cmd);
	$controller->run();
?>