<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require("includes/stud_testFunctions.php");
require("config.php");



$pRez="class='trenutna'";
$naslov="apliTest | Rezultati";

require("header.php");


if(empty($_SESSION['PREDMET'])){
	echo"<h1>Molimo vas izaberite <strong>predmet!</strong></h1>";
}
else{
?>

<h3>Rezultati</h3>
<table class="testList">	
	<tr>
		<th>No</th>
		<th>Student</th>
		<th>Predmet</th>
		<th>Test</th>
		<th>Poeni</th>
		<th>Ocena</th>
		<th>Profesor</th>
		<th>Datum</th>
	</tr>
<?php
	
	$i=1;
	$sql1="SELECT * FROM rezultati WHERE id_predmeta=".$_SESSION['PREDMET'];
	$run1=mysqli_query($con, $sql1);
	while($row1=mysqli_fetch_array($run1)){
		$student=$row1['id_studenta'];
		$pred=$row1['id_predmeta'];
		$test=$row1['id_testa'];
		$poen=$row1['poena'];
		$ocena=$row1['ocena'];
		
		$sql2="SELECT * FROM predmet WHERE id=".$pred;
		$run2=mysqli_query($con, $sql2);
		while($row2=mysqli_fetch_array($run2)){
			$pred_naziv=$row2['naziv'];
			
			$sql3="SELECT * FROM test WHERE id=".$test;
			$run3=mysqli_query($con, $sql3);
			while($row3=mysqli_fetch_array($run3)){
				$test_naziv=$row3['naziv'];
				$id_prof=$row3['id_profesora'];
				$datum=$row3['datum'];
				
				$sql4="SELECT * FROM profil WHERE id=".$student;
				$run4=mysqli_query($con, $sql4);
				while($row4=mysqli_fetch_array($run4)){
					$imeS=$row4['ime'];
					$prezimeS=$row4['prezime'];
				
					$sql5="SELECT * FROM profil WHERE id=".$id_prof;
					$run5=mysqli_query($con, $sql5);
					while($row5=mysqli_fetch_array($run5)){
						$imeP=$row5['ime'];
						$prezimeP=$row5['prezime'];
				
				
						echo"
							<tr>
								<td style='width:20px;'>$i</td>
								<td>$imeS $prezimeS</td>
								<td style='width:300px;'>$pred_naziv</td>
								<td>$test_naziv</td>
								<td>$poen</td>
								<td>$ocena</td>
								<td>$imeP $prezimeP</td>
								<td>$datum</td>
							</tr>
						";
						$i++;
					}
				}
			}
		}
	}
?>
</table>
		
<?php
}
require("footer.php");
?>