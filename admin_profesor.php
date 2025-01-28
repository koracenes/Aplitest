<?php
session_start();
require("config.php");

$str='prof';
$aProf="class='trenutna'";
$naslov="apliTest | Admini";



require("header.php");
include("register/admin_reg.php");
echo"

<h1>Lista Profesora</h1>
<table class='adminList'>
<tr>
	<th>No</th>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Email</th>
	<th>Tip</th>
	<th>Status</th>
	<th>Izbriši</th>
</tr>
";

$sqlStud="SELECT * FROM profil WHERE tip='profesor' ORDER BY status";
$run_sqlStud= mysqli_query($con, $sqlStud);
$i=1;
while($row_stud = mysqli_fetch_array($run_sqlStud)){
	$id=$row_stud['id'];
	$ime=$row_stud['ime'];
	$prezime=$row_stud['prezime'];
	$email=$row_stud['email'];
	$status=$row_stud['status'];
	$tip=$row_stud['tip'];
	
	echo"
		<tr>
			<td>$i</td>
			<td>$ime</td>
			<td>$prezime</td>
			<td>$email</td>
			<form name='frmTip' method='post' action='promTip.php'>
			<td style='width:150px;'>
				<select name='tip'>
					<option value='student'>Student</option>
					<option value='profesor' selected>Profesor</option>
					<option value='admin'>Admin</option>
				</select>
				
				<input type='hidden' name='id' value='$id'>
				<input type='submit' name='promTip' value='OK'  style='margin-left:10px;'>
			</td>
			</form>
			<form name='frmStatus' method='post' action='promStatus.php'>
			<td  style='width:150px;'>
				";
				if($status=='neaktivan'){
					echo"
						<select style='background-color:red;color:white;' name='status'>
						 <option style='background-color:red;' value='neaktivan' selected>neaktivan</option>
						 <option style='background-color: green;' value='aktivan'>aktivan</option>
						</select>";
				}	
				if($status=='aktivan'){
					echo"
						<select style='background-color: green; color:white;' name='status'>
						 <option style='background-color:red;'value='neaktivan'>neaktivan</option>
						 <option style='background-color: green;' value='aktivan' selected>aktivan</option>
						</select>";
				}	
			echo"
				<input type='hidden' name='ids' value='$id'>
				<input type='submit' name='promStatus' value='OK'  style='margin-left:10px;'>
			</td>
			</form>
			<td style='padding-left:20px;'><a style='color:red; '  href='delStudent.php?id=$id&tip=$tip'>[X]</a></td>
		</tr>
		
	";
	$i++;
}


echo"
</table>
</form>";

require("footer.php");

?>