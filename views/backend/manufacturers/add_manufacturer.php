<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/manufacturers/add_manufacturer.css">
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
	    <li class="active">Tạo nhà cung cấp</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo nhà cung cấp</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tên nhà cung cấp</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newname" placeholder="Tên nhà cung cấp">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Số điện thoại</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newphonenumber" placeholder="Số điện thoại">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newaddress" placeholder="Địa chỉ">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
			    <div class="col-md-10">
			        <input type="file" name="newavatar" id="manufacturerAvatarToUpload">
			    </div>
			</div>
<!-- 			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputPassword3" name="newdescription" placeholder="Mô tả">
			    </div>
			</div> -->
			<div class="form-group">
			    <label for="comment">Mô tả</label>
			    <textarea class="form-control" rows="5" id="comment" name="newdescription" placeholder="Mô tả"></textarea>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=manufacturer">Quay lại</a></button>
				<input class="btn btn-success" id="create-btn" type="submit" name="submit" value="Tạo nhà cung cấp">
			</div>
		</div>
		
	</form>
</body>