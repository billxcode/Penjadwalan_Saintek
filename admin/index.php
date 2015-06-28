<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
		if(!empty($_SESSION['username'])&& !empty($_SESSION['password'])){
			header("location:admin.php");
		}
	?>
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap-responsive.css"/>
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="../jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
		<link rel="stylesheet" href="../jquery-ui/development-bundle/demos/demos.css"/>
		<link rel="stylesheet" href="../css/admin.css" />
		<script src="../js/jquery.js"></script>
		<script src="../jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
		<link rel="stylesheet" href="../css/admin.css"/>
		</head>
<body>
	<div class="form_login">
	<form action="login.php" method="post">
	<div><input name="username" type="text" placeholder="username" class="input-block-level"/></div>
	<div><input name="password" type="password" placeholder="password" class="input-block-level"/></div>
	<div><input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Login"/></div>
	</form>
	</div>
</body>
</html>
