<?php
session_start();
require("config.php");
require('header.php');

if(isset($_GET['id'])){
$idPitanja=$_GET['id'];
$check="SELECT * FROM testpitanja WHERE id_testa=".$_SESSION['TEST_ID']." AND id_pitanja=".$idPitanja;
$run_check=mysqli_query($con, $check)or die(mysql_error());;
$numrows = mysqli_num_rows($run_check);
	if($numrows<1){
		$sql = "INSERT INTO testpitanja (id_testa, id_pitanja) VALUE
				(".$_SESSION['TEST_ID'].",".$_GET['id'].")";
				
		$id_pitanja=$_GET['id'];
		$add=mysqli_query($con, $sql)or die(mysql_error());;

		if($add){
		//==============================================
		//				RANDOM 3 NETACNA ODGOVORA

		$sql1="
		INSERT INTO randomodgovori (id_pitanja, id_odg, opis, tacan)
		SELECT id_pitanja, id, odgovor,tacan FROM odgovori WHERE id_pitanja=".$idPitanja." AND tacan='0' ORDER BY RAND() LIMIT 0,3";
		$run_sql1=mysqli_query($con, $sql1);

		//==============================================
		//				RANDOM 1 TACNA ODGOVORA

		$sql2="
		INSERT INTO randomodgovori (id_pitanja, id_odg, opis, tacan)
		SELECT id_pitanja, id, odgovor,tacan FROM odgovori WHERE id_pitanja=".$idPitanja." AND tacan='1' ORDER BY RAND() LIMIT 0,1";
		$run_sql2=mysqli_query($con, $sql2);
		$up2="UPDATE randomodgovori SET id_testa=".$_SESSION['TEST_ID'];
		$run_up2=mysqli_query($con, $up2);
		//==============================================
		//				INSERT INTO TEST_ODGOVORI

		$sql3="
		INSERT INTO test_odgovori (id_testa, id_pitanja, id_odgovora, odgovor, tacan)
		SELECT id_testa, id_pitanja, id_odg, opis,tacan FROM randomodgovori ORDER BY RAND()";
		$run_sql3=mysqli_query($con, $sql3);


		$sql4="DELETE FROM randomodgovori";
		$run_sql4=mysqli_query($con, $sql4);

		}

		header("Location: prof_testPitanja.php?tp_id=".$_SESSION['TEST_ID']);
}else{
	header("Location: prof_testPitanja.php?tp_id=".$_SESSION['TEST_ID']);
}
		require('footer.php');
}
?>