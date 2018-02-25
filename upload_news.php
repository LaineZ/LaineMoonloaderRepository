<?php
session_start();
				session_start();
				require("functions.php");
				if(isset($_SESSION['login'])) {
					$a = ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 4);
					if ($a == 0) {
						echo "<p>Hacking attempt!</p>";
					} else {
					$up_template = "<div class='post'>
					<div class='postheader'>
					<h1>%s</h1>
					</div>
					<div class='postcontent'>
					<p>%s</p>
					<p><strong>By %s</strong></p>
					</div>
					<div class='postfooter'></div>
					</div>\n";
					if(!file_put_contents("news.list", sprintf($up_template, $_POST['name'], $_POST['content'], $_SESSION['login']), FILE_APPEND | LOCK_EX)) {
					header("Location: index.php?fcn=news_fail");
					} else {
					header("Location: index.php?fcn=news_up");
					}
					}
				} else {
				echo "<p>Unauthrized to use that!</p>";
				}
?>