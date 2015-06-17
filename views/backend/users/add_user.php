<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/users/add_user.css">
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<!-- <form class="add-user-form" method="POST" action="">
		<p class="title">Tạo mới người dùng</p>
		<input type="text" name="newfullname" placeholder="Họ và tên"><br>
		<input type="text" name="newaddress" placeholder="Địa chỉ"><br>
		<input type="text" name="newphonenumber" placeholder="Số điện thoại"><br>
		<input type="text" name="newemail" placeholder="Email"><br>
		<input type="password" name="newpassword" placeholder="Mật khẩu"><br>
		<input id="create-btn" type="submit" name="submit" value="Tạo">
	</form> -->

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
	    <li class="active">Tạo tài khoản</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo tài khoản</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newfullname" placeholder="Họ và tên">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newaddress" placeholder="Địa chỉ">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Số điện thoại</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newphonenumber" placeholder="Số điện thoại">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			    <div class="col-md-10">
			        <input type="email" class="form-control" id="inputEmail3" name="newemail" placeholder="Email">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Mật khẩu</label>
			    <div class="col-md-10">
			        <input type="password" class="form-control" id="inputPassword3"name="newpassword" placeholder="Mật khẩu">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
			    <div class="col-md-10">
			        <input type="file" name="newavatar" id="userAvatarToUpload">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nhóm người dùng</label>
			    <div class="col-md-10">
			    	<select class="form-control" name="newusergroupid">
			        <?php
			        	foreach($user_groups as $row)  {
			        		echo "<option value=".$row["user_group_id"].">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newdescription" placeholder="Mô tả">
			    </div>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=user">Quay lại</a></button>
				<input class="btn btn-success" id="create-btn" type="submit" name="submit" value="Tạo tài khoản">
			</div>
		</div>
		
	</form>
</body>