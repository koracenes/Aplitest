<?php
session_start();
require("config.php");

$pTest="class='trenutna'";
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
echo"
<h3><ins>Testovi:</ins></h3>

<div class='spisak_pitanja'>
	<div class='pitanja'>";

$query = "SELECT * FROM test where id_predmeta=".$_SESSION['PREDMET'];

$run_query= mysqli_query($con, $query);
echo"<table class='testList'>
	<tr>
		<th>No</th>
		<th>Naziv testa</th>
		<th>Datum</th>
		<th>Profesor</th>
	</tr>";
	$i=1;
while($rowq = mysqli_fetch_array($run_query)){
	$test_id= $rowq['id'];
	$id_predmeta= $rowq['id_predmeta'];
	$naziv= $rowq['naziv'];
	$id_prof= $rowq['id_profesora'];
	$datum= $rowq['datum'];
	
	$query2= "SELECT ime,prezime FROM profil where id='$id_prof'";
	$run_query2=mysqli_query($con, $query2); 
	while($rowq2 = mysqli_fetch_array($run_query2)){
		$profIme=$rowq2['ime'];
		$profPrez=$rowq2['prezime'];
		
	echo"<tr>
			<td style='width:20px;'>$i</td>
			<td>$naziv</td>
			<td>".$datum."</td>
			<td>$profIme $profPrez </td>
			<td><a href='prof_testPitanja.php?tp_id=$test_id' style='color:#003366;'>[Vidi test]</a></td>
		 </tr>";
	$i++;
	}
}	
echo"</table>
	</div>

			
<div class='form_pitanje'>
	<form name='noviTest' method='post' action='' >
	<fieldset>
		<legend>Novi Test:</legend> 
		<br>
		<input type='text' name='testNaziv' placeholder='Naziv Testa' style='width:100%'>
			<br><br>
		<input type='submit' name='addT' value='Kreiraj Test'>
	</fieldset>
	</form>
</div>
</div>

";
}


if(isset($_POST['addT'])){
	
	$query=" INSERT INTO test (id_predmeta, naziv, id_profesora, datum) VALUES
				 ('".$_SESSION['PREDMET']."', '".$_POST['testNaziv']."','".$_SESSION['SESS_USERID']."',NOW())";
				 
		$result=mysqli_query($con, $query);
		
		$last_id = mysqli_insert_id($con);
		$_SESSION['TEST_ID']=$last_id;
		header("Location: prof_testPitanja.php?tp_id=$last_id");
		
	
}

require("footer.php");

?>