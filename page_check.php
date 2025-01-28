<?php
session_start();
require("config.php");
$naslov="apliTest | Testovi";
require("header.php");

	$_SESSION['PREDMET']=$_GET['predmet_id'];
	$status=$_SESSION['SESS_TIP'];
	
	if($status=='profesor'){
		header("Location: prof_Test.php");
		
	}elseif($status=='student'){
		header("Location: stud_Test.php");
	}
	
require("footer.php");

?>