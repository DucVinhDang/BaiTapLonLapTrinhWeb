<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="publics/css/frontend/sign_up.css">
</head>
<body>
	
	<?php 
		if(isset($_SESSION["login_fail"])) {
			echo $_SESSION["login_fail"];
			unset($_SESSION["login_fail"]);
		}

		if(isset($_SESSION["db_fail"])) {
			echo $_SESSION["db_fail"];
			unset($_SESSION["db_fail"]);
		}
	?>

	<form class="sign-up-form" method="POST" action="" enctype="multipart/form-data">
		<div class="title">Đăng ký tài khoản</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
		    <div class="col-md-10">
		        <input type="text" class="form-control" id="inputEmail3" name="newfullname" placeholder="Họ và tên">
		    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		    <div class="col-md-10">
		        <input type="text" class="form-control" id="inputEmail3" name="newemail" placeholder="Email">
		    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
		    <div class="col-md-10">
		        <input type="text" class="form-control" id="inputEmail3" name="newpassword" placeholder="Mật khẩu">
		    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
		    <div class="col-md-10">
		        <input type="file" name="newavatar" id="userAvatarToUpload">
		    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
		    <div class="col-md-10">
		        <input type="tel" class="form-control" id="inputEmail3" name="newphonenumber" placeholder="Số điện thoại">
		    </div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
		    <div class="col-md-10">
		        <input type="tel" class="form-control" id="inputEmail3" name="newaddress" placeholder="Địa chỉ">
		    </div>
		</div>
		<div class="button-form">
			<a href="index.php"><button type="button" style="background-color: white; color: #3a3a3a; border: 1px solid #a5a5a5;">Quay lại</button></a>
			<input type="submit" class="login-form-button" id="signin-btn" name="submit" value="Đăng ký">
		</div>
	</form>

</body>