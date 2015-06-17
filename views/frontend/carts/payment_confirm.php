<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Xác nhận thanh toán</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/carts/payment_confirm.css">

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
					<li>Bước 1: Thiết lập giỏ hàng</li>
					<li>Bước 2: Phương thức thanh toán</li>
					<li class="active">Bước 3: Xác nhận thanh toán</li>
					<li>Bước 4: Hoàn thành</li>
				</ul>
			</div>
			<div class="container">
				<div class="title-cart-form">Xác nhận danh sách các mặt hàng đã chọn</div>
				<?php if(!isset($_SESSION["CART"])) { 
					echo '<div class="no-product-title">Không có sản phẩm nào trong giỏ hàng</div>';
				} else { ?>
					<form class="table-form" method="POST" action="index.php?controller=cart&action=edit">
						<table class="table table-bordered .product-table">
						    <tbody>
						    	<th>Mã sản phẩm</th>
						    	<th>Tên sản phẩm</th>
						    	<th>Ảnh đại diện</th>
						    	<th>Giá sản phẩm</th>
						    	<th>Số lượng</th>
						    	<th>Giá cuối (VNĐ)</th>
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
							    		echo '<td>'.$row["cart_quantity"].'</td>';
							    		echo '<td style="font-weight: bold; font-size: 19px;">'.number_format(intval($row["cart_quantity"])*floatval($row["price"])).' đ</td>';
							    	echo '</tr>';
							    	$total_price += intval($row["cart_quantity"])*floatval($row["price"]);
							    	$total_quantity += intval($row["cart_quantity"]);
						    	}
						    ?>
						    <tr class="summary-row">
						    	<td colspan="4"></td>
						    	<td class="total-quantity" style="font-size: 19px;"><?php echo "Số lượng: " . $total_quantity ?></td>
						    	<td class="total-price" style="font-size: 22px; font-weight: bold;"><?php echo number_format($total_price) . " đ" ?></td>
						    </tr>
						</table>
					</form>

					<div class="button-form">
						<div class="button-form-left">
							<a href="index.php?controller=cart&action=paymentmethod"><button class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Quay lại</button></a>
						</div>
						<div class="button-form-right">
							<?php 
								//Tài khoản nhận tiền
								$receiver="ducvinh0812@gmail.com";
								//Khai báo url trả về 
								$return_url="http://localhost:8080/LapTrinhPHP/PHPMainProject/index.php?controller=cart&action=paymentcomplete";
								//Giá của cả giỏ hàng 
								$price= $total_price;
								//Mã giỏ hàng 
								$order_code= "Mã giỏ hàng nằm ở đây";
								//Thông tin giao dịch
								$transaction_info="Thông tin giao dịch nằm ở đây";
							    //Khai báo đối tượng của lớp NL_Checkout
								$nl= new NL_Checkout();
								//Tạo link thanh toán đến nganluong.vn
								$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info,  $order_code, $price);	
							?>
							<a href="<?php echo $url; ?>"> 
								<img border="0" src="https://www.nganluong.vn/data/images/buttons/7.gif" /> 
							</a>
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