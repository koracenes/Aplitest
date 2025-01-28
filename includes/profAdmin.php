<?php
require("config.php");

// Promeni Ime
if(isset ($_POST['izmIme'])){
	if(!empty($_POST['Ime'])){
		$query=" UPDATE profil SET ime='".$_POST['Ime']."' 
						WHERE id=".$_SESSION['SESS_USERID'];
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_USERNAME']=$_POST['Ime'];
		header("Refresh:0.1;URL=profil.php");
		mysqli_close($con);
	}
}
// Promeni Prezime
if(isset ($_POST['izmPrezime'])){
	if(!empty($_POST['Prezime'])){
		$query=" UPDATE profil SET prezime='".$_POST['Prezime']."' 
						WHERE id=".$_SESSION['SESS_USERID'];
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_LASTNAME']=$_POST['Prezime'];
		header("Refresh:0.1;URL=profil.php");
		mysqli_close($con);
	}
}
// Promeni Index
if(isset ($_POST['izmIndeks'])){
	if(!empty($_POST['Indeks'])){
		$query=" UPDATE profil SET br_indeksa='".$_POST['Indeks']."' 
						WHERE id=".$_SESSION['SESS_USERID'];
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_INDEX']=$_POST['Indeks'];
		header("Refresh:0.1;URL=profil.php");
		mysqli_close($con);
	}
}
// Promeni Smer
if(isset ($_POST['izmSmer'])){
	if(!empty($_POST['Smer'])){
		$query=" UPDATE profil SET ime='".$_POST['Smer']."' 
						WHERE id=".$_SESSION['SESS_USERID'];
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_SMER']=$_POST['Smer'];
		header("Refresh:0.1;URL=profil.php");
		mysqli_close($con);
	}
}
// Promeni Email
if(isset ($_POST['izmEmail'])){
	if(!empty($_POST['Email'])){
		$query=" UPDATE profil SET email='".$_POST['Email']."' 
						WHERE id=".$_SESSION['SESS_USERID'];
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_EMAIL']=$_POST['Email'];
		header("Refresh:0.1;URL=profil.php");
		mysqli_close($con);
	}
}





if($_SESSION['SESS_TIP']=='admin'){

// PRIKAZIVANJA PROFILA
echo"	
<div class='info' >
<h2>Lični podaci</h2>
<hr>
<table class='podaci'>
	<tr>
		<th>Ime:</th>
		<td>".$_SESSION['SESS_USERNAME']."</td>
	</tr>
	<tr>
		<th>Prezime:</th>
		<td>".$_SESSION['SESS_LASTNAME']."</td>
	</tr>
		<th>Email:</th>
		<td>".$_SESSION['SESS_EMAIL']."</td>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
</div>
";
// EDITOVANJE PROFILA
echo"
<div class='info' style='font-size:16px;float-right;margin-left:60px;'>
<h2>Izmeni podatke</h2>
<hr>
<form name='editProf' method='post' action=''>
<table >
	<tr>
		<th><input type='text' placeholder='Ime' class='demoInputBox' name='Ime' value=''></th>
		<td style='width:30px;'>&nbsp</td>
		<td><input type='submit' name='izmIme' value='Izmeni' class='btn'></td>
	</tr>
	<tr>
		<th><input type='text' placeholder='Prezime' class='demoInputBox' name='Prezime' value=''></th>
		<td style='width:30px;'>&nbsp</td>
		<td><input type='submit' name='izmPrezime' value='Izmeni' class='btn'></td>
	</tr>
	<tr>
		<th><input type='text' placeholder='Email' class='demoInputBox' name='Email' value=''></th>
		<td style='width:30px;'>&nbsp</td>
		<td><input type='submit' name='izmEmail' value='Izmeni' class='btn'></td>
	</tr>
</table>
</form>
</div>
";
}



?>