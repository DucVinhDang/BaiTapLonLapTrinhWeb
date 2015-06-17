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

    <link rel="stylesheet" type="text/css" href="publics/css/backend/users/index.css">

	<script>
		function checkBlankSearchInput(){
	    	if(document.getElementById('search-input').value.length == 0){
				window.alert("Bạn chưa nhập nội dung tìm kiếm");
	    		return false;
	    	}
	    	return true;
	    }

	    window.onload = function () {
			if (typeof history.pushState === "function") {
			    history.pushState("jibberish", null, null);
			    window.onpopstate = function () {
			        history.pushState('newjibberish', null, null);
			        <?php
			        	echo "header('admin.php?controller=user')";
			        ?>
			    };
			}
		}
	</script>
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 

		if(!isset($_SESSION["login_status"])) {
			$_SESSION["login_status"] = 0;
		}

		if(isset($_SESSION["db_fail"])) {
			echo $_SESSION["db_fail"];
			$_SESSION["db_fail"] = "";
		}

		if(isset($_SESSION["create_user_successfull"])) {
			echo $_SESSION["create_user_successfull"];
			$_SESSION["create_user_successfull"] = "";
		}

		if(isset($_SESSION["create_user_fail"])) {
			echo $_SESSION["create_user_fail"];
			$_SESSION["create_user_fail"] = "";
		}

		if(isset($_SESSION["delete_user_successful"])) {
			echo $_SESSION["delete_user_successful"];
			$_SESSION["delete_user_successful"] = "";
		}

		if(isset($_SESSION["delete_user_fail"])) {
			echo $_SESSION["delete_user_fail"];
			$_SESSION["delete_user_fail"] = "";
		}

		if(isset($_SESSION["update_user_successful"])) {
			echo $_SESSION["update_user_successful"];
			$_SESSION["update_user_successful"] = "";
		}

		if(isset($_SESSION["edit_user_fail"])) {
			echo $_SESSION["edit_user_fail"];
			$_SESSION["edit_user_fail"] = "";
		}
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Dashbroard</a></li>
	    <li class="active">Quản lý người dùng</li>
	</ol>

	<div class="panel panel-default panel-main-body">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Danh mục quản lý người dùng</h3>
		</div>
		<div class="panel-body">

			<div class="user-function-form">
				<div class="form-left">
					<a href="?controller=user&action=add"><button type="button" class="btn btn-primary">Thêm mới</button></a>
				</div>
				<div class="form-right">
					<form class="input-group" method="POST" action="admin.php?controller=user&action=search" onsubmit="return checkBlankSearchInput()">
				        <input type="text" id="search-input" name="keyword" class="form-control" placeholder="Nhập thông tin người dùng cần tìm">
				        <span class="input-group-btn">
				        <?php
				        echo "<button class='btn btn-primary' type='submit' name='search_submit'>Tìm kiếm</button>";
						?>
				      </span>
				    </form>
				</div>
			</div>

			<?php
				
				echo "<table class='table table-bordered'>";
					echo "<tr id='table-header-tr'>";
					 	echo "<th>Id</th>";
					 	echo "<th>Họ tên</th>";
					 	echo "<th>Ảnh đại diện</th>";
					 	echo "<th>Địa chỉ</th>";
					 	echo "<th>Điện thoại</th>";
					 	echo "<th>Email</th>";
					 	// echo "<th>Mật khẩu</th>";
					 	// echo "<th>Avatar</th>";
					 	// echo "<th>Mô tả</th>";
					 	echo "<th>Nhóm người dùng</th>";
					 	// echo "<th>Tạo lúc</th>";
					 	echo "<th>Thông tin</th>";
					 	echo "<th>Chỉnh sửa</th>";
					 	echo "<th>Xóa</th>";
					 echo "</tr>";

					foreach($result as $row) {
					 	echo "<tr>";
						 	echo "<td>" . $row["user_id"] . "</td>";
						 	echo "<td>" . $row["fullname"] . "</td>";
						 	echo "<td><img src='" . $row["avatar"] . "' style='max-width: 100px; height: auto;'></td>";
						 	echo "<td>" . $row["address"] . "</td>";
						 	echo "<td>" . $row["phone_number"] . "</td>";
						 	echo "<td>" . $row["email"] . "</td>";
						 	// echo "<td>" . $rows["password"] . "</td>";
						 	// echo "<td>" . $rows["avatar"] . "</td>";
						 	// echo "<td>" . $rows["description"] . "</td>";
						 	echo "<td>" . $row["user_group_id"] . "</td>";
						 	// echo "<td>" . $rows["created_at"] . "</td>";
						 	echo "<td style='text-align: center'>
						 		<a href='admin.php?controller=user&action=show&user_id=".$row["user_id"]."'><button class='btn btn-info'><span class='glyphicon glyphicon-list' aria-hidden='true'></span>Chi tiết</button></a>
						 	</td>";
						 	echo "<td style='text-align: center'>
						 		<a href='admin.php?controller=user&action=edit&user_id=".$row["user_id"]."'><button class='btn btn-success'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</button></a>
						 	</td>";
						 	echo "<td style='text-align: center'>
						 		<a href='admin.php?controller=user&action=delete&user_id=".$row["user_id"]."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</button></a>
						 	</td>";
						echo "</tr>";
					}
				echo "</table>";
			?>
		</div>
	</div>

	

	
</body>