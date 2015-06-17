<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Phương thức thanh toán</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/carts/payment_method.css">

	    <script>
	    	$(document).ready(function(){

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
					<li class="active">Bước 2: Phương thức thanh toán</li>
					<li>Bước 3: Xác nhận thanh toán</li>
					<li>Bước 4: Hoàn thành</li>
				</ul>
				<div class="title-cart-form">Thiết lập các phương thức thanh toán</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form class="row payment-method-form">
							<div class="form-group">
						    	<label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
						    	<input type="text" name="newreceiveraddress" class="form-control" placeholder="Địa chỉ nhận hàng">
						  	</div>
						  	<div class="form-group">
						    	<label for="exampleInputPassword1">Số điện thoại liên hệ</label>
						    	<input type="text" name="newreceiverphone" class="form-control" placeholder="Số điện thoại liên hệ">
						  	</div>
							<div class="form-group">
							  	<label for="comment">Yêu cầu của khách hàng</label>
							  	<textarea class="form-control" name="newcustomerrequest" rows="5" id="comment">
							  	</textarea>
							</div>
							<div class="form-group" style="clear: both; margin-bottom:60px;">
							    <label for="inputEmail3" class="col-sm-4 control-label">Phương thức thanh toán</label>
							    <div class="col-md-8">
							        <select class="form-control" name="newpaymentmethod">
							        	<option value="0">Thanh toán chuyển khoản</option>
							        	<option value="1">Thanh toán trực tiếp</option>
							    	</select>
							    </div>
							</div>
						  	<div class="form-group" style="clear: both; margin-bottom:60px;">
							    <label for="inputEmail3" class="col-sm-4 control-label">Phương thức vận chuyển</label>
							    <div class="col-md-8">
							        <select class="form-control" name="newshippingmethod">
							        	<option value="0">Chuyển phát nhanh</option>
							        	<option value="1">Vận chuyển trực tiếp</option>
							    	</select>
							    </div>
							</div>
							
							
						</form>
						
					</div>
				</div>

				<div class="button-form">
					<div class="button-form-left">
						<a href="index.php?controller=cart"><button class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Quay lại</button></a>
					</div>
					<div class="button-form-right">
						<a href="index.php?controller=cart&action=paymentconfirm"><button class="btn btn-success"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>Xác nhận thanh toán</button></a>
					</div>
				</div>
			</div>

			

		</div>

		<?php
			require_once 'views/frontend/layouts/footer.php';
		?>

	</body>
</html>