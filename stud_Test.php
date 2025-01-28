<?php
session_start();
require("config.php");
require("includes/stud_testFunctions.php");

$sad='sTest';
$sTest="class='trenutna'";
$naslov="apliTest | Testovi";
require("header.php");

if(empty($_SESSION['PREDMET'])){
	echo"<h1>Molimo vas izaberite <strong>predmet!</strong></h1>";
}else{
	$sql="SELECT * FROM predmet where id=".$_SESSION['PREDMET'];
	$run=mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($run)){
		$naziv=$row['naziv'];
		echo"<h2>$naziv</h2>";
	}
	echo"<h3>Testovi:</h3><hr><br>";
	getStudentTestove();
	
}

require("footer.php");

?>