
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
		file_put_contents("Packages.list", sprintf("<a href='packageview.php?name=%s&ver=%s'>%s(%s) by %s</a><br>\n", $_POST['name'],$_POST['version'] , $_POST['name'], $_POST['version'], $_SESSION['login']), FILE_APPEND | LOCK_EX);
		move_uploaded_file($tmp_name, $dirname . "/$name");
		} else {
		echo "Upload failed!";
		}
    }
}
?>
