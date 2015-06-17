<?php
	require_once "layouts/share_view.php";
?>
<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Trang quản trị</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	    <style>
	    	body {
				font-family: Helvetica;
				font-size: 13px;
				background-color: #f1f1f1;
				margin: 0px;
				padding: 0px;
			}

			span {
				margin-right: 5px;
			}

			.admin-navbar {
				background-color: #3a3a3a;
				padding: 0px;
				margin-bottom: 0px;
				width: 100%;
				float: left;

				position: fixed;
				top: 0;
				left: 0;
				z-index: 9999;
			}

			.admin-navbar ul {
				list-style: none;
				background: #3a3a3a;
			}

			.admin-navbar ul li {
				display: block;
				position: relative;
				float: left;
			}

			.admin-navbar #admin-navbar-brand {
				background-color: #4a4a4a;
			}

			.admin-navbar ul li:hover {
				background-color: #4a4a4a;
				transition: background-color 0.4s;
			}

			.admin-navbar ul li a {
				display: block;
				text-decoration: none;
				color: white;
				padding: 15px 25px;
			}

			.admin-navbar .admin-navbar-left {
				float: left;
				
			}

			.admin-navbar .admin-navbar-right {
				float: right;
				margin-right: 30px;
			}

			.admin-main-body {
				margin-top: 48px;
			}

			.admin-caregory-list {
				margin: 10px -5px;
				position: fixed;
				z-index: 5;
				min-width: 220px;
			}

			.admin-caregory-list span {
				color: #d3d3d3;
			}

			.admin-caregory-list li {
				border-radius: 0px !important;
				background-color: #5a5a5a;
				border: 0px;
				padding: 20px 18px;
			}

			.admin-caregory-list li:hover {
				background-color: #6a6a6a;
				transition: background-color 0.3s;
			}

			.admin-caregory-list li a {
				text-decoration: none;
				color: white;
				margin-left: 15px;
			}

			.admin-caregory-list ul {
				list-style: none;
				padding: 0px;
				margin: 0px;
			}

			.admin-caregory-list ul li {
				display: block;
				position: relative;
				float: left;
			}

			.admin-caregory-list ul li a:hover {
				transition: background 0.5s ease;
			}

			.admin-caregory-list li ul {
				display: none;
			}

			.admin-caregory-list li:hover > ul {
				display: block;
				position: absolute;
			}

			.admin-caregory-list li:hover ul li {
				background-color: #6a6a6a;
				min-width: 230px;
				z-index: 1;
			}

			.admin-caregory-list li:hover ul li:hover {
				background-color: #5a5a5a;
				transition: background 0.5s ease;
			}

			.admin-caregory-list li:hover ul li a {
				margin: 5px;
			}

			.admin-caregory-list ul {
				left: 100%;
				top: 0;
			}

	    </style>
	</head>
	<body>
		<div class="admin-navbar">
			<div class="admin-navbar-left">
				<ul>
					<li id="admin-navbar-brand"><a href="index.php">Trang chủ</a></li>
				</ul>
			</div>
			<div class="admin-navbar-right">
				<ul>
					<?php
						$a = $_SESSION["current_user"];
						echo "<li><a href='admin.php?controller=user&action=show&user_id=" . $a["user_id"] . "'>" . $a["email"] . "</a></li>";
					?>
					<li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Thông báo</a></li>
					<li><a href="admin.php?controller=admin&action=logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>Thoát</a></li>
				</ul>
			</div>
		</div>

		<div class="container-fluid admin-main-body">
			<div class="row">
				<div class="col-md-2" style="height: 100%">
					<ul class="list-group admin-caregory-list">
						<li class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Dashboard</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span><a href="?controller=category">Quản lý danh mục</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span><a href="#">Quản lý mặt hàng</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="?controller=product">Danh sách mặt hàng</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Tình trạng mặt hàng</a></li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><a href="?controller=manufacturer">Quản lý nhà cung cấp</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><a href="#">Quản lý đánh giá</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><a href="?controller=comment">Quản lý bình luận</a></li>
						<li class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Quản lý người dùng</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-th-list" style="margin-right: 12px;" aria-hidden="true"></span><a href="?controller=user">Danh sách người dùng</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-bookmark" style="margin-right: 12px;" aria-hidden="true"></span><a href="?controller=user_group">Nhóm người dùng</a></li>	
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><a href="#">Quản lý hóa đơn</a><span class="glyphicon glyphicon-menu-right" style="float: right;" aria-hidden="true"></span>
							<ul>
								<li class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Danh sách hóa đơn</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-credit-card" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Phương thức thanh toán</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-road" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Phương thức vận chuyển</a></li>
								<li class="list-group-item"><span class="glyphicon glyphicon-flag" style="margin-right: 12px;" aria-hidden="true"></span><a href="#">Trạng thái hóa đơn</a></li>
							</ul>
						</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span><a href="#">Thống kê, báo cáo</a></li>
					</ul>
				</div>
				<div class="col-md-10">
				<!-- Chỗ này dùng để render các view đến -->
<!-- 	 			</div>

			</div>
		</div> -->
					
	</body>
</html>