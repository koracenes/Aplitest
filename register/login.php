<?php
echo "
						<form action='' method='POST'>
					<table>
						<tr>
							<td>";
							
							if(isset($_GET['error'])) {
								echo "<spawn style='color:red; font-size:12; '>Pogre¹na email adresa/lozinka</spawn>";
								}
							
				echo			"</td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td>Email adresa</td>
						</tr>
						<tr>
							<td><input type='textbox' name='emailBox' > </td>
						</tr>
						<tr>
							<td>Lozinka</td>
						</tr>
						<tr>
							<td><input type='password' name='passBox'> </td>
						</tr>
						
						<tr>
							<td><input type='submit' name='submit_login' value='Prijavite se'></td>
						</tr>
						
					</table>
				</form>
				
				
	</div>
				";
?>				