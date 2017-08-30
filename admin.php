<!DOCTYPE HTML> 
 <html>
 <head>
 <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
 <link href="main_style.css" rel="stylesheet">
 <title>SAMPLaineRepository</title>
 </head>
<body>
<h1>Laine Moonloader package repository <a href="index.html">Main</a></h1>
<h3>Admin panel:</h3>
<p>Update info</p>
<?php
if ($_GET['pass'] == 123) {
echo "Correct password\n";
// clear_list, edit_prog
if ($_GET['comm'] == "clear_list") {
unlink('files/Repository_programs.list');
}
if ($_GET['comm'] == "edit_prog") {
$file3 = 'files/Repository_programs.list';
$current3 = file_get_contents($file3);
$current3 .= $_GET["progedit"] . "\n";
file_put_contents($file3, $current3);
}
} else {
echo "Debug info: Pass:" . $_GET['pass'];
echo "Wrong password!";
}
?>
</body>
</html> 