<head>
	<script language="javascript" src="publics/library/ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/products/add_product.css">

</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
	    <li class="active">Tạo sản phẩm</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Tạo sản phẩm</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newname" placeholder="Tên sản phẩm">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Mã danh mục</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newcategoryid">
			        <?php
			        	foreach($categories as $row)  {
			        		echo "<option value=".$row["category_id"].">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Mã nhà cung cấp</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newmanufacturerid">
			        <?php
			        	foreach($manufacturers as $row)  {
			        		echo "<option value=".$row["manufacturer_id"].">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newprice" placeholder="Giá sản phẩm">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newquantity" placeholder="Số lượng">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Độ tuổi thích hợp</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newage" placeholder="Độ tuổi thích hợp">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Giới tính</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newgender">
			        	<option value="2">Bé trai và bé gái</option>
			        	<option value="1">Bé trai</option>
			        	<option value="0">Bé gái</option>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
			    <div class="col-md-10">
			        <input type="file" name="newavatar" id="productAvatarToUpload">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Đánh giá nhanh</label>
			    <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail3" name="newquickreview" placeholder="Đánh giá nhanh">
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái sản phẩm</label>
			    <div class="col-md-10">
			        <select class="form-control" name="newstatus">
			        	<option value="1">Bình thường</option>
			        	<option value="0">Khóa</option>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			  	<label for="comment">Mô tả</label>
			  	<textarea class="form-control ckeditor" name="newdescription" rows="5" id="comment">
			  	</textarea>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=product">Quay lại</a></button>
				<input class="btn btn-success" id="create-btn" type="submit" name="submit" value="Tạo mới">
			</div>
		</div>
		
	</form>
</body>