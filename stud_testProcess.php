<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require("config.php");


$naslov="apliTest | Test";
$score=0;
require("header.php");
			
			$n=$_SESSION['n'];
			
			$sql="SELECT * FROM testpitanja WHERE id_testa=".$_SESSION['testID'];
			$run=mysqli_query($con, $sql);
			while($rowq=mysqli_fetch_array($run)){
				$id_pitanja=$rowq['id_pitanja'];
				if(empty($_POST[$id_pitanja])){
					$A=0;
				}else{
				$A=$_POST[$id_pitanja];
				}
				
				$sql2="SELECT * FROM odgovori WHERE id=".$A;
				$run2=mysqli_query($con, $sql2);
				while($rowq2=mysqli_fetch_array($run2)){
					$tacanO=$rowq2['tacan'];
					if($tacanO==1){ $score++; }
				}
			}
			$p=($score/$n)*100;
			echo "<center><font face='Berlin Sans FB' size='8'>Vaš rezultat je: 
				  <br> $score/$n
				   =". number_format ($p,1)." %
				  
				  </font></center><br><br>";
			if($p<51){
				$ocena=5;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno,  poena, ocena, uradjen) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			if($p>51 && $p<61){
				$ocena=6;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno,  poena, ocena, uradjen) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			if($p>61 && $p<71){
				$ocena=7;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno,  poena, ocena) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			if($p>71 && $p<81){
				$ocena=8;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno,  poena, ocena) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			if($p>81 && $p<91){
				$ocena=9;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno, poena, ocena) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			if($p>91){
				$ocena=10;
				$result="INSERT INTO rezultati(id_studenta, id_predmeta, id_testa, tacno, ukupno,  poena, ocena) VALUE
					 (".$_SESSION['SESS_USERID'].", ".$_SESSION['PREDMET'].",".$_SESSION['testID'].",".$score.", ".$n.", ".$p.",".$ocena.",".$_SESSION['testID'].")";
				$run_result=mysqli_query($con, $result);
			}
			
		echo "<center><font face='Berlin Sans FB' size='8'>Ocena: $ocena</font></center><br><br>";

$j=1;
echo"<table class='testPitanja' style='font-size:18px;'>
<tr><th><h2>Vaši odgovori:</h2></th></tr>";
$sqlA="SELECT * FROM testpitanja WHERE id_testa=".$_SESSION['testID'];
$runA=mysqli_query($con, $sqlA);
while($rowA=mysqli_fetch_array($runA)){
	$pitanjeID=$rowA['id_pitanja'];
	
	if(empty($_POST[$pitanjeID])){
					$O=0;
				}else{
					$O=$_POST[$pitanjeID];
				}
	
	$sqlB="SELECT * FROM odgovori WHERE id=".$O;
	$runB=mysqli_query($con, $sqlB);
	while($rowB=mysqli_fetch_array($runB)){
		
		$odgovorOpis=$rowB['odgovor'];
		$pitanjeTacan=$rowB['tacan'];
		
		$sqlC="SELECT * FROM pitanja WHERE id=".$pitanjeID;
		$runC=mysqli_query($con, $sqlC);
		while($rowC=mysqli_fetch_array($runC)){
			$pitanjeOpis=$rowC['opis'];
			
			
			echo"<tr><th style='color:#000066'>$j. ".htmlspecialchars($pitanjeOpis)."</th></tr>
			<tr>
				<td style='padding:10px 0 20px 30px; color:blue;'>
				".htmlspecialchars($odgovorOpis);
				 if($pitanjeTacan==1){
					echo" <spawn style='color:green; font-size:20px;'> &#10004; </spawn>";
				}else{
					echo" <spawn style='color:red;font-size:20px;'> &#10008; </spawn>";
				}
				echo"</td>
			</tr>";
			
			$j++;
		}
	}
}			
			

require("footer.php");
?>