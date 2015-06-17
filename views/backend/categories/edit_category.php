<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/categories/edit_category.css">
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null);

		// echo "<form class='edit-user-form' method='POST' action=''>";
		// 	echo "<p class='title'>Chỉnh sửa tài khoản " . $result["fullname"] . "</p>";
		// 	echo "<input type='text' name='editfullname' placeholder='Họ và tên' value = '" . $result["fullname"] . "'><br>";
		// 	echo "<input type='text' name='editaddress' placeholder='Địa chỉ' value ='" . $result["address"] . "'><br>";
		// 	echo "<input type='text' name='editphonenumber' placeholder='Số điện thoại' value='" . $result["phone_number"] . "'><br>"; 
		// 	echo "<input type='text' name='editemail' placeholder='Email' value='" . $result["email"] . "'><br>";
		// 	echo "<input type='password' name='editpassword' placeholder='Mật khẩu' value = '" . $result["password"] . "'><br>";
		// 	echo "<button id='update-btn' type='submit' name='user_id' value=" . $_GET["user_id"] . ">Cập nhật</button>";
		// echo "</form>";

		echo '
		<ol class="breadcrumb">
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
		    <li class="active">Chỉnh sửa danh mục</li>
		    
		</ol>
		<form class="panel panel-default panel-main-body" method="POST" action="">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa danh mục</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
				    <div class="col-md-10">
				        <input type="text" class="form-control" id="inputEmail3" name="editname" placeholder="Tên danh mục" value = "' . $result["name"] . '">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
				    <div class="col-md-10">
				        <input type="text" class="form-control" id="inputPassword3" name="editdescription" placeholder="Mô tả" value ="' . $result["description"] . '">
				    </div>
				</div>
				<div class="button-form">
					<button class="btn btn-primary"><a href="admin.php?controller=category">Quay lại</a></button>
					<button id="update-btn" class="btn btn-success" type="submit" name="category_id" value="' . $_GET["category_id"] . '">Cập nhật</button>
				</div>
			</div>
			
		</form>';

	?>
</body>