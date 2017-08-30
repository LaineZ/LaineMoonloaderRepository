<!DOCTYPE HTML> 
 <html>
 <head>
 <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
 <link href="main_style.css" rel="stylesheet">
 <title>SAMPLaineRepository</title>
 </head>
<body>
<h1>Laine Moonloader package repository <a href="index.html">Main</a></h1>
<h3>Package view:</h3>
<?php
if (file_exists('files/' . $_GET['searchword'] . '.lua')) {
$file_desc = file_get_contents('files/' . $_GET['searchword'] . '.desc', FILE_USE_INCLUDE_PATH);
$repo_file_desc = nl2br($file_desc);
$file_config = file_get_contents('files/' . $_GET['searchword'] . '_config.lua', FILE_USE_INCLUDE_PATH);
$repo_config_desc = nl2br($file_config);
echo $repo_list; 
echo "Name/version: " . $_GET['searchword'] . ' ';
echo "Description: " . $repo_file_desc . ' ';
echo "Config: " . $repo_config_desc . ' ';
echo "Install command: /lmr_install " . $_GET['searchword'] . ' ';
} else {
echo "Package: " . $_GET['searchword'] . " Not found!";
}
?>
</body>
</html> 