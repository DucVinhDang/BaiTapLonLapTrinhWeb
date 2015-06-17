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
	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/sign_up_result.css">
	</head>
	<body>
		<?php
			require_once 'views/frontend/layouts/personal_sidebar.php';
			require_once 'views/frontend/layouts/header.php';
		?>

		<?php
			if (isset($_SESSION["sign_up_account_fail"])) {
				echo '<div class="sign-up-alert error">Đăng ký tài khoản thất bại</div>';
				unset($_SESSION["sign_up_account_fail"]);
			} else if(isset($_SESSION["sign_up_account_successful"])) {
				echo '<div class="sign-up-alert successful">Đăng ký tài khoản thành công</div>';
				unset($_SESSION["sign_up_account_successful"]);
			}

		?>

		<?php
		echo "<pre>";
		print_r($_SESSION["current_user"]);
		die();
		 ?>

		<?php
			require_once 'views/frontend/layouts/footer.php';
		?>

	</body>
</html>