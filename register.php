<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Laine HOME</title>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>

	<body>
		<div>
			<center>
				<div class="box_msg">
				<h3>Register</h3>
				<?php
				if (strlen($_POST['login']) == 0 or strlen($_POST['pass']) == 0 or file_exists("accounts/" . $_POST['login'] . ".user") or $_POST['pass'] != $_POST['passcon']) {
				header("Location: index.php?fcn=reg_f");
				echo "<p>Register failed! Check details!</p>";
				} else {
				session_start();
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['pass']  = $_POST['pass'];
				file_put_contents("accounts/" . $_POST['login'] . ".user", sprintf("%s\n%s\n%d\n%d\n%d", $_POST['login'], md5($_POST['pass']), 0, 0, 0));
				header("Location: index.php?fcn=reg_ok");
				}
				?>
				<li><a href="index.php">Main</a></li>
				</div>
			</center>
		</div>
	</body>
</html>