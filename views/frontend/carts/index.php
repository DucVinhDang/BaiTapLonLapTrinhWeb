<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Thiết lập giỏ hàng</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/carts/index.css">
	    <script>
	    	$(document).ready(function(){
	    		$(".cart-quantity-control").change(function(){
					$("#update-cart-btn").trigger("click");
				});
			});

	    </script>
	</head>
	<body>
		<?php
			require_once 'views/frontend/layouts/personal_sidebar.php';
			require_once 'views/frontend/layouts/header.php';
		?>

		<div class="home-body">
			<div class="container-fluid">
				<ul class="breadcrumb-form">
					<li><a href="index.php" style="color: #5a5a5a;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
					<li class="active">Bước 1: Thiết lập giỏ hàng</li>
					<li>Bước 2: Phương thức thanh toán</li>
					<li>Bước 3: Xác nhận thanh toán</li>
					<li>Bước 4: Hoàn thành</li>
				</ul>
				<div class="title-cart-form">Danh sách các mặt hàng trong giỏ</div>
				<?php if(!isset($_SESSION["CART"])) { 
					echo '<div class="no-product-title">Không có sản phẩm nào trong giỏ hàng</div>';
				} else { ?>
					<form class="table-form" method="POST" action="index.php?controller=cart&action=edit">
						<table class="table table-striped .product-table">
						    <tbody>
						    	<th>Mã sản phẩm</th>
						    	<th>Tên sản phẩm</th>
						    	<th>Ảnh đại diện</th>
						    	<th>Giá sản phẩm</th>
						    	<th>Số lượng</th>
						    	<th>Giá cuối (VNĐ)</th>
						    	<th colspan="2">Chức năng</th>
						    </tbody>
						    <?php
						    	$total_price = 0;
						    	$total_quantity = 0;
						    	foreach($_SESSION["CART"] as $row) {
						    		echo '<tr>';
							    		echo '<td>'.$row["product_id"].'</td>';
							    		echo '<td>'.$row["name"].'</td>';
							    		echo '<td><img src="'.$row["avatar"].'" style="width: 140px; height: auto;"></td>';
							    		echo '<td>'.number_format($row["price"]).' đ</td>';
							    		echo '<td><select class="form-control cart-quantity-control" name="cartQuantity['.$row["product_id"].']">';
							    		for($i=1;$i<=5;$i++) {
							    			echo '<option value="'.$i.'"'; if($i==intval($row["cart_quantity"])) { echo ' selected'; } echo '>'.$i.'</option>';
							    		}
							    		echo '</select></td>';
							    		echo '<td style="font-weight: bold; font-size: 19px;">'.number_format(intval($row["cart_quantity"])*floatval($row["price"])).' đ</td>';
							    		// echo '<td><button class="btn btn-primary" onclick="updateCart('.$row["product_id"].')">Cập nhật</button></a></td>';
							    		echo '<td><a href="index.php?controller=product&action=show&product_id='.$row["product_id"].'"><button type="button" class="btn btn-info">Thông tin</button></a></td>';
							    		echo '<td><a href="index.php?controller=cart&action=delete&product_id='.$row["product_id"].'"><button type="button" class="btn btn-danger">Xóa</button></a></td>';
							    	echo '</tr>';
							    	$total_price += intval($row["cart_quantity"])*floatval($row["price"]);
							    	$total_quantity += intval($row["cart_quantity"]);
						    	}
						    ?>
						    <tr class="summary-row">
						    	<td colspan="4"></td>
						    	<td class="total-quantity" style="font-size: 19px;"><?php echo "Số lượng: " . $total_quantity ?></td>
						    	<td class="total-price" style="font-size: 21px; font-weight: bold;"><?php echo number_format($total_price) . " đ" ?></td>
						    	<td></td>
						    	<td></td>
						    </tr>
						</table>
						<button type="submit" name="submit" class="btn btn-primary" id="update-cart-btn"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Cập nhật giỏ hàng</button>
					</form>

					<div class="button-form">
						<div class="button-form-left">
							<a href="index.php"><button class="btn btn-info">Tiếp tục xem hàng</button></a>
							<a href="index.php?controller=cart&action=deleteall"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Xóa toàn bộ giỏ hàng</button></a>
						</div>
						<div class="button-form-right">
							<a href="index.php?controller=cart&action=paymentmethod"><button class="btn btn-success"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Phương thức thanh toán</button></a>
						</div>
					</div>
				<?php } ?>
			</div>

			

		</div>

		<?php
			require_once 'views/frontend/layouts/footer.php';
		?>

	</body>
</html>