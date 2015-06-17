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
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/home.css">
	</head>
	<body>
		<?php
			require_once 'views/frontend/layouts/personal_sidebar.php';
			require_once 'views/frontend/layouts/header.php';
		?>

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
<!-- 		  <ol class="carousel-indicators" style="z-index: 1">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol> -->

		  <!-- Wrapper for slides -->
  		<div class="carousel-inner" role="listbox">
  			<?php $passed_first_slide = false ?>
		  	<?php foreach($newest_products as $row) { ?>
		  		<?php if($passed_first_slide == false) {
		  			$passed_first_slide = true;
		  			echo '<div class="item active">'; }
		  		else { echo '<div class="item">'; } 

		  		?>
			    
			     	<div class="slide-body">
			     		<div class="row">
			     			<div class="col-md-3 slide-body-left">
			     				<?php
				     				if(isset($_SESSION["current_user"])) { 
										$a = $_SESSION["current_user"];
										if($a["user_group_id"] == 1) { echo '<a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="'. $row["avatar"] . '"></a>'; }
										else { echo '<a href="admin.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="'. $row["avatar"] . '"></a>'; }
									} else {
										echo '<a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'"><img src="'. $row["avatar"] . '"></a>';
									}
								?>
			     			</div>
			     			<div class="col-md-6 slide-body-center">
			     				<div class="title"><?php echo $row["name"] ?></div>
			     				<div class="row">
			     					<!-- <div class="col-md-4 slide-body-center-left">
			     						Takara Tomy là một thương hiệu đồ chơi từ Nhật Bản đã có 90 năm phát triển
			     					</div> -->
			     					<div class="col-md-12 slide-body-center-right">
			     						<?php echo $row["quick_review"] ?>
			     					</div>
			     				</div>
			     			</div>
			     			<div class="col-md-3 slide-body-right">
			     				<table class="table table-bordered">
									<tr>
										<th>Thông tin</th>
										<th>Mô tả</th>
									</tr>
									<tr>
										<td>Nhà cung cấp</td>
										<td><?php echo $row["manufacturername"] ?></td>
									</tr>
									<tr>
										<td>Độ tuổi phù hợp</td>
										<td><?php echo $row["age"] ?></td>
									</tr>
									<tr>
										<td>Giới tính</td>
										<td><?php echo $row["gender"] ?></td>
									</tr>
									<tr>
										<td>Giá</td>
										<td style="font-weight: bold;"><?php echo number_format($row["price"]) . " đ" ?></td>
									</tr>
									<tr class="warning">
								  		<td>Tình trạng</td>
								  		<td>
								  			<?php
								  				if ($row["quantity"]>0) {
								  					echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Còn hàng";
								  				} else {
								  					echo "Hết hàng";
								  				}
								  			?>
								  		</td>
								  	</tr>
								</table>
								<?php echo '<a href="index.php?controller=cart&action=add&product_id='.$row["product_id"].'"><button type="button" class="btn btn-success add-to-cart-btn"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cho vào giỏ</button></a>'; ?>
			     			</div>
			     		</div>
			     	</div>
			    </div>
			<?php } ?>
		</div>

		  	<!-- Controls -->
		    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>

		<div class="home-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 home-body-left">
						<div class="title-product-form"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Sản phẩm mới</div>
						<div class="row">
							<?php foreach($newest_products as $row) { ?>
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
										<div class="info-form">
											<div class="comment-form">
												<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
												<?php
													if(isset($product_comments[$row["name"]])) {
														echo count($product_comments[$row["name"]]);
													} else {
														echo "0";
													}
												?>
											</div>
											<p class="price"><?php echo number_format($row["price"]) . " đ" ?></p>
										</div>
										
										<?php echo '<a href="index.php?controller=cart&action=add&product_id='.$row["product_id"].'"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cho vào giỏ</button></a>'; ?>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="title-product-form"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Nhiều bình luận nhất</div>
						<div class="row">
							<?php foreach($most_comment_products as $row) { ?>
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
										<div class="info-form">
											<div class="comment-form">
												<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
												<?php
													if(isset($product_comments[$row["name"]])) {
														echo count($product_comments[$row["name"]]);
													} else {
														echo "0";
													}
												?>
											</div>
											<p class="price"><?php echo number_format($row["price"]) . " đ" ?></p>
										</div>
										<?php echo '<a href="index.php?controller=cart&action=add&product_id='.$row["product_id"].'"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cho vào giỏ</button></a>'; ?>
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
			require_once 'views/frontend/layouts/footer.php';
		?>

	</body>
</html>