<?php
require("config.php");

// Promeni Ime
if(isset ($_POST['izmIme'])){
	if(!empty($_POST['Ime'])){
		
		$userId=$_SESSION['SESS_USERID'];
		$ime=$_POST['Ime'];
		
		$query=" UPDATE profil SET ime='".$ime."' 
						WHERE id=".$userId;
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_USERNAME']=$ime;
		header("Location: profil.php");
		mysqli_close($con);
	}
}
// Promeni Prezime
if(isset ($_POST['izmPrezime'])){
	if(!empty($_POST['Prezime'])){
		
		$userId=$_SESSION['SESS_USERID'];
		$prezime=$_POST['Prezime'];
		
		$query=" UPDATE profil SET prezime='".$prezime."' 
						WHERE id=".$userId;
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_LASTNAME']=$prezime;
		header("Location: profil.php");
	}
}
// Promeni Index
if(isset ($_POST['izmIndeks'])){
	if(!empty($_POST['Indeks'])){
		
		$userId=$_SESSION['SESS_USERID'];
		$index=$_POST['Indeks'];
		
		$query=" UPDATE profil SET br_indeksa='".$index."' 
						WHERE id=".$userId;
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_INDEX']=$index;
		header("Location: profil.php");
		
	}
}
// Promeni Smer
if(isset ($_POST['izmSmer'])){
	if(!empty($_POST['selSmer'])){
		$userId=$_SESSION['SESS_USERID'];
		$smer=$_POST['selSmer'];
		
		$query=" UPDATE profil SET smer='".$smer."' 
						WHERE id=".$userId;
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_SMER']=$smer;
		header("Location: profil.php");
	}
}
// Promeni Email
if(isset ($_POST['izmEmail'])){
	if(!empty($_POST['Email'])){
		
		$userId=$_SESSION['SESS_USERID'];
		$mail=$_POST['Email'];
		
		$query=" UPDATE profil SET email='".$mail."' 
						WHERE id=".$userId;
		$result=mysqli_query($con, $query);
		
		$_SESSION['SESS_EMAIL']=$mail;
		header("Location: profil.php");
		mysqli_close($con);
	}
}





if($_SESSION['SESS_TIP']=='student'){

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
	<tr>
		<th>Indeks:</th>
		<td> ".$_SESSION['SESS_INDEX']."</td>
	</tr>
	<tr>
		<th>Smer:</th>
		<td> ";
		$query=" SELECT * FROM smer WHERE id=".$_SESSION['SESS_SMER'];
		$result=mysqli_query($con, $query);
		
		while($row=mysqli_fetch_array($result)){
		echo $row['naziv']."</td>";}
	echo"
	</tr>
	<tr>
		<th>Email:</th>
		<td>".$_SESSION['SESS_EMAIL']."</td>
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
		<th><input type='text' placeholder='Indeks' class='demoInputBox' name='Indeks' value=''></th>
		<td style='width:30px;'>&nbsp</td>
		<td><input type='submit' name='izmIndeks' value='Izmeni' class='btn'></td>
	</tr>
	<tr>
		<td>
		<select name='selSmer' class='demoSelectBox'>
			<option value='' style='color:gray;' selected>Izaberite smer</option>";
				
			$getS="SELECT * FROM smer";
			$runS=mysqli_query($con,$getS);
			while($rowS=mysqli_fetch_array($runS)){
			$idS=$rowS['id'];
			$naziv=$rowS['naziv'];
	
			echo"<option value=$idS>$naziv</option>";
			}
		echo"</select> <br>	
		</td>
	</th>
		<td style='width:30px;'>&nbsp</td>
		<td><input type='submit' name='izmSmer' value='Izmeni' class='btn'></td>
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