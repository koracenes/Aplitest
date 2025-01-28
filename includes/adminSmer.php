<?php
if(isset($_POST['newSmer'])){
	if(!empty($_POST['novSmer'])){
		$sql="INSERT INTO smer (naziv) VALUES ('".$_POST['novSmer']."')";
		$run=mysqli_query($con, $sql);
		header("Refresh:0.01;URL=admin_predmeti.php");
	}
}

if(isset($_POST['izmSmer'])){
	if(!empty($_POST['novSmer'])){
		
		$id=$_POST['selSmer'];
		$naziv=$_POST['novSmer'];
		
		$sql="UPDATE smer SET naziv='$naziv' 
						WHERE id=$id";
		$result=mysqli_query($con, $sql);
		header("Refresh:0.001;URL=admin_predmeti.php");
	}
}
	
echo"
<div class='smerovi'>

<form name='frmSmer' action='admin_predmeti.php' method='post' >
<fieldset>
	<legend>Novi/izmeni smer</legend> <br>
	<select name='selSmer' style='width:50%;'>
		<option value='' style='color:gray;' disabled selected>Izaberite smer</option>";
	$getS="SELECT * FROM smer";
	$runS=mysqli_query($con,$getS);
	while($rowS=mysqli_fetch_array($runS)){
		$idS=$rowS['id'];
		$naziv=$rowS['naziv'];
		
		echo"<option value=$idS>$naziv</option>";
	}	
echo"
	</select>
	<input type='submit' name='izmSmer' value='Izmeni smer' style='float:right;'> <br><br>
	
	<input type='text' name='novSmer' placeholder='Izmeni/novi smer' style='width:50%;'>
	<input type='submit' name='newSmer' value='Novi smer'style='float:right;'>
		
</fieldset>
</form>

	<h2>Smerovi</h2><br>
	<hr>";
	$get_smer = "SELECT * FROM smer";
	
	$run_smer= mysqli_query($con, $get_smer);
	
	while($row_smer = mysqli_fetch_array($run_smer)){
		$smer_id= $row_smer['id'];
		$smer_title= $row_smer['naziv'];
		
		
		
		echo"<li><a href='admin_predmeti.php?smer=".$smer_id."'>$smer_title</a> <a style='color:red; float:right;'  href='delSmer.php?id=$smer_id'>[X]</a></li>";
	}	
	
echo"
</div>";
?>