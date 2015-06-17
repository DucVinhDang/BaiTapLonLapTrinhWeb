<head>
	<title>Trang quản trị - Người dùng</title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="publics/css/backend/users/show_user.css">

</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Dashbroard</a></li>
	    <li><a href="admin.php?controller=user">Quản lý người dùng</a></li>
	    <li class="active"><?php echo "Người dùng " . $_GET["user_id"] ?></li>
	</ol>

	<div class="panel panel-default panel-main-body">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Thông tin người dùng <?php echo $_GET["user_id"] ?></h3>
		</div>
		<div class="panel-body">

			<div class="user-function-form">
				<div class="form-left">
					<?php
					echo "<button class='btn btn-success'><a href='admin.php?controller=user&action=edit&user_id=" . $_GET["user_id"]. "'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</a></button>";
					echo "<button class='btn btn-danger'><a href='admin.php?controller=user&action=delete&user_id=". $_GET["user_id"] ."'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</a></button>";
					?>
				</div>
			</div>

			<?php
				echo "<table class='table table-bordered'>";
					echo "<tr id='table-header-tr'>";
					 	echo "<th>Thông tin</th>";
					 	echo "<th>Mô tả</th>";
					 echo "</tr>";
				 	echo "<tr>";
				 		echo "<td>Id</td>";
					 	echo "<td>" . $result["user_id"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Họ và tên</td>";
					 	echo "<td>" . $result["fullname"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Địa chỉ</td>";
					 	echo "<td>" . $result["address"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Số điện thoại</td>";
					 	echo "<td>" . $result["phone_number"] . "</td>";
					echo "</tr>";	
					echo "<tr>";
				 		echo "<td>Email</td>";
					 	echo "<td>" . $result["email"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Mật khẩu</td>";
					 	echo "<td>" . $result["password"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Ảnh đại diện</td>";
					 	echo "<td><img src='" . $result["avatar"] . "' style='max-width: 150px; height: auto;'></td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Mô tả</td>";
					 	echo "<td>" . $result["description"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Id nhóm người dùng</td>";
					 	echo "<td>" . $result["user_group_id"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				 		echo "<td>Được tạo lúc</td>";
					 	echo "<td>" . $result["created_at"] . "</td>";
					echo "</tr>";						
				echo "</table>";
			?>
			<button class='btn btn-primary'><a href="admin.php?controller=user">Quay lại</a></button>
		</div>
	</div>

	

	
</body>