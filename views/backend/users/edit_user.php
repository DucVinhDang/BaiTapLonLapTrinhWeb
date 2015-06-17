<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/users/edit_user.css">

</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null);
	?>
<!-- 		// echo "<form class='edit-user-form' method='POST' action=''>";
		// 	echo "<p class='title'>Chỉnh sửa tài khoản " . $result["fullname"] . "</p>";
		// 	echo "<input type='text' name='editfullname' placeholder='Họ và tên' value = '" . $result["fullname"] . "'><br>";
		// 	echo "<input type='text' name='editaddress' placeholder='Địa chỉ' value ='" . $result["address"] . "'><br>";
		// 	echo "<input type='text' name='editphonenumber' placeholder='Số điện thoại' value='" . $result["phone_number"] . "'><br>"; 
		// 	echo "<input type='text' name='editemail' placeholder='Email' value='" . $result["email"] . "'><br>";
		// 	echo "<input type='password' name='editpassword' placeholder='Mật khẩu' value = '" . $result["password"] . "'><br>";
		// 	echo "<button id='update-btn' type='submit' name='user_id' value=" . $_GET["user_id"] . ">Cập nhật</button>";
		// echo "</form>"; -->

		<ol class="breadcrumb">
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
		    <li class="active">Chỉnh sửa tài khoản</li>
		</ol>
		<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa tài khoản</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputEmail3" name="editfullname" placeholder="Họ và tên" value = "' . $result["fullname"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputPassword3" name="editaddress" placeholder="Địa chỉ" value ="' . $result["address"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Số điện thoại</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputPassword3" name="editphonenumber" placeholder="Số điện thoại" value="' . $result["phone_number"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-md-10">
				        <?php echo'<input type="email" class="form-control" id="inputEmail3" name="editemail" placeholder="Email" value="' . $result["email"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Mật khẩu</label>
				    <div class="col-md-10">
				        <?php echo'<input type="password" class="form-control" id="inputPassword3" name="editpassword" placeholder="Mật khẩu" value = "' . $result["password"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
				    <div class="col-md-10">
				        <input type="file" name="editavatar" id="userAvatarToUpload">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nhóm người dùng</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editusergroupid">
				        <?php
				        	foreach($user_groups as $row)  {
				        		echo "<option value=".$row["user_group_id"]. " "; if($row["name"] == $result["user_group_id"]) { echo "selected"; } echo ">" . $row["name"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputEmail3" name="editdescription" placeholder="Mô tả"  value = "' . $result["description"] . '">'; ?>
				    </div>
				</div>
				<div class="button-form">
					<button class="btn btn-primary"><a href="admin.php?controller=user">Quay lại</a></button>
					<?php echo'<button id="update-btn" class="btn btn-success" type="submit" name="user_id" value="' . $_GET["user_id"] . '">Cập nhật</button>'; ?>
				</div>
			</div>
			
		</form>

	
</body>