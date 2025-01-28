<?php
session_start();
require("config.php");
require('header.php');


if($_GET['tip']=='admin'){
	$sql = "DELETE FROM profil WHERE id = " . $_GET['id'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	header("Location: admin_admini.php");
}
elseif($_GET['tip']=='profesor'){
	$sql = "DELETE FROM profil WHERE id = " . $_GET['id'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	header("Location: admin_profesor.php");
}
elseif($_GET['tip']=='student'){
	$sql = "DELETE FROM profil WHERE id = " . $_GET['id'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	header("Location: admin_studenti.php");
}
elseif($_GET['status']=='testPitanja'){
	$sql = "DELETE FROM testpitanja WHERE id_testa = " . $_GET['id_testa']." AND id_pitanja=".$_GET['id_pitanje'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	if($del){
		$sql1 = "DELETE FROM test_odgovori WHERE id_testa = " . $_GET['id_pitanja']." AND id_pitanja=".$_GET['id_pitanje'];
		$del1=mysqli_query($con, $sql1)or die(mysql_error());;
	}
	
	header("Location: prof_testPitanja.php?tp_id=".$_GET['id_testa']);
}
require('footer.php');
?>