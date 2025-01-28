<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require("includes/stud_testFunctions.php");
require("config.php");


$sRez="class='trenutna'";
$sad='sRez';

$naslov="apliTest | Rezultati";

require("header.php");

?>
	<h2>Vaši Rezultati</h2>
	<table class="testList">	
	<tr>
			
			<th>Predmet </th>
			<th>Test </th>
			<th>Tačnih odgovora </th>
			<th>Poeni </th>
			<th>Ocena </th>
			<th>Profesor </th>
			<th>Datum</th>
			</tr>
<?php
	$sql1="SELECT * FROM rezultati where id_studenta=".$_SESSION['SESS_USERID'];
	$run1=mysqli_query($con, $sql1);
	while($row1=mysqli_fetch_array($run1)){
		$pred=$row1['id_predmeta'];
		$test=$row1['id_testa'];
		$tacno=$row1['tacno'];
		$ukupno=$row1['ukupno'];
		$poen=$row1['poena'];
		$ocena=$row1['ocena'];
		
		echo"
			<tr>
			";
	$sql2="SELECT * FROM predmet where id=".$pred;
	$run2=mysqli_query($con, $sql2);
	while($row2=mysqli_fetch_array($run2)){	
		$sql2="SELECT * FROM predmet where id=".$pred;
		$run2=mysqli_query($con, $sql2);
		while($row2=mysqli_fetch_array($run2)){	
			$predNaziv=$row2['naziv'];
			
			$sql3="SELECT * FROM test WHERE id=".$test;
			$run3=mysqli_query($con, $sql3);
			while($row3=mysqli_fetch_array($run3)){	
				$testNaziv=$row3['naziv'];
				$datum=$row3['datum'];
				$prof=$row3['id_profesora'];
				
				$query4= "SELECT ime,prezime FROM profil where id='$prof'";
				$run_query4=mysqli_query($con, $query4); 
				while($rowq4 = mysqli_fetch_array($run_query4)){
					$profIme=$rowq4['ime'];
					$profPrez=$rowq4['prezime'];
					
					$d=strtotime($datum);
					echo"
					 <td style='width:300px;'>$predNaziv</td>
					 <td>$testNaziv</td>
					 <td>$tacno / $ukupno</td>
					 <td>$poen %</td>
					 <td>$ocena</td>
					 <td>$profIme $profPrez</td>
					 <td>".date('d.m.Y', $d)."</td>";
				}
			}
		}
	}
		
		
		
		
		echo"</tr>";
		
		
}
	
	
?>
	</table>
		
<?php
require("footer.php");
?>