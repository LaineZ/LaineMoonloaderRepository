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
				<h1>Admin panel - Select action</h1>
				</div>
				<?php
				session_start();
				require("functions.php");
				if(isset($_POST['name']) and isset($_POST['param'])) {
				  if(isset($_POST['ban'])) {
				  echo "<p>User ban: " . $_POST['name'];
				  
				  }
				  if(isset($_POST['bd'])) {
				  echo "<p>Response:</p>";
				  backupData("AccountsBackup", "accounts/");
				  }
				  if(isset($_POST['bp'])) {
				  echo "<p>Response:</p>";
				  backupData("PackagesBackup", "data/");
				  }
				  if(isset($_POST['uu'])) {
				  echo "<p>User unban: " . $_POST['name'];
				  }
				}
				if(isset($_SESSION['login'])) {
				$a = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 4);
					if ($a == 0) {
					echo "<p>Not allowed content for you!</p>";
					} else {
					echo '<div class="postcontent">
					<form action="admin_panel.php" method="post" enctype="multipart/form-data">
						<p><input name="ban" type="radio" value="none">Ban user</p>
						<p><input name="dp" type="radio" value="none">Delete package (Param: package: NAME-VERSION)</p>
						<p><input name="dap" type="radio" value="none">Delete all packages <strong>WARNING: THIS ACTION CANNOT BE UNDONE!</strong></p>
						<p><input name="dua" type="radio" value="none">Delete user account <strong>WARNING: THIS ACTION CANNOT BE UNDONE!</strong></p>
						<p><input name="uu" type="radio" value="none">Unban user</p>
						<p><input name="gar" type="radio" value="none">Give admin rights (Param: adminlevel 0-3)</p>
						<p><input name="bd" type="radio" value="none">Backup user data</p>
						<p>Name:</p> <input size="40" type="text" name="name"> <br>
						<p>Param:</p> <input size="40" type="text" name="param"> <br>
						<input type="submit" value="Apply" class="button">
					</form>
				</div>';
					}
				} else {
				echo "<p>Unauthrized to use that!</p>";
				}
				?>
				<div class='postfooter'></div>
				</div>
</div>
</div>
<div id="footer">
<span><p>LMR Repository by Laine_prikol and kotik_prikol 2018</p></span> </div>
</div>
</body></html>