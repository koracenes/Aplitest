<?php
session_start();
require("config.php");
require('header.php');


if(isset($_GET['id'])){
	$sql = "DELETE FROM pitanja WHERE id=".$_GET['id'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	if($del){
		$sql1 = "DELETE FROM odgovori WHERE id_pitanja=".$_GET['id'];
		$del1=mysqli_query($con, $sql1)or die(mysql_error());;	
		header("Location: prof_Pitanja.php");
	}
}
require('footer.php');
?>