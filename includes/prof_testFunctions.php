<?php

function getTestPitanja(){
	global $con;

if(isset($_GET['tp_id'])){
		$t_id=$_GET['tp_id'];
		
		$q="SELECT * FROM test WHERE id=".$t_id;
		$r= mysqli_query($con, $q);
		while($rw=mysqli_fetch_array($r)){
			$opisT=$rw['naziv'];
			echo"<h3>".htmlspecialchars($opisT)."</h3>
			<h3><ins>Pitanja koja se nalaze na testu:</ins></h3>
			";
		}
		
		$query="SELECT * FROM testpitanja WHERE id_testa=".$t_id;
		$run_query = mysqli_query($con, $query);
		$count_row=mysqli_num_rows($run_query);
		if($count_row==0){
			echo'<h3>Trenutno nema pitanja na ovom predmetu.</h3>';
		}
		echo"<ol>";
		while($rowq=mysqli_fetch_array($run_query)){
			
			$id_test=$rowq['id_testa'];
			$id_pitanje=$rowq['id_pitanja'];
			
		//=======================================	
			$query2="SELECT * FROM pitanja WHERE id=".$id_pitanje;

			$run_query2 = mysqli_query($con, $query2);
			while($rowq2=mysqli_fetch_array($run_query2)){
				$opis=$rowq2['opis'];
				$status='testPitanja';
					if($_SESSION['SESS_STATUS']=='aktivan'){
					/*brisanje pitanja*/ echo"<li><a style='color:red;float:right;'  href='delTest.php?testa=".$id_test."&pitanja=".$id_pitanje."'>[X] </a>";}
			echo"	 <h3>".htmlspecialchars($opis)."</h3> 
					 <ol>";
				$query3="SELECT * FROM test_odgovori WHERE id_pitanja=".$id_pitanje." AND id_testa=".$id_test;
				$run_query3 = mysqli_query($con, $query3);
				while($rowq3=mysqli_fetch_array($run_query3)){
					$odgID=$rowq3['id_odgovora'];
					$odg=$rowq3['odgovor'];
					$tac=$rowq3['tacan'];
					
					echo"
					
					<li>".htmlspecialchars($odg);
					if($tac==1){
						echo"<spawn style='color:green;'> &#10004; </spawn>";
					}echo"</li>";
				}
				echo"	
					</ol>
				</li>";
			}
		}	
	echo"</ol>";
	}
}

	
function addTestPitanja(){
	
	
	global $con;
	if(isset($_GET['tp_id'])){
				
		$_SESSION['TEST_ID']=$_GET['tp_id'];
		
		$i=1;
		
		$get_pitanja="SELECT * FROM pitanja WHERE id_predmeta=".$_SESSION['PREDMET'];
		$run_pitanja = mysqli_query($con, $get_pitanja);
		
		$get_pitanja="SELECT * FROM pitanja WHERE id_predmeta=".$_SESSION['PREDMET'];
		$run_pitanja = mysqli_query($con, $get_pitanja);
		$count_pitanja=mysqli_num_rows($run_pitanja);
		
		if($count_pitanja==0){
			echo'<h3>Trenutno nema pitanja na ovom predmetu.</h3>';
		}
		while($row_pitanja=mysqli_fetch_array($run_pitanja)){
			
			$pitanje_id=$row_pitanja['id'];
			$id_predmeta=$row_pitanja['id_predmeta'];
			$pitanje_opis=$row_pitanja['opis'];
			$_SESSION['Q_ID']=$pitanje_id;
			
			echo" <tr>
					  <th>$i</th>
					  <td class='opisList'>".htmlspecialchars($pitanje_opis)."</td>";
				if($_SESSION['SESS_STATUS']=='aktivan'){	  
				echo" <td><a style='color:green;float:right;'  href='prof_dodajPitanje.php?id=".$pitanje_id."'>[Dodaj]</a></td>";}
			echo"	 </tr> ";
				 $i++;
		}	
	}
}

?>