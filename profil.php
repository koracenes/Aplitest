<?php
session_start();
require("config.php");

$sad='profil';
$profil="class='trenutna'";
$naslov="apliTest | Moj profil";

require("header.php");

require("includes/profilStud.php");
require("includes/profilProf.php");



require("footer.php");

?>