<?php
session_start();

if($_SESSION['SESS_TIP']=='student'){
echo"
<table style='font-size:14px;'>
		<tr>
			<td><strong>Tip:</strong></td>
			<td>Student<td>
		</tr>
	<tr>
		<td><strong>Ime:</strong></td>
		<td>".$_SESSION['SESS_USERNAME']."<td>
	</tr>
	<tr>
		<td><strong>Prezime:</strong></td>
		<td>".$_SESSION['SESS_LASTNAME']."<td>
	</tr>
	<tr>
		<td><strong>Indeks:</strong></td>
		<td>".$_SESSION['SESS_INDEX']."<td>
	</tr>
	<tr>
		<td><strong>Smer:</strong></td>
		<td>";
		$query=" SELECT * FROM smer WHERE id=".$_SESSION['SESS_SMER'];
		$result=mysqli_query($con, $query);
		while($row=mysqli_fetch_array($result)){
		echo $row['naziv']."</td>";}
	echo"</td>
	</tr>
</table>
";
}
if($_SESSION['SESS_TIP']=='profesor'){
	echo"
	<table style='font-size:14px;'>
		<tr>
			<td><strong>Tip:</strong></td>
			<td>Profesor<td>
		</tr>
		<tr>
			<td><strong>Ime:</strong></td>
			<td>".$_SESSION['SESS_USERNAME']."<td>
		</tr>
		<tr>
			<td><strong>Prezime:</strong></td>
			<td>".$_SESSION['SESS_LASTNAME']."<td>
		</tr>";
	if($_SESSION['SESS_STATUS']=='neaktivan'){
	echo"
		<tr>
			<td></td>
		</tr>
		<tr>
			<td colspan='2'>Vaš nalog <span style='color:red;'>nije aktiviran.</span> 
			Molimo vas da se javite <strong>administratoru</strong> za aktivaciju!</td>
		</tr>
		";
	}
echo"</table>";
}

if($_SESSION['SESS_TIP']=='admin'){
	echo"
	<table style='font-size:14px;'>
		<tr>
			<td><strong>Tip:</strong></td>
			<td>Administrator<td>
		</tr>
		<tr>
			<td><strong>Ime:</strong></td>
			<td>".$_SESSION['SESS_USERNAME']."<td>
		</tr>
		<tr>
			<td><strong>Prezime:</strong></td>
			<td>".$_SESSION['SESS_LASTNAME']."<td>
		</tr>";
	
echo"</table>";

}

?>