<!DOCTYPE HTML>
<html>
<head>
<title>Upload complete!</title>
 <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet"> 
 <link href="main_style.css" rel="stylesheet">
</head>
<body>
<?php 
echo $code_format; 
$file = 'files/' . $_GET["name"] . $_GET["version"] . '.lua';
$current = file_get_contents($file);
$current .= $_GET["code"];
file_put_contents($file, $current);


$file1 = 'files/' . $_GET["name"] . $_GET["version"] . '_config.lua';
$current1 = file_get_contents($file1);
$current1 .= $_GET["depend"];
file_put_contents($file1, $current1);

$file2 = 'files/' . $_GET["name"] . $_GET["version"] . '_description.desc';
$current2 = file_get_contents($file2);
$current2 .= $_GET["desc"];
file_put_contents($file2, $current2);

$file3 = 'files/Repository_programs.list';
$current3 = file_get_contents($file3);
$current3 .= $_GET["name"] . "\n";
file_put_contents($file3, $current3);

?>
</body>
<h1>Laine Package repository - Upload</h1>
<h3>Upload complete!</h3>
<p>Script name:</p> <?php echo $_GET["name"];
?>
<p>Install command: </p> <?php echo "/lmr_install " . $_GET["name"];
?>
</html> 