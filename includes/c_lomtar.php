<?php

include('sql.php');

$ceg_lomtar = mysqli_query($adb, "
							     SELECT *
							     FROM ceg_adatok, ugyvezeto_adatok
							     WHERE ugyvezeto_adatok.ceg_id = ceg_adatok.ceg_id AND
								       ugyvezeto_adatok.statusz = 'A'			  AND
								       ceg_adatok.statusz = 'I'
							     ORDER BY ceg_regisztracio DESC
							     ");

print"
	<table id='lomtar_ceg'>
		<tr>
			<td colspan='4' class='cim'>Lomtár</td>
		</tr>
		<tr>
			<td class='title'>Cégnév</td>
			<td class='title'>Profil</td>
			<td class='title'>Ügyvezető email</td>
			<td class='title'>Regisztráció ideje</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
";

while($c_l = mysqli_fetch_array($ceg_lomtar))
{

	print"
		<tr>
			<td><a href='href/ceg_adatok.php?c_adat=$c_l[ceg_id]'>$c_l[ceg_nev]</td></a>
			<td>$c_l[ceg_profil]</td>
			<td>$c_l[ugyvezeto_email]</td>
			<td>$c_l[ceg_regisztracio]</td>
			<form action='actions/ceg_aktiv.php' method='post' target='ablak'>
				<td><input name='ceg_id_a' type='hidden' value='$c_l[ceg_id]'><input type='submit' value='Aktiválás'></td>
			</form>
			<form action='actions/ceg_torol.php' method='post' target='ablak'>
				<td><input name='ceg_id_t' type='hidden' value='$c_l[ceg_id]'><input type='submit' value='Törlés'></td>
			</form>
		</tr>
	";
}


print"
	</table>
";

mysqli_close($adb);