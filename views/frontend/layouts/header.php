<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Shop đồ chơi đa dạng dành cho trẻ em</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/layouts/header.css">
	</head>
	<body>
		<div class="home-navbar">
			<div class="home-navbar-left">
				<ul>
					<li id="home-navbar-brand"><a href="index.php">Trang chủ</a></li>
					<li><a href="#">Danh mục<span class="glyphicon glyphicon-menu-down" style="margin-left: 10px; margin-right: 0px;" aria-hidden="true"></span></a>
						<div class="categories-form">
							<?php
								foreach($categories as $row) {
									echo '<div class="col-md-4">';
									if(isset($_SESSION["current_user"])) { 
										if($_SESSION["current_user"]["user_group_id"] == 1) { echo '<a href="index.php?controller=category&action=show&category_id='.$row["category_id"].'">' . $row["name"] . '</a>'; }
										else { echo '<a href="admin.php?controller=category&action=show&category_id='.$row["category_id"].'">' . $row["name"] . '</a>'; }
									} else {
										echo '<a href="index.php?controller=category&action=show&category_id='.$row["category_id"].'">' . $row["name"] . '</a>';
									}
									echo '</div>';
								}
							?>
						</div>
					</li>
					<li><a href="#">Nổi bật</a></li>
					<li><a href="#">Chúng tôi</a></li>
					<li>
						<div class="input-group search-group">
					     	<input type="text" class="form-control" placeholder="Nhập nội dung cần tìm">
					      	<span class="input-group-btn">
					        	<button class="btn btn-default" type="button">Tìm kiếm</button>
					      	</span>
					    </div>
					</li>
				</ul>
				
			</div>
			<div class="home-navbar-right">
				<ul>
					<?php
					if(!isset($_SESSION["current_user"])) {
						echo '
							<li><a href="index.php?controller=home&action=login">Đăng nhập</a></li>
							<li><a href="index.php?controller=home&action=signup">Đăng ký</a></li>
						';
					} else {
						$a = $_SESSION["current_user"];
						echo "<li><a href='index.php?controller=user&action=show&user_id=" . $a["user_id"] . "'><img src='" . $a["avatar"] . "' class='img-circle current-user-avatar'></a></li>";
						echo "<li><a href='index.php?controller=user&action=show&user_id=" . $a["user_id"] . "'>" . $a["email"] . "</a></li>";
						echo "<li><a href='index.php?controller=home&action=logout'>Đăng xuất</a></li>";
					}
					
					?>
				</ul>
			</div>
		</div>

		<div class="jumbotron">
<!-- 		    <h1>Hello, world!</h1>
		    <p>...</p>
		    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
		</div>

	</body>
</html>