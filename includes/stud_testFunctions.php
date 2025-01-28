<?php
	require("config.php");

function getStudentTestove(){
	global $con;
	$query = "SELECT * FROM test where id_predmeta=".$_SESSION['PREDMET'];
	
	
	$run_query= mysqli_query($con, $query);
	echo"<table class='testList'>
			<tr>
				<th>Naziv testa</th><th>Datum</th><th>Profesor</th>
			</tr>";
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
				<td>$naziv</td>
				<td>".$datum."</td>
				<td>$profIme $profPrez </td>
				<td><a href='stud_uradiTest.php?utp_id=$test_id'>[uradi test]</a></td>
			 </tr>";
		}
	}	
	echo"</table>";

}

function uradiTest(){
	global $con;
if(isset($_GET['utp_id'])){

	$tesID=$_GET['utp_id'];
	$_SESSION['testID']=$tesID;
	
	$sqlc="SELECT * FROM rezultati WHERE id_studenta=".$_SESSION['SESS_USERID'];
	$runc=mysqli_query($con, $sqlc);
	while($rowc = mysqli_fetch_array($runc)){
		$uradjen=$rowc['uradjen'];
		$tacno=$rowc['tacno'];
		$ukupno=$rowc['ukupno'];
		$poena=$rowc['poena'];
		$ocena=$rowc['ocena'];
	}
		if($uradjen==$_SESSION['testID']){
			echo"<h1>Već ste uradili ovaj test!</h1>
				<h3>Imate $tacno/$ukupno tačnih odgovora <br><br>
					Osvojili ste $poena% poena<br><br>
					Ocena: $ocena</h3>";
		}else{
			echo"
			<form action='stud_testProcess.php?id=".$tesID."' method='post'>";
			
			$sql="SELECT * FROM testpitanja WHERE id_testa=".$tesID;
			$run=mysqli_query($con, $sql);
			$count_row=mysqli_num_rows($run);
			$_SESSION['n']=$count_row;
			echo"<ol>";
			if($count_row==0){
				echo'<h3>Test je u pripremi!</h3>';
			}else{
			
			while($rowq=mysqli_fetch_array($run)){
			$id_test=$rowq['id_testa'];
			$id_pitanje=$rowq['id_pitanja'];
					
				//=======================================	
					$query2="SELECT * FROM pitanja WHERE id=".$id_pitanje;

					$run_query2 = mysqli_query($con, $query2);
				
					while($rowq2=mysqli_fetch_array($run_query2)){
						$opis=$rowq2['opis'];
						
						echo"<li><h3>".htmlspecialchars($opis)."</h3>
							
							<ol>";
						
						
						$query3="SELECT * FROM test_odgovori WHERE id_pitanja=".$id_pitanje." AND id_testa=".$id_test;
						$run_query3 = mysqli_query($con, $query3);
						while($rowq3=mysqli_fetch_array($run_query3)){
							$ID=$rowq3['id'];
							$odgID=$rowq3['id_odgovora'];
							$odg=$rowq3['odgovor'];
							$tac=$rowq3['tacan'];
							
							echo"
							<li>
							
							<input type='radio' name='$id_pitanje' value='$odgID'/>
							<label for='".$id_pitanje."".$odgID."'>".htmlspecialchars($odg)."</label>
							</li>";
						}
						echo"	
							</ol>
						</li>";
					}
				}	
			
				
				echo"<input type='submit' value='Zavrsi Test' />";
				
				

				
				echo"</form>";
			}
		}
		$_SESSION['n'];
	
	
}
}
?>