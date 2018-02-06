<?php
require("functions.php");
if (trim(ReadFileInfo("accounts/" . $_POST['login'] . ".user", 1), "\n") == $_POST['pass']) {
	session_start();
	echo "<p>Login ok!</p>";
	header("Location: index.php?fcn=log");
	$_SESSION['login'] = $_POST['login'];
} else {
	echo "<p>Login failed!</p>";
}
?>