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
</div>

</div>
<div id="middle">
<div class='post'>
				<div class='postheader'>
				<?php
				session_start();
				if(!isset($_GET['user'])) {
				echo "<h1>" . $_SESSION['login'] . "</h1>";
				} else {
				echo "<h1>" . $_GET['user'] . "</h1>";
				}
				?>
				</div>
				<div class='postcontent'>
				<?php
				echo "<p><strong>User info:</strong></p>";
				?>
				</div>
				<div class='postfooter'></div>
				</div>
</div>
</div>
<div id="footer">
<span><p>LMR Repository by Laine_prikol and kotik_prikol 2018</p></span> </div>
</div>
</body></html>