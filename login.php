<?php
require("functions.php");
if(file_exists("accounts/" . $_POST['login'] . ".user")) {
	if (trim(ReadFileInfo("accounts/" . $_POST['login'] . ".user", 1), "\n") == md5($_POST['pass'])) {
		session_start();
		echo "<p>Login ok!</p>";
		header("Location: index.php?fcn=log");
		$_SESSION['login'] = $_POST['login'];
	} else {
		echo "<p>Login failed!</p>";
		header("Location: index.php?fcn=loh");
	}
	if (trim(ReadFileInfo("accounts/" . $_POST['login'] . ".user", 4), "\n") == "-1") {
		echo "<p>You banned from this repository!</p>";
		header("Location: index.php?fcn=loh_ban");
		session_destroy();
	}
} else {
		echo "<p>Login failed!</p>";
		header("Location: index.php?fcn=loh_nf");
}
?>