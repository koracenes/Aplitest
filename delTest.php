<?php
session_start();
require("config.php");

if(isset($_GET['testa'])){
$test=$_GET['testa'];
$pitanje=$_GET['pitanja'];



	$sql1 = "DELETE FROM test_odgovori WHERE id_testa = $test AND id_pitanja= $pitanje";
	$del1=mysqli_query($con, $sql1)or die(mysql_error());;
$sql = "DELETE FROM testpitanja WHERE id_testa = $test AND id_pitanja= $pitanje";
$del=mysqli_query($con, $sql)or die(mysql_error());;

header("Location: prof_testPitanja.php?tp_id= $test ");
}
?>