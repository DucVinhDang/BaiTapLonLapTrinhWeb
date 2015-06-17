<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title><?php echo $result["name"]; ?></title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/products/show_product.css">
	    <script>
	    	function addProductToCart(productId) {
	    		var selector = document.getElementById('product-quantity');
    			var quantity = selector[selector.selectedIndex].value;
	    		window.location.href = "index.php?controller=cart&action=add&product_id=" + productId + "&product_quantity=" + quantity;
	    	}

	    	function addCommentToProduct(productId, userId) {
	    		var newcomment = document.getElementById('write-comment-textarea').value;
	    		var newdescription = 'a';
	    		window.location.href = "index.php?controller=comment&action=add&newproductid=" + productId + "&newuserid=" + userId + "&newcomment=" + newcomment + "&newdescription=" + newdescription;
	    	}

	    </script>
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
						    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
						    <li class="active"><?php echo $result["name"]; ?></li>
						</ol>

						<div class="product-intro-form">
							<div class="row">
								<div class="col-md-3 left-form">
									<?php echo '<img src ="' . $result["avatar"] . '">'; ?>
								</div>
								<div class="col-md-6 center-form">
									<div class="title-form"><?php echo $result["name"]; ?></div>
									<div class="quick_review"><?php echo $result["quick_review"]; ?></div>
								</div>
								<div class="col-md-3 right-form">
									<table class="table table-bordered table-hover">
									  	<tr>
									  		<th>Thông tin</th>
									  		<th>Mô tả</th>
									  	</tr>
									  	<tr>
									  		<td>Nhà sản xuất</td>
									  		<td><?php echo $result["manufacturername"]; ?></td>
									  	</tr>
									  	<tr>
									  		<td>Đánh giá</td>
									  		<td>
									  			<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
												<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
												<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
												<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
												<span class="glyphicon glyphicon-star" aria-hidden="true" style="margin-right: 3px;"></span>
									  		</td>
									  	</tr>
									  	<tr class="warning">
									  		<td>Tình trạng</td>
									  		<td>
									  			<?php
									  				if ($result["quantity"]>0) {
									  					echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Còn hàng";
									  				} else {
									  					echo "Hết hàng";
									  				}
									  			?>
									  		</td>
									  	</tr>
									</table>
									<div>
										<div class="input-group">
											<select class="form-control" id="product-quantity" name="product_quantity" aria-describedby="basic-addon2">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										    <span class="input-group-addon" id="basic-addon2">Số sản phẩm</span>
										</div>
										<?php echo '<button class="btn btn-primary add-to-cart-btn" onclick="addProductToCart('.$result["product_id"].')"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cho vào giỏ</button>'; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="product-detail-form">
							<div class="row">
								<div class="col-md-3 left-form">
									<div class="manufacturer-form">
										<div class="title-form"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span><?php echo $manufacturer["name"] ?></div>
										<?php echo "<td><img src='" . $manufacturer["avatar"] . "'></td>"; ?>
										<p><?php echo $manufacturer["description"] ?></p>
									</div>
									<div class="products-same-category-form">
										<div class="title-form">Cùng danh mục</div>
										<?php foreach($products_same_category as $row) { ?>
											<div class="row user-comment-form">
												<div class="col-md-5 product-form-left">
													<?php echo'<a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'">'; ?><img src=<?php echo $row["avatar"] ?>></a>
												</div>
												<div class="col-md-7 product-form-right">
													<div class="name"><?php echo $row["name"] ?></div>
													<p class="price"><?php echo number_format($row["price"]) . 
													" đ" ?></p>
												</div>
											</div>
										<?php 
											}
										 ?>
									</div>
								</div>
								<div class="col-md-9 right-form">
									<div class="description-form">
										<div class="title-form"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>Mô tả sản phẩm</div>
										<?php echo html_entity_decode($result["description"], ENT_QUOTES, 'UTF-8') ?>
									</div>
									<div class="comment-form">
										<div class="title-form"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Bình luận</div>
										<?php if(!isset($comments) || count($comments)==0) {
											echo '<p>Không có bình luận nào</p>';
										} else {
											foreach($comments as $row) { ?>
												<div class="row user-comment-form">
													<div class="col-md-2 user-comment-form-left">
														<img src=<?php echo $row["useravatar"] ?> class="img-circle">
													</div>
													<div class="col-md-10 user-comment-form-right">
														<div class="name"><?php echo $row["username"] ?></div>
														<p class="description"><?php echo $row["comment"] ?></p>
													</div>
												</div>
										<?php 
											}
										} ?>
										<div class="write-comment-form">
											<div class="form-group">
											    <label for="comment">Bình luận của bạn:</label>
											    <textarea id="write-comment-textarea" class="form-control" name="comment" rows="5" id="comment"></textarea>
											</div>
											<?php if(isset($_SESSION["current_user"])) { ?>
												<?php echo '<button class="btn btn-primary" onclick="addCommentToProduct('.$result['product_id'].','.$_SESSION["current_user"]["user_id"].')">Thêm bình luận</button>'; ?>
												<?php } else { ?>
													<button class="btn btn-warning" disabled="disabled">Bạn cần phải đăng nhập để bình luận</button>
												<?php } ?>
										</div>
									</div>
								</div>
							</div>
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