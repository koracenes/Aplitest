<?php

if(isset($_POST['newPredmet'])){
	if(!empty($_POST['novPredmet'])){
		$sql="INSERT INTO predmet (naziv, id_smera) VALUES ('".$_POST['novPredmet']."','".$_GET['smer']."')";
		$run=mysqli_query($con, $sql);
		header("Refresh:0.001;URL=admin_predmeti.php?smer=".$_GET['smer']);
	}
}

if(isset($_POST['izmPredmet'])){
	if(!empty($_POST['novPredmet'])){
		
		$id=$_POST['selPredmet'];
		$naziv=$_POST['novPredmet'];
		
		$sql="UPDATE predmet SET naziv='$naziv' 
						WHERE id=$id";
		$result=mysqli_query($con, $sql);
		header("Refresh:0.001;URL=admin_predmeti.php?smer=".$_GET['smer']);
	}
}


echo"
<div class='predmeti'>

<form action='' method='post'>
<fieldset>
	<legend>Novi/izmeni predmet</legend> <br>
	<select name='selPredmet' style='width:50%;'>
		<option value='' style='color:gray;' disabled selected>Izaberite predmet</option>";
if(isset($_GET['smer'])){
	
	$getS="SELECT * FROM predmet WHERE id_smera=".$_GET['smer'];
	$runS=mysqli_query($con,$getS);
	while($rowS=mysqli_fetch_array($runS)){
		$id=$rowS['id'];
		$naziv=$rowS['naziv'];
		$id_smera=$rowS['id_smera'];
		echo"<option value=$id>$naziv</option>";
	}	
}
echo"
	</select>
	<input type='submit' name='izmPredmet' value='Izmeni predmet' style='float:right;'> <br><br>
	<input type='text' name='novPredmet' placeholder='Izmeni/novi predmet' style='width:50%;'>
	<input type='submit' name='newPredmet' value='Novi predmet'style='float:right;'>
		
</fieldset>
</form>
";

if(isset($_GET['smer'])){
	
	$smer=$_GET['smer'];
	$sql="SELECT * FROM smer WHERE id=".$_GET['smer'];
	$run=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($run)){
	echo"
	<h2>Predmeti sa smera <br>".$row['naziv']."</h2>
	<hr>";
	}
	$get_predmet = "SELECT * FROM predmet WHERE id_smera=".$_GET['smer'];

	$run_predmet= mysqli_query($con, $get_predmet);
	
	while($row_predmet = mysqli_fetch_array($run_predmet)){
	$pr_id= $row_predmet['id'];
	$pr_title= $row_predmet['naziv'];
		echo"<li>$pr_title  <a style='color:red; float:right;'  href='delSmer.php?smr=$smer&id=$pr_id'>[X]</a></li>";
	}
}
echo"
</div>";
?>