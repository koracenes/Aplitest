<?php
session_start();
require("config.php");

$pPitanja="class='trenutna'";
$naslov="apliTest | Testovi";
require("header.php");

if(isset($_POST['dodaj_pitanje'])){
		
		$query=" INSERT INTO pitanja (id_predmeta, opis) VALUES
				 ('".$_SESSION['PREDMET']."', '".$_POST['tekst_pitanja']."')";
				 
		$result=mysqli_query($con, $query);
		
		$last_id = mysqli_insert_id($con);
		
		header("Location: prof_Odgovori.php?pitanje_id=$last_id");
		
}


if(empty($_SESSION['PREDMET'])){
	echo"<h1>Molimo vas izaberite <strong>predmet!</strong></h1>";
}

else{
	$sql="SELECT * FROM predmet where id=".$_SESSION['PREDMET'];
	$run=mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($run)){
		$naziv=$row['naziv'];
		echo"<h2>$naziv</h2>";
	}
	echo"
		<div class='pitanja'>
		<h3><ins>Pitanja:</ins></h3>";
		
		
		$get_pitanja="SELECT * FROM pitanja WHERE id_predmeta=".$_SESSION['PREDMET'];

		$run_pitanja = mysqli_query($con, $get_pitanja);
		
		$count_pitanja=mysqli_num_rows($run_pitanja);
		
		if($count_pitanja==0){
			echo'<h3>Trenutno nema pitanja na ovom predmetu.</h3>';
		}
		while($row_pitanja=mysqli_fetch_array($run_pitanja)){
			
			$id_pitanja=$row_pitanja['id'];
			$id_predmeta=$row_pitanja['id_predmeta'];
			$pitanje_opis=$row_pitanja['opis'];
			
			echo" <li>
					  <td><a href='prof_Odgovori.php?pitanje_id=".$id_pitanja."'>".htmlspecialchars($pitanje_opis)."</a></td>
					  <td><a style='color:red; float:right;'  href='delPitanje.php?id=".$id_pitanja."'>[X]</a></td>
				  </li>";
		}	
	echo"</div>
	<div class='form_pitanje'>
			<h2>Dodajte novo pitanje</h2>
				<form name='dodajPitanje' method='post' action='' >
					<textarea name='tekst_pitanja' rows='15' cols='50'></textarea>
					<br><br>
					<input type='submit' name='dodaj_pitanje' value='Dodaj Pitanje'>
				</form>
			</div>";
}
	
require("footer.php");

?>