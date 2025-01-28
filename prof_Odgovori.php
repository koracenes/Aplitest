<?php
session_start();
require("config.php");
$naslov="apliTest | Testovi";
require("header.php");

if(isset($_POST['dodaj_Odgovor'])){
	
	$_SESSION['PITANJE']=$_GET['pitanje_id'];
	
	$query=" INSERT INTO odgovori (id_pitanja, odgovor, tacan) VALUES
			 ('".$_SESSION['PITANJE']."', '".$_POST['odgovor_pitanja']."', '".$_POST['tacanOdg']."')";
			 
	$result=mysqli_query($con, $query);
	
}


if(isset($_GET['pitanje_id'])){
		
		echo"<div class='pitanja'>";
		
		$_SESSION['PITANJE']=$_GET['pitanje_id'];
		
		$get_pitanja="select * from pitanja where id=".$_SESSION['PITANJE'];
		$run_pitanja = mysqli_query($con, $get_pitanja);
		
		while($row_pitanja=mysqli_fetch_array($run_pitanja)){
			
			$pitanje_id=$row_pitanja['id'];
			$pitanje_opis=$row_pitanja['opis'];
			
			echo "<h2><q><i><a href='prof_Pitanja.php'>".htmlspecialchars($pitanje_opis)."</a></i></q></h2>
			<br>
				<h3><ins>Odgovori:</ins></h3>";
			
		}
		
		$get_pit_odg="SELECT * FROM odgovori WHERE id_pitanja=".$_SESSION['PITANJE'];
		$run_pit_odg=mysqli_query($con, $get_pit_odg);
		$count_odg=mysqli_num_rows($run_pit_odg);
		
		if($count_odg==0){
			echo"<h3>Trenutno nema odgovora na ovo pitanje.</h3>";
		}
		while($row_pit_odg=mysqli_fetch_array($run_pit_odg)){
			
			$odg_id=$row_pit_odg['id'];
			$odg_id_pit=$row_pit_odg['id_pitanja'];
			$odg_odg=$row_pit_odg['odgovor'];
			$odg_tacan=$row_pit_odg['tacan'];
			
				echo"<li>".htmlspecialchars($odg_odg);
				if($odg_tacan==1){
					echo"<spawn style='color:green;'> &#10004; </spawn>";
				}
				echo"<spawn style='margin-left:20px;'><a style='color:red;float:right;'  href='delOdgovor.php?id=".$odg_id."'>[X] </a></spawn></li>";
		}
		echo"</div>";
	}
	?>
<div class="form_pitanje">
<h2>Dodajte novi odgovor</h2>
	<form name="dodajPitanje" method="post" action="" >
		<textarea name="odgovor_pitanja" rows="5" cols="50"></textarea>
		<br><br>
			<input type="radio" name="tacanOdg" value="0" checked> Netacan
			<input type="radio" name="tacanOdg" value="1"> Tacan
		<br><br>
		<input type="submit" name="dodaj_Odgovor" value="Dodaj Odgovor">
	</form>
</div>	

<?php	
require("footer.php");

?>