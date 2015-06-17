<html>
	<head>
	  <!--
      <link type="text/css" rel="stylesheet" href="publics/materialize/css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  -->
		<title>Shop đồ chơi đa dạng dành cho trẻ em</title>

		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="publics/library/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="publics/library/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

	    <link rel="stylesheet" type="text/css" href="publics/css/frontend/layouts/right_sidebar.css">
	</head>
	<body>
		<div class="panel panel-default categories-panel">
			<div class="panel-heading"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>Danh mục</div>
			<div class="panel-body" style="padding: 0px;">
				<div class="list-group categories-group">
					<?php
						foreach($categories as $row) {
							if(isset($_SESSION["current_user"])) { 
								$a = $_SESSION["current_user"];
								if($a["user_group_id"] == 1) { echo '<a href="index.php?controller=category&action=show&category_id='.$row["category_id"].'" class="list-group-item">' . $row["name"] . '</a>'; }
								else { echo '<a href="admin.php?controller=category&action=show&category_id='.$row["category_id"].'" class="list-group-item">' . $row["name"] . '</a>'; }
							} else {
								echo '<a href="index.php?controller=category&action=show&category_id='.$row["category_id"].'" class="list-group-item">' . $row["name"] . '</a>';
							}
						}
					?>
				</div>
			</div>
		</div>

		<div class="panel panel-default manufacturers-panel">
			<div class="panel-heading"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>Các nhà cung cấp</div>
			<div class="panel-body" style="padding: 0px;">
				<ul class="list-group">
					<!-- <li class="list-group-item">Cras justo odio</li> -->
					<?php foreach ($manufacturers as $row) { ?>
						<li class="list-group-item">
							<div class="row sub-manufacturer">
								<div class="col-md-3 sub-manufacturer-left">
									<?php echo "<img src='" . $row["avatar"] . "'>"; ?>
								</div>
								<div class="col-md-9 sub-manufacturer-right">
									<div class="title"><?php echo $row["name"]; ?></div>
									<p><?php echo $row["description"]; ?></p>
									<button type="button" class="btn btn-primary">Xem thêm</button>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
	</body>
</html>