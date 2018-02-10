<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>LMR Repository</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,500&amp;subset=cyrillic" rel="stylesheet"> 
</head>

<body>
<div id="container">
<div id="header">
<h1 class="logotip">L-Moonloader Repository</h1>
</div>
<div id="content">
<div id="left">
<div class="menu">
<div class="menuheader">
<h3>Show</h3>
</div>
<div class="menucontent">
<ul>
<li><a href="index.php">All Packages</a></li>
<li><a href="index.php?type=news">News</a></li>
<li><a href="uploader.html">Uploader</a></li>
<li><a href="user.php?fcn=manage">Your packages</a></li>
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
							<a href='reg.html'><p>Register</p></a>";
						}
						if (isset($_GET['fcn'])) {
							if ($_GET['fcn'] == "logout") {
							session_destroy();
							header("Location: index.php");
							}						
							if ($_GET['fcn'] == "log") { // lol
							echo '<div id="snackbar">Login: ok!</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "loh") { // lol
							echo '<div id="snackbar">Login failed - Invalid username or password</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "loh_nf") { // lol
							echo '<div id="snackbar">Login failed - User not found</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "up_fail") { // lol
							echo '<div id="snackbar">Upload faided, check your input details</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "up_ok") { // lol
							echo '<div id="snackbar">Upload: OK!</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "reg_ok") { // lol
							echo '<div id="snackbar">Register: OK!</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "reg_f") { // lol
							echo '<div id="snackbar">Register failed! Check details</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "loh_na") { // lol
							echo '<div id="snackbar">Register failed! Check details</div>';
							echo "<script>myFunction()</script>";
							}
							if ($_GET['fcn'] == "news_up") { // lol
							echo '<div id="snackbar">Register failed! Check details</div>';
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
  <?php
  if(!isset($_GET['type'])) {
	  if(file_exists("Packages.list")) {
	  echo file_get_contents("Packages.list");
	  } else {
	  echo "<div class='post'>
					<div class='postheader'>
					<h1>No packages in this repository</h1>
					</div>
					<div class='postcontent'>
					<p>Make sure that you have correctly installed the site, check the rights of the file Repository_programs.list. Or maybe just not yet posted new packages, hmm...? </p>
					</div>
					<div class='postfooter'></div>
					</div>
	  ";
	  }
  } else {
	  if($_GET['type'] == "news") {
	if(file_exists("news.list")) {
		  echo file_get_contents("news.list");
		  } else {
		  echo "<div class='post'>
						<div class='postheader'>
						<h1>No news in this repository</h1>
						</div>
						<div class='postcontent'>
						<p>Make sure that you have correctly installed the site, check the rights of the file news.list. Or maybe just not yet posted new news, hmm...? </p>
						</div>
						<div class='postfooter'></div>
						</div>
		  ";
		  }	  
	  }
  }
  ?>
</div>
</div>
<div id="footer">
<span><p>LMR Repository by Laine_prikol and kotik_prikol 2018</p></span> </div>
</div>
</body></html>