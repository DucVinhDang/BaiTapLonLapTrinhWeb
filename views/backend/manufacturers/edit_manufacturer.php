<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/manufacturers/edit_manufacturer.css">
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
		    <li class="active">Chỉnh sửa nhà cung cấp</li>
		    
		</ol>
		<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa nhà cung cấp</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tên nhà cung cấp</label>
				    <div class="col-md-10">
				        <input type="text" class="form-control" id="inputEmail3" name="editname" placeholder="Tên nhà cung cấp" value = "' . $result["name"] . '">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Số điện thoại</label>
				    <div class="col-md-10">
				        <input type="text" class="form-control" id="inputPassword3" name="editphonenumber" placeholder="Số điện thoại" value ="' . $result["phone_number"] . '">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
				    <div class="col-md-10">
				        <input type="text" class="form-control" id="inputPassword3" name="editaddress" placeholder="Địa chỉ" value ="' . $result["address"] . '">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
				    <div class="col-md-10">
				        <input type="file" name="editavatar" id="manufacturerAvatarToUpload">
				    </div>
				</div>
				<div class="form-group">
				    <label for="comment">Mô tả</label>
				    <textarea class="form-control" rows="5" id="comment" name="editdescription" placeholder="Mô tả">' . $result["description"] . '</textarea>
				</div>
				<div class="button-form">
					<button class="btn btn-primary"><a href="admin.php?controller=manufacturer">Quay lại</a></button>
					<button id="update-btn" class="btn btn-success" type="submit" name="manufacturer_id" value="' . $_GET["manufacturer_id"] . '">Cập nhật</button>
				</div>
			</div>
			
		</form>';

	?>
</body>