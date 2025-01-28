<?php
session_start();
require("config.php");

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$idP=$_SESSION['PITANJE'];
$sql = "DELETE FROM odgovori WHERE id = $id";
$del=mysqli_query($con, $sql)or die(mysql_error());;

header("Location: prof_Odgovori.php?pitanje_id= $idP");
}
?>