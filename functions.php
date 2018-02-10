<?php
function ReadFileInfo($filename, $key_value) {
	$lines = file($filename);
	foreach ($lines as $line_num => $line) {
		if ($line_num == intval($key_value)) {
			return $line;
			}
	}
}
function ChangeUserReputaition($user, $value) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	unlink("accounts/" . $user . ".user");   // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d", $l, $p, $pub, $value));
}
function ChangeUserPublics($user, $value) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	unlink("accounts/" . $user . ".user");  // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d", $l, $p, $value, $rep));
}
function ChangeUserPassword($user, $value) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	unlink("accounts/" . $user . ".user"); // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d", $l, $value, $pub, $rep));
}
function GetScriptPath($name, $ver) {
	return "data/" . $name . "-" . $ver . "/";
}
?>