<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Danh mục <?php echo $result["name"] ?></title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/categories/show_category.css">
	</head>
	<body>
		<?php
			$view = new Share_view();
			echo $view->render('views/frontend/layouts/personal_sidebar.php',null); 
			require_once 'views/frontend/layouts/header.php';
		?>

		<div class="home-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 home-body-left">
						<ol class="breadcrumb breadcrumb-form">
						    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="index.php">Trang chủ</a></li>
						    <li class="active">Danh mục <?php echo $result["name"] ?></li>
						</ol>
						<div class="title-product-form"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Sản phẩm thuộc danh mục <?php echo $result["name"] ?></div>
						<div class="row">
							<?php foreach($products as $row) { ?>
								<div class="col-md-3">
									<div class="sub-product">
										<?php 
											if(isset($_SESSION["current_user"])) { 
												$a = $_SESSION["current_user"];
												if($a["user_group_id"] == 1) { echo '<a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="' . $row["avatar"] . '"></a>'; }
												else { echo '<a href="admin.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="' . $row["avatar"] . '"></a>'; }
											} else {
												echo '<a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="' . $row["avatar"] . '"></a>';
											}
										?>
										<div class="title"><?php echo $row["name"] ?></div>
										<div class="price-form"><?php echo $row["price"] . " đ" ?></div>
										<div class="rate-form">
											<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
										</div>
										<?php echo '<a href="index.php?controller=cart&action=add&product_id='.$row["product_id"].'"><button type="button" class="btn btn-success add-to-cart-btn"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cho vào giỏ</button></a>'; ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-3 home-body-right">
						<?php require_once 'views/frontend/layouts/right_sidebar.php' ?>
					</div>
				</div>
			</div>
		</div>

		<?php
			$view = new Share_view();
			echo $view->render('views/frontend/layouts/footer.php',null);
		?>

	</body>
</html>