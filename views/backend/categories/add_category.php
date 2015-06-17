<head>
	<script language="javascript" src="publics/library/ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/categories/add_category.css">
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
	    <li class="active">Tạo danh mục</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo danh mục</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newname" placeholder="Tên danh mục">
			    </div>
			</div>
			<div class="form-group">
			  	<label for="comment">Mô tả</label>
			  	<textarea class="form-control ckeditor" name="newdescription" rows="5" id="comment">
			  	</textarea>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=category">Quay lại</a></button>
				<input class="btn btn-success" id="create-btn" type="submit" name="submit" value="Tạo danh mục">
			</div>
		</div>
	</form>
</body>