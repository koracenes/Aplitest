<?php
session_start();
require("config.php");

$pred="class='trenutna'";
$sad='pred';
$naslov="apliTest | Predmeti";
require("header.php");
//=============== SMEROVI ============================
echo"
<div class='smerovi'>
<h2>Smer</h2>
	<hr>";
	$_SESSION['SMER']='';
	$get_smer = "SELECT * FROM smer";
	
	$run_smer= mysqli_query($con, $get_smer);
	
	while($row_smer = mysqli_fetch_array($run_smer)){
		$smer_id= $row_smer['id'];
		$smer_title= $row_smer['naziv'];
		
		echo"<li><a href='predmeti.php?smer=".$smer_id."'>$smer_title</a></li>";
	}	
echo"
</div>";

//=============== PREDMETI ============================
if(isset($_GET['smer'])){
	
	$_SESSION['SMER']=$_GET['smer'];
	$smer=$_GET['smer'];
	$sql="SELECT * FROM smer WHERE id=".$_GET['smer'];
	$run=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($run)){
	echo"
	<div class='predmeti'>
	<h2>".$row['naziv']."</h2>
	<hr>";
	}
	$get_predmet = "SELECT * FROM predmet WHERE id_smera=".$_GET['smer'];

	$run_predmet= mysqli_query($con, $get_predmet);
	
	while($row_predmet = mysqli_fetch_array($run_predmet)){
		$pr_id= $row_predmet['id'];
		$pr_title= $row_predmet['naziv'];
		$prof='profesor';
		$stud='student';
		echo"<li><a href='page_check.php?predmet_id=$pr_id'>$pr_title</li>";
	}
}
echo"
</div>";


require("footer.php");

?>