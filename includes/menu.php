<?php
if($_SESSION['SESS_TIP']=='student'){
	echo"
		<a href='predmeti.php'";if($sad=='pred') echo "class='trenutna'"; echo">Predmet</a> | 
		<a href='stud_Test.php'";if($sad=='sTest') echo $sTest; echo">Uradi Test</a> | 
		<a href='stud_rezultat.php'";if($sad=='sRez') echo $sRez; echo">Rezultati</a> | 
		<a href='profil.php'";if($sad=='profil') echo $profil; echo">Profil</a> 
		";
}

elseif($_SESSION['SESS_TIP']=='profesor'){
	if($_SESSION['SESS_STATUS']=='neaktivan'){
		echo"
			<a href='predmeti.php'";if(isset($pred) ) echo $pred; echo">Predmet</a> | 
			<a href='prof_rezultati.php'";if(isset($pRez) ) echo $pRez; echo">Rezultati</a> | 
			<a href='profil.php'";if(isset($profil) ) echo $profil; echo">Profil</a> 
		";
	}else{

		echo"
			<a href='predmeti.php'";if(isset($pred) ) echo $pred; echo">Predmet</a> | 
			<a href='prof_Test.php'";if(isset($pTest) ) echo $pTest; echo">Testovi</a> | 
			<a href='prof_Pitanja.php'";if(isset($pPitanja) ) echo $pPitanja; echo">Pitanja</a> | 
			<a href='prof_rezultati.php'";if(isset($pRez) ) echo $pRez; echo">Rezultati</a> | 
			<a href='profil.php'";if(isset($profil) ) echo $profil; echo">Profil</a> 
		";
	}
}

elseif($_SESSION['SESS_TIP']=='admin'){
	echo"
			<a href='admin_predmeti.php'";if(isset($aPred) ) echo $aPred; echo">Predmeti</a> |  
			<a href='admin_studenti.php'";if(isset($aStud) ) echo $aStud; echo">Studenti</a> |
			<a href='admin_profesor.php'";if(isset($aProf) ) echo $aProf; echo">Profesori</a> |
			<a href='admin_admini.php'";if(isset($aAdmin) ) echo $aAdmin; echo">Administratori</a> | 
			<a href='profil.php'";if(isset($profil) ) echo $profil; echo">Profil</a> 
		";
}


?>