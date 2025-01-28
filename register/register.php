<?php

if(count($_POST)>0) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
			$message = "<span style='color:red;'>Polje ".ucwords($key) . " je obavezno!</span>";
			break;
		}
	}
	/* Password Matching Validation */
	if($_POST['Lozinka'] != $_POST['Potvrdi_lozinku']){ 
		$message = "<span style='color:red;'>Lozinke moraju biti iste!<br>"; 
	}

	/* Email Validation */
	if(!isset($message)) {
		if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
			$message = "<span style='color:red;'>Nevažeći Email</span>";
		}
	}


	if(!isset($message)) {
		require_once("config.php");
		
		$ime=$_POST["Ime"];
		$prezime=$_POST["Prezime"];
		$index=$_POST["Indeks"];
		$smer=$_POST["Smer"];
		$email=$_POST["Email"];
		$lozinka=SHA1($_POST["Lozinka"]);
		$tip=$_POST['tip'];
		
		if($tip=='student'){
			$query = "INSERT INTO profil (ime, prezime, br_indeksa, smer, email, lozinka,tip,status) VALUES
			('" . $ime . "', '" . $prezime . "', '" . $index . "', '" . $smer . "','" . $email . "','" . $lozinka . "','student','')";
			$result = mysqli_query($con, $query);
			
			$last_id = mysqli_insert_id($con);
			if(!empty($result)) {
				$message = "<span style='color:green;'>Uspešno ste se registrovali!</span>";	
				
				unset($_POST);
				
				//========================	
				
				$loginsql = "SELECT * FROM profil WHERE id = '$last_id'";
				$loginres = mysqli_query($con, $loginsql);
				$numrows = mysqli_num_rows($loginres);
				
				if($numrows == 1){
					$loginrow = mysqli_fetch_assoc($loginres);

					$_SESSION['SESS_LOGGEDIN'] = 1;
					$_SESSION['SESS_USERID'] = $loginrow['id'];
					$_SESSION['SESS_USERNAME'] = $loginrow['ime'];
					$_SESSION['SESS_LASTNAME'] = $loginrow['prezime'];
					$_SESSION['SESS_INDEX'] = $loginrow['br_indeksa'];
					$_SESSION['SESS_SMER'] = $loginrow['smer'];
					$_SESSION['SESS_EMAIL'] = $loginrow['email'];
					$_SESSION['SESS_TIP']=$loginrow['tip'];
					header("Refresh:1.0;URL=index.php");
				}
			}
		}
		elseif($tip=='profesor'){
			$query = "INSERT INTO profil (ime, prezime, br_indeksa, smer, email, lozinka,tip,status) VALUES
			('" . $ime . "', '" . $prezime . "', '" . $index . "', '" . $smer . "','" . $email . "','" . $lozinka . "','profesor','neaktivan')";
			$result = mysqli_query($con, $query);
			
			$last_id = mysqli_insert_id($con);
			if(!empty($result)) {
				$message = "<span style='color:green;'>Uspešno ste se registrovali!</span>";	
				
				unset($_POST);
				
				//========================	
				
				$loginsql = "SELECT * FROM profil WHERE id = '$last_id'";
				$loginres = mysqli_query($con, $loginsql);
				$numrows = mysqli_num_rows($loginres);
				
				if($numrows == 1){
					$loginrow = mysqli_fetch_assoc($loginres);

					$_SESSION['SESS_LOGGEDIN'] = 1;
					$_SESSION['SESS_USERID'] = $loginrow['id'];
					$_SESSION['SESS_USERNAME'] = $loginrow['ime'];
					$_SESSION['SESS_LASTNAME'] = $loginrow['prezime'];
					$_SESSION['SESS_INDEX'] = $loginrow['br_indeksa'];
					$_SESSION['SESS_SMER'] = $loginrow['smer'];
					$_SESSION['SESS_EMAIL'] = $loginrow['email'];
					$_SESSION['SESS_TIP']=$loginrow['tip'];
					$_SESSION['SESS_STATUS']=$loginrow['status'];
					header("Refresh:1.0;URL=index.php");
				}
			}
		}else {
			$message = "<span style='color:red;'>Problem u registraciji. Molimo vas pokušajte ponovo!</span>";	
		}
	}
}

?>

<h1>Registrujte se</h1>
				
				<form name="frmRegistration" method="post" action="" >
					
						<div class="message"><?php if(isset($message)) echo $message; ?></div>
						
						<input type="text" placeholder="Ime" class="demoInputBox" name="Ime" value="<?php if(isset($_POST['Ime'])) echo $_POST['Ime']; ?>"><br>
						<input type="text" placeholder="Prezime" class="demoInputBox" name="Prezime" value="<?php if(isset($_POST['Prezime'])) echo $_POST['Prezime']; ?>"><br>
						<input type="text" placeholder="Broj Indeksa" class="demoInputBox" name="Indeks" value=""><br>
								
					<select name='Smer' class='demoSelectBox'>
					<option value='' style='color:gray;' disabled selected>Izaberite smer</option>";
				<?php		
						$getS="SELECT * FROM smer";
						$runS=mysqli_query($con,$getS);
						while($rowS=mysqli_fetch_array($runS)){
						$idS=$rowS['id'];
						$naziv=$rowS['naziv'];
				
					echo"<option value=$idS>$naziv</option>";
				}
				echo"</select> <br>";
				?>		
						<input type="text" placeholder="Email adresa" class="demoInputBox" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>"><br>
						<input type="password" placeholder="Lozinka" class="demoInputBox" name="Lozinka" value=""><br>
						<input type="password" placeholder="Potvrdi lozinku" class="demoInputBox" name="Potvrdi_lozinku" value=""><br><br>
						
						<input type="radio" name="tip" value="student"  checked> Student
						<input type="radio" name="tip" value="profesor" > Profesor
					
					<div>
					<br>
						<input type="submit" name="submit" value="Registrujte se" class="btnReg">
					</div>
				</form>