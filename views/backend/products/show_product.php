<head>
	<title>Trang quản trị - Sản phẩm</title>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="publics/css/backend/products/show_product.css">

</head>
<body>
	<?php
		$view = new Share_view();
		echo $view->render('views/backend/admin.php',null); 
	?>

	<ol class="breadcrumb">
	    <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span><a href="admin.php">Dashbroard</a></li>
	    <li><a href="admin.php?controller=product">Quản lý sản phẩm</a></li>
	    <li class="active"><?php echo "Sản phẩm " . $_GET["product_id"] ?></li>
	</ol>

	<div class="panel panel-default panel-main-body">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Thông tin sản phẩm <?php echo $_GET["product_id"] ?></h3>
		</div>
		<div class="panel-body">

			<div class="product-function-form">
				<div class="form-left">
					<?php
					echo "<button class='btn btn-success'><a href='admin.php?controller=product&action=edit&product_id=" . $_GET["product_id"]. "'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>Sửa</a></button>";
					echo "<button class='btn btn-danger'><a href='admin.php?controller=product&action=delete&product_id=". $_GET["product_id"] ."'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>Xóa</a></button>";
					?>
				</div>
			</div>

			<div class="row table-form">
				<div class="col-md-6">
					<?php 
						echo "<table class='table table-bordered'>";
						echo "<tr id='table-header-tr'>";
						 	echo "<th>Thông tin</th>";
						 	echo "<th>Mô tả</th>";
						 echo "</tr>";
					 	echo "<tr>";
					 		echo "<td>Id</td>";
						 	echo "<td>" . $result["product_id"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Mã danh mục</td>";
						 	echo "<td>" . $result["categoryname"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Mã nhà cung cấp</td>";
						 	echo "<td>" . $result["manufacturername"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Tên sản phẩm</td>";
						 	echo "<td>" . $result["name"] . "</td>";
						echo "</tr>";	
						echo "<tr>";
					 		echo "<td>Giá</td>";
						 	echo "<td>" . number_format($result["price"]) . " đ</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Số lượng</td>";
						 	echo "<td>" . $result["quantity"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Tuổi phù hợp</td>";
						 	echo "<td>" . $result["age"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Giới tính</td>";
						 	echo "<td>" . $result["gender"] . "</td>";				
					echo "</table>";
					?>
				</div>
				<div class="col-md-6">
					<?php 
						echo "<table class='table table-bordered'>";
						echo "<tr id='table-header-tr'>";
						 	echo "<th>Thông tin</th>";
						 	echo "<th>Mô tả</th>";
						 echo "</tr>";
						echo "<tr>";
					 		echo "<td>Ảnh đại diện</td>";
						 	echo "<td><img src='" . $result["avatar"] . "' style='width: 200px; height: auto; margin: 10px;'></td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Đánh giá nhanh</td>";
						 	echo "<td>" . $result["quick_review"] . "</td>";
						echo "</tr>";	
						echo "<tr>";
					 		echo "<td>Trạng thái</td>";
						 	echo "<td>" . $result["status"] . "</td>";
						echo "</tr>";
						echo "<tr>";
					 		echo "<td>Được tạo lúc</td>";
						 	echo "<td>" . $result["created_at"] . "</td>";
						echo "</tr>";					
					echo "</table>";
					?>
				</div>
			</div>

			<?php
				

				echo "<table class='table table-bordered'>";
				echo "<tr>";
				echo "<th>Mô tả sản phẩm</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . html_entity_decode($result["description"], ENT_QUOTES, 'UTF-8') . "</td>";
				echo "</tr>";
				echo "</table>";

			?>
			<button class='btn btn-primary'><a href="admin.php?controller=product">Quay lại</a></button>
		</div>
	</div>

	

	
</body>