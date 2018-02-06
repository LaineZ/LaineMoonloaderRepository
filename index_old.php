<?php
require("functions.php");
session_start();
echo "Hello: " . $_SESSION['login'] . "!";
echo "Publics: " . ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 2);
echo "Reputation: " . ReadFileInfo("accounts/" . $_SESSION['login'] . ".user", 3);
?>