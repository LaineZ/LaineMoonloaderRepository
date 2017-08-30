<!DOCTYPE HTML> 
 <html>
 <head>
 <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
 <link href="main_style.css" rel="stylesheet">
 <title>SAMPLaineRepository</title>
 </head>
<body>
<h1>Laine Moonloader package repository <a href="index.html">Main</a></h1>
<h3>Packages:</h3>
<p><a href="search_item.html">Search or get install command</a></p>
<?php
$file_repos = file_get_contents('files/Repository_programs.list', FILE_USE_INCLUDE_PATH);
$repo_list = nl2br($file_repos);
echo $repo_list; 
?>
</body>
</html> 