
<?php
session_start();
foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        $name = basename($_FILES["pictures"]["name"][$key]);
		$ext = end((explode(".", $name))); # extra () to prevent notice
		if($ext == "lua" or $ext == "luac" or $ext == "ini" or $ext == "cfg" or $ext == "dll") {
	    echo "Upload OK!";
		file_put_contents("Packages_cl.list", $_POST['name'] . "\n");
		file_put_contents("data/" . $_POST['name'] . ".info", $name . "\n" . $_POST['name'] . "\n" . $_POST['version'] . "\n" . $_SESSION['login'] . "\n");
		$up_template = "<div class='post'>
		<div class='postheader'>
		<h1><a href='packageview.php?%s'>%s(%s) by %s</a></h1>
		</div>
		<div class='postcontent'>
		<p>%s</p>
		</div>
		<div class='postfooter'></div>
		</div>";
		file_put_contents("data/" . $_POST['name'] . ".desc", $_POST['desc']);
		file_put_contents("Packages.list", sprintf($up_template, $_POST['name'], $_POST['name'], $_POST['version'], $_SESSION['login'], $_POST['desc']));
		move_uploaded_file($tmp_name, "data/$name");
		} else {
		echo "Upload failed!";
		}
    }
}
?>
