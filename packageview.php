<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ASCII_ART_STORAGE</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <center>
	<div class="box2">
		<form method='post' action='search.php'>
						<?php
						require("functions.php");
						session_start();
						if (isset($_SESSION['login'])) {
						$l = $_SESSION['login'];
					    $p = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 2);
						$r = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 3);
						echo sprintf('<h3>SampRepository // Hello: %s | Publics: %s | Reputation: %s <input type="text" placeholder="Enter a package name..." name="search" size="32"><li><a href="logout.php">> Logout</a></li>', $l, $p, $r);
						} else {
						echo '<h3>SampRepository // <input type="text" placeholder="Enter a package name..." name="search" size="32"> <li><a href="login.html">> Login</a></li> <li><a href="reg.html">> Register</a></li></h3>';
						}
						?>
					</form>
	</div>
  <div>
  <div class="box1">
  <?php
  echo "<h3>" . $_GET['name'] . "</h3>";
  echo GetScriptPath($_GET['name'], $_GET['ver']) . $_GET['name'] . ".info";
  if (file_exists(GetScriptPath($_GET['name'], $_GET['ver']) . $_GET['name'] . ".info")) {
	  echo "<p><strong>Description:</strong><br>" . file_get_contents(GetScriptPath($_GET['name'], $_GET['ver']) . $_GET['name'] . ".desc") . "</p>";
	  echo "<p><strong>Version:</strong><br>" . ReadFileInfo(GetScriptPath($_GET['name'], $_GET['ver']) . $_GET['name'] . ".info", 2) . "</p>";
	  echo "<p><strong>Install</strong></p>";
  } else {
	echo "<p><strong>Sorry, package not found!</strong></p>";
  }
  ?>
  </div>
  </div>
  </div>
</center>
</body>
</html>
