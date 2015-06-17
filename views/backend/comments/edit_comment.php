<head>
	<link rel="stylesheet" type="text/css" href="publics/css/backend/comments/edit_comment.css">
</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Trang chủ</a></li>
	    <li>Quản lý bình luận</li>
	    <li class="active">Chỉnh sửa bình luận</li>
	    
	</ol>
	<form class="panel panel-default panel-main-body" method="POST" action="" enctype="multipart/form-data">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Chỉnh sửa bình luận</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Sản phẩm</label>
			    <div class="col-md-10">
			        <select class="form-control" name="editproductid">
			        <?php
			        	foreach($products as $row)  {
			        		echo "<option value=".$row["product_id"]. " "; if($row["name"] == $result["productname"]) { echo "selected"; } echo ">" . $row["name"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Người dùng</label>
			    <div class="col-md-10">
			        <select class="form-control" name="edituserid">
			        <?php
			        	foreach($users as $row)  {
			        		echo "<option value=".$row["user_id"]. " "; if($row["fullname"] == $result["username"]) { echo "selected"; } echo ">" . $row["fullname"] . "</option>";
			        	}
			        ?>
			    	</select>
			    </div>
			</div>
			<div class="form-group">
			  	<label for="comment">Nội dung bình luận</label>
			  	<textarea class="form-control" name="editcomment" rows="5" id="comment"><?php echo $result["comment"]; ?></textarea>
			</div>
			<div class="form-group">
			  	<label for="comment">Mô tả</label>
			  	<textarea class="form-control" name="editdescription" rows="3" id="comment"><?php echo $result["description"]; ?></textarea>
			</div>
			<div class="button-form">
				<button class="btn btn-primary"><a href="admin.php?controller=comment">Quay lại</a></button>
				<?php echo'<button id="update-btn" class="btn btn-success" type="submit" name="comment_id" value="' . $_GET["comment_id"] . '">Cập nhật</button>'; ?>
			</div>
		</div>
		
	</form>
</body>