<?php
session_start();
require("config.php");

$str='admin';
$aAdmin="class='trenutna'";
$naslov="apliTest | Admini";

require("header.php");

include("register/admin_reg.php");
echo"

<h1>Lista Administratora</h1>

<form name='frmTip' method='post' action='promTip.php'>
<table class='adminList'>
<tr>
	<th>No</th>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Mail</th>
	<th>Tip</th>
	<th>Izbriši</th>
</tr>
";

$sqlStud="SELECT * FROM profil WHERE tip='admin'";
$run_sqlStud= mysqli_query($con, $sqlStud);
$i=1;
while($row_stud = mysqli_fetch_array($run_sqlStud)){
	$id=$row_stud['id'];
	$ime=$row_stud['ime'];
	$prezime=$row_stud['prezime'];
	$mail=$row_stud['email'];
	$tip=$row_stud['tip'];
	echo"
		<tr>
			<td>$i</td>
			<td>$ime</td>
			<td>$prezime</td>
			<td>$mail</td>";
	if($id!= $_SESSION['SESS_USERID'])	{
		echo"
			<td style='width:170px;'>
				<select name='tip'>
					<option value='student'>Student</option>
					<option value='profesor'>Profesor</option>
					<option value='admin' selected>Admin</option>
				</select>
				<input type='hidden' name='id' value='$id'>
				<input type='submit' name='promTip' value='OK' style='margin-left:10px;'/>
			</td>
			<td style='padding-left:20px;'>
				<a style='color:red;'  href='delStudent.php?id=$id&tip=$tip'>[X]</a>
			</td>
		</tr>";
	}else{		
		echo"
		<td style='width:170px;'>
				<select name='tip' style='width:75px;'>
					<option value='admin' selected>Admin</option>
				</select>
				<input type='button'  value='OK' style='margin-left:10px;'/>
			</td>
			<td style='padding-left:20px;'>
				<a style='color:red;'  href='#' onclick='alert(\"Ne možete izbrisati svoj profil! \")'>[X]</a>
			</td>
		</tr>";
	}
	$i++;
}


echo"
</table>
</form>";

require("footer.php");

?>