<head>
	<script language="javascript" src="publics/library/ckeditor/ckeditor.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/products/edit_product.css">

</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null);
	?>

<!-- 		echo "<form class='edit-product-form' method='POST' action=''>";
			echo "<p class='title'>Chỉnh sửa tài khoản " . $result["fullname"] . "</p>";
			echo "<input type='text' name='editfullname' placeholder='Họ và tên' value = '" . $result["fullname"] . "'><br>";
			echo "<input type='text' name='editaddress' placeholder='Địa chỉ' value ='" . $result["address"] . "'><br>";
			echo "<input type='text' name='editphonenumber' placeholder='Số điện thoại' value='" . $result["phone_number"] . "'><br>"; 
			echo "<input type='text' name='editemail' placeholder='Email' value='" . $result["email"] . "'><br>";
			echo "<input type='password' name='editpassword' placeholder='Mật khẩu' value = '" . $result["password"] . "'><br>";
			echo "<button id='update-btn' type='submit' name='product_id' value=" . $_GET["product_id"] . ">Cập nhật</button>";
		echo "</form>"; -->


		<ol class="breadcrumb">
		    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
		    <li class="active">Chỉnh sửa sản phẩm</li>
		    
		</ol>
		<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa sản phẩm</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mã danh mục</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editcategoryid">
				        <?php
				        	foreach($categories as $row)  {
				        		echo "<option value=".$row["category_id"]. " "; if($row["name"] == $result["categoryname"]) { echo "selected"; } echo ">" . $row["name"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mã nhà cung cấp</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editmanufacturerid">
				        <?php
				        	foreach($manufacturers as $row)  {
				        		echo "<option value=".$row["manufacturer_id"]. " "; if($row["name"] == $result["manufacturername"]) { echo "selected"; } echo ">" . $row["name"] . "</option>";
				        	}
				        ?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Tên sản phẩm</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputPassword3" name="editname" placeholder="Tên sản phẩm" value="' . $result["name"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputEmail3" name="editprice" placeholder="Giá" value="' . $result["price"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Số lượng</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputPassword3" name="editquantity" placeholder="Số lượng" value = "' . $result["quantity"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Độ tuổi thích hợp</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputEmail3" name="editage" placeholder="Độ tuổi thích hợp" value = "' . $result["age"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Giới tính thích hợp</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editgender">
			        	<option value="2" <?php if ($result["gender"]==2) { echo "selected"; } ?>>Bé trai và bé gái</option>
			        	<option value="1" <?php if ($result["gender"]==1) { echo "selected"; } ?>>Bé trai</option>
			        	<option value="0" <?php if ($result["gender"]==0) { echo "selected"; } ?>>Bé gái</option>
			    	</select>
				    </div>
				</div>
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện</label>
				    <div class="col-md-10">
				        <input type="file" name="editavatar" id="productAvatarToUpload">
				    </div>
				</div>
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Đánh giá nhanh</label>
				    <div class="col-md-10">
				        <?php echo'<input type="text" class="form-control" id="inputEmail3" name="editquickreview" placeholder="Đánh giá nhanh" value = "' . $result["quick_review"] . '">'; ?>
				    </div>
				</div>
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Trạng thái</label>
				    <div class="col-md-10">
				        <select class="form-control" name="editstatus" selected=<?php echo $result["status"]; ?>>
			        	<option value="1" <?php if ($result["status"]==1) { echo "selected"; } ?>>Bình thường</option>
			        	<option value="0" <?php if ($result["status"]==0) { echo "selected"; } ?>>Khóa</option>
			    	</select>
				    </div>
				</div>
				<div class="form-group">
				  	<label for="comment">Mô tả</label>
				  	<textarea class="form-control ckeditor" name="editdescription" rows="5" id="comment">
				  		<?php echo html_entity_decode($result["description"], ENT_QUOTES, 'UTF-8'); ?>
				  	</textarea>
				</div>
				<div class="button-form">
					<button class="btn btn-primary"><a href="admin.php?controller=product">Quay lại</a></button>
					<?php echo'<button id="update-btn" class="btn btn-success" type="submit" name="product_id" value="' . $_GET["product_id"] . '">Cập nhật</button>'; ?>
				</div>
			</div>
			
		</form>
</body>