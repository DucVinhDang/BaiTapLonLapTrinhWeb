<html>
	<head>
		<link rel="stylesheet" type="text/css" href="app/assets/stylesheets/leftsidebar.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$(window).scroll(function(){
					if ($(this).scrollTop() > 50) {
						$('#scroll-top-btn').show(300);
					} else {
						$('#scroll-top-btn').hide(300);
					}
				});
				$('#scroll-top-btn').click(function(){
					$('html, body').animate({scrollTop : 0}, 300);
					return false;
				});
				// $("#admin-link").click(function(){
	   //              $("body").fadeTo(200, 0);
	   //          });
			});
		</script>

		<link rel="stylesheet" type="text/css" href="publics/css/frontend/layouts/personal_sidebar.css">
	</head>

	<body>
		<div class="body-right">
			<div class="sidebar-navbar">
				<div class="form-group user-form">
					<ul>
						<?php
							if(!isset($_SESSION["current_user"])) {
								echo '<li><a href="index.php?controller=home&action=login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>';
							} else {
								$a = $_SESSION["current_user"];
									if ($a["user_group_id"]==2) {
										echo "<li style='background-color: #4f4f4f;'><a href='admin.php'><span class='glyphicon glyphicon-font' aria-hidden='true'></span></a></li>";
									}
									// echo "<li><a href='index.php?controller=user&action=show&user_id=" . $a["user_id"] . "'><span class='glyphicon glyphicon-user' aria-hidden='true'></span></a></li>";
									echo "<li><a href='index.php?controller=user&action=show&user_id=" . $a["user_id"] . "'><img src='" . $a["avatar"] . "' class='current_user-avatar'></a></li>";
									echo "<li><a href='index.php?controller=cart'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>";
										if(isset($_SESSION["CART"])) {
											echo "<span class='label label-danger cart-number-label'>".count($_SESSION["CART"])."</span>";
										} else {
											echo "<span class='label label-default cart-number-label'>0</span>";
										}
									echo "</a></li>";
									echo "<li><a href='index.php?controller=home&action=logout'><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span></a></li>";
							}
							
							?>
					</ul>
				</div>
				<div class="form-group setting-form">
					<ul>
						<li id="scroll-top-btn"><a href="#"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="body-left">
		
	</body>
</html>