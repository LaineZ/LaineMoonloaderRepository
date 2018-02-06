
<?php
session_start();
foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        $name = basename($_FILES["pictures"]["name"][$key]);
		$ext = end((explode(".", $name))); # extra () to prevent notice
		if($ext == "lua" or $ext == "luac" or $ext == "ini" or $ext == "cfg" or $ext == "dll") {
	    echo "Upload OK!";
		$dirname = "data/" . $_POST['name'] . "-" . $_POST['version'] . "/";
		mkdir($dirname, 0700);		
		file_put_contents($dirname . $_POST['name'] . ".info", $name . "\n" . $_POST['name'] . "\n" . $_POST['version'] . "\n" . $_POST['path'] . $name . "\n");
		file_put_contents($dirname . $_POST['name'] . ".desc", $_POST['desc']);
		file_put_contents($dirname . $_POST['name'] . ".dep", $_POST['dep']);
		file_put_contents("Packages_cl.list", $_POST['name'] . "-" . $_POST['version'] . "\n");
		$up_template = "<div class='post'>
				<div class='postheader'>
				<h1>%s(%s) by %s</h1>
				</div>
				<div class='postcontent'>
				<p>%s</p>
				<a href='packageview.php?name=%s&ver=%s'><p>More info and get install command</p></a>
				</div>
				<div class='postfooter'></div>
				</div>";
		file_put_contents("Packages.list", sprintf($up_template, $_POST['name'], $_POST['version'], $_SESSION['login'], $_POST['desc'], $_POST['name'], $_POST['version']));
		move_uploaded_file($tmp_name, $dirname . "/$name");
		} else {
		echo "Upload failed!";
		}
    }
}
?>
