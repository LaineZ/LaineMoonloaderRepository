<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>LMR Repository</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div id="container">
<div id="header">
</div>
<div id="content">
<div id="left">
<div class="menu">
<div class="menuheader">
<h3>Show</h3>
</div>
<div class="menucontent">
<ul>
<li><a href="http://www.freewebsitetemplates.com">All Packages</a></li>
<li><a href="http://www.freewebsitetemplates.com">News</a></li>
<li><a href="http://www.freewebsitetemplates.com">Uploader</a></li>
<li><a href="http://www.freewebsitetemplates.com">Your packages</a></li>
<li><a href="http://www.freewebsitetemplates.com">Libs</a></li>
<li><a href="http://www.freewebsitetemplates.com">Scripts</a></li>
</ul>
</div>
<div class="menufooter"></div>
</div>
<div class="menu">
<div class="menuheader">
<h3>Your account</h3>
</div>
<div class="menucontent">
<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<div id="snackbar">Login: ok!</div>
<?php
						require("functions.php");
						session_start();
						if (isset($_SESSION['login'])) {
						$l = $_SESSION['login'];
					    $p = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 2);
						$r = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 3);
						echo sprintf('<p>Hello: %s</p> <p>Publics: %s</p> <p>Rep: %s</p> <a href="index.php?fcn=logout"><p>Logout</p></a>', $l, $p, $r);
						} else {
						echo "<p>Unknown user...</p>
						<form method='post' action='login.php'>
							<p>Login:</p> <input type='text' name='login'> <br>
							<p>Password:</p> <input type='password' name='pass'> <br>
							<br>
							<input type='submit' value='Login' class='button'>
						</form>
							<a href='register.php'><p>Register</p></a>";
						}
						if (isset($_GET['fcn'])) {
							if ($_GET['fcn'] == "logout") {
							session_destroy();
							header("Location: index.php");
							}
							if ($_GET['fcn'] == "log") {
							echo "<script>myFunction()</script>";
							}
						}
						?>

</div>
<div class="menufooter"></div>
</div>
</div>

</div>
<div id="middle">
<div class="post">
<div class="postheader">
<h1>Rip(1.0) by Laine_prikol</h1>
</div>
<div class="postcontent">
<p>TODO: insert php code here</p>
</div>
<div class="postfooter"></div>
</div>
<div class="post">
<div class="postheader">
<h1>package 2</h1>
</div>
<div class="postcontent">
<p>какой-то рип написан</p>
</div>
<div class="postfooter"></div>
</div>
</div>
</div>
<div id="footer">
<span><p>LMR Repository by Laine_prikol and kotik_prikol 2018</p></span> </div>
</div>
</body></html>