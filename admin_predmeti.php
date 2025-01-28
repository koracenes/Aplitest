<?php
session_start();
require("config.php");


$aPred="class='trenutna'";
$naslov="apliTest | Admini";

require("header.php");
include("includes/adminSmer.php");
include("includes/adminPredmet.php");

require("footer.php");

?>