<?php
require("functions.php");
$a = ReadFileInfo($_GET['script'], $_GET['param']);
echo $a;

?>