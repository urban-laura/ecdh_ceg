<?php

include('sql.php');

$ceg_aktiv = mysqli_query($adb, "
								SELECT *
								FROM ceg_adatok, ugyvezeto_adatok
								WHERE ugyvezeto_adatok.ceg_id = ceg_adatok.ceg_id AND
									  ugyvezeto_adatok.statusz = 'A'			  AND
									  ceg_adatok.statusz = 'A'
								ORDER BY ceg_regisztracio DESC
							    ");

print"
	<table id='aktiv_ceg'>
		<tr>
			<td colspan='4' class='cim'>Aktív cégek</td>
		</tr>
		<tr>
			<td class='title'>Cégnév</td>
			<td class='title'>Profil</td>
			<td class='title'>Ügyvezető email</td>
			<td class='title'>Regisztráció ideje</td>
			<td>&nbsp;</td>
		</tr>
";

while($c_a = mysqli_fetch_array($ceg_aktiv))
{

	print"
		<tr>
			
			<td><a href='href/ceg_adatok.php?c_adat=$c_a[ceg_id]'>$c_a[ceg_nev]</a></td>
			<td>$c_a[ceg_profil]</td>
			<td>$c_a[ugyvezeto_email]</td>
			<td>$c_a[ceg_regisztracio]</td>
			<form action='actions/ceg_lomtar.php' method='post' target='ablak'>
				<td><input name='ceg_id_l' type='hidden' value='$c_a[ceg_id]'><input type='submit' value='Lomtár'></td>
			</form>
		</tr>
	";
}


print"
	</table>
";

mysqli_close($adb);