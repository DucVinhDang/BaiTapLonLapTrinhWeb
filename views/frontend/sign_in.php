<?php 

	// if(!isset($_SESSION["login_status"])) {
	// 	$_SESSION["login_status"] = 0;
	// } else {
	// 	if($_SESSION["login_status"] == 1) {
	// 		header("Location: admin.php");
	// 	}
	// }
?>

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

	<link rel="stylesheet" type="text/css" href="publics/css/frontend/sign_in.css">
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


	<form class="login-form" method="POST" action="">
		<div class="title">Đăng nhập tài khoản</div>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
  			<input type="text" class="form-control login-form-field"  name="email" placeholder="Email" valua="" aria-describedby="sizing-addon2">
  		</div>
  		<div class="input-group">
  			<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></span>
			<input type="password" class="form-control login-form-field" name="password" value="" placeholder="Mật khẩu"><br>
		</div>
		<div class="checkbox">
		    <label>
		      <input type="checkbox"> Ghi nhớ tài khoản
		    </label>
		</div>
		<div class="action-form">
			<a href="index.php"><button type="button" style="background-color: white; color: #3a3a3a; border: 1px solid #a5a5a5;">Quay lại</button></a>
			<input type="submit" class="login-form-button" id="signin-btn" name="submit" value="Đăng nhập">
		</div>
	</form>

</body>