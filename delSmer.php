<?php
session_start();
require("config.php");
require('header.php');

if(isset($_GET['smr'])){
	$sql = "DELETE FROM predmet WHERE id = " . $_GET['id'];
	$del=mysqli_query($con, $sql)or die(mysql_error());;
	header("Location: admin_predmeti.php?smer=".$_GET['smr']);
}
else{
$sql = "DELETE FROM smer WHERE id = " . $_GET['id'];
$del=mysqli_query($con, $sql)or die(mysql_error());;
header("Location: admin_predmeti.php");
}
require('footer.php');
?>