<?php
function ReadFileInfo($filename, $key_value) {
	$lines = file($filename);
	foreach ($lines as $line_num => $line) {
		if ($line_num == intval($key_value)) {
			return $line;
			}
	}
}
function ChangeUserReputaition($user, $value, $isMinus) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$adm = intval(ReadFileInfo("accounts/" . $user . ".user", 4));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	$adm = trim($adm, "\n");
	if (!$isMinus) {
	$rep+=$value;
	} else {
	$rep-=$value;
	}
	unlink("accounts/" . $user . ".user");   // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d\n%d", $l, $p, $pub, $rep, $adm));
}
function ChangeUserPublics($user, $value) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$adm = intval(ReadFileInfo("accounts/" . $user . ".user", 4));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	$adm = trim($adm, "\n");
	$pub+=$value;
	unlink("accounts/" . $user . ".user");  // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d\n%d", $l, $p, $pub, $rep, $adm));
}
function ChangeUserPassword($user, $value) {
	$l = ReadFileInfo("accounts/" . $user . ".user", 0);
	$p = ReadFileInfo("accounts/" . $user . ".user", 1);
	$pub = intval(ReadFileInfo("accounts/" . $user . ".user", 2));
	$rep = intval(ReadFileInfo("accounts/" . $user . ".user", 3));
	$adm = intval(ReadFileInfo("accounts/" . $user . ".user", 4));
	$l = trim($l, "\n");
	$p = trim($p, "\n");
	$pub = trim($pub, "\n");
	$rep = trim($rep, "\n");
	$adm = trim($adm, "\n");
	unlink("accounts/" . $user . ".user"); // для крутости, чтобы мусор не попал!
	file_put_contents("accounts/" . $user . ".user", sprintf("%s\n%s\n%d\n%d\n%d", $l, $value, $pub, $rep, $adm));
}
function GetScriptPath($name, $ver) {
	return "data/" . $name . "-" . $ver . "/";
}
function backupData($archive, $folder) {
				$pathdir=$folder; // путь к папке, файлы которой будем архивировать
					$nameArhive = 'backups/' . $archive . date('Y-m-d') . '.zip'; //название архива
					$zip = new ZipArchive; // класс для работы с архивами
					if ($zip -> open($nameArhive, ZipArchive::CREATE) === TRUE){ // создаем архив, если все прошло удачно продолжаем
						$dir = opendir($pathdir); // открываем папку с файлами
						while( $file = readdir($dir)){ // перебираем все файлы из нашей папки
								if (is_file($pathdir.$file)){ // проверяем файл ли мы взяли из папки
									$zip -> addFile($pathdir.$file, $file); // и архивируем
									echo("<p>Backup data: " . $pathdir.$file) , '</p><br/>';
								}
						}
						$zip -> close(); // закрываем архив.
						echo '<p>Request to download a new backup created</p>';
						//header("Location: " . $nameArhive);
					}else{
						die ('<p>Something errors while creating archive</p>');
					}
				}
?>