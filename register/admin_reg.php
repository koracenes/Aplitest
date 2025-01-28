<?php
require("config.php");

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
		
		$ime=$_POST["Ime"];
		$prezime=$_POST["Prezime"];
		$index=$_POST["Indeks"];
		$smer=$_POST["selSmer"];
		$email=$_POST["Email"];
		$lozinka=SHA1($_POST["Lozinka"]);
		$tip=$_POST['tip'];

		if($tip=='student'){
			$query = "INSERT INTO profil (ime, prezime, email, lozinka,tip,status) VALUES
			('" . $ime . "', '" . $prezime . "', '" . $email . "','" . $lozinka . "','student','aktivan')";
			$result = mysqli_query($con, $query);
			
			$last_id = mysqli_insert_id($con);
			if(!empty($result)) {
				$message = "<span style='color:green;'>Uspešno ste se registrovali!</span>";	
				
				unset($_POST);
					header("Refresh:1.0;URL=admin_studenti.php");
				}
			else {
				$message = "<span style='color:red;'>Korisnik sa ovim email-om već postoji!</span>";	
			}	
		}
		
		elseif($tip=='profesor'){
			$query = "INSERT INTO profil (ime, prezime,  email, lozinka,tip,status) VALUES
			('" . $ime . "', '" . $prezime . "','" . $email . "','" . $lozinka . "','profesor','aktivan')";
			$result = mysqli_query($con, $query);
			
			$last_id = mysqli_insert_id($con);
			if(!empty($result)) {
				$message = "<span style='color:green;'>Uspešno ste se registrovali!</span>";	
				
				unset($_POST);
					header("Refresh:1.0;URL=admin_profesor.php");
				}else {
					$message = "<span style='color:red;'>Korisnik sa ovim email-om već postoji!</span>";	
			}	
				
		}
		elseif($tip=='admin'){
			$query = "INSERT INTO profil (ime, prezime, email, lozinka,tip,status) VALUES
			('" . $ime . "', '" . $prezime . "','" . $email . "','" . $lozinka . "','admin','aktivan')";
			$result = mysqli_query($con, $query);
			
			$last_id = mysqli_insert_id($con);
			if(!empty($result)) {
				$message = "<span style='color:green;'>Uspešno ste se registrovali!</span>";	
				
				unset($_POST);
					header("Refresh:1.0;URL=admin_admini.php");
				}else {
				$message = "<span style='color:red;'>Korisnik sa ovim email-om već postoji!</span>";	
			}	
		}
	}
}

?>
<form name="frmRegistration" method="post" action="" class='adminReg'>
	<fieldset>
		<legend>Napravi Novi Nalog</legend>
		<div class="message"><?php if(isset($message)) echo $message; ?></div>
		<div style='float:left; margin-right:10px;'>
			<input type="text" placeholder="Ime" class="adminBox" name="Ime" value="<?php if(isset($_POST['Ime'])) echo $_POST['Ime']; ?>"><br>
			<input type="text" placeholder="Prezime" class="adminBox" name="Prezime" value="<?php if(isset($_POST['Prezime'])) echo $_POST['Prezime']; ?>"><br>
		</div>
		
		<div style='float:left; margin-right:10px;'>
		
		<input type="text" placeholder="Email adresa" class="adminBox" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>"><br>
		<input type="password" placeholder="Lozinka" class="adminBox" name="Lozinka" value=""><br>
		<input type="password" placeholder="Potvrdi lozinku" class="adminBox" name="Potvrdi_lozinku" value=""><br><br>
		</div>
		<div style='float:left;'>
		<input type="radio" name="tip" value="student" <?php if($str=='stud') echo"checked"; ?>> Student <br>
		<input type="radio" name="tip" value="profesor" <?php if($str=='prof') echo"checked"; ?>> Profesor <br>
		<input type="radio" name="tip" value="admin" <?php if($str=='admin') echo"checked"; ?>> Admin <br>

		
			<br>
			<input type="submit" name="submit" value="Napravi nalog" class="btnReg">
		</div>
	</fieldset>
</form>

