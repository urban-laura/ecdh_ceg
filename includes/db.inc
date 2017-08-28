<?php

function db_connect() {
	 $adb = mysqli_connect("localhost", "root", "mysql", "ceg");  

	 return $adb;  
}

function company_list($adb, $status = 'A') {

	$ceg_aktiv = mysqli_query($adb, "
								SELECT *
								FROM ceg_adatok, ugyvezeto_adatok
								WHERE ugyvezeto_adatok.ceg_id = ceg_adatok.ceg_id AND
									  ugyvezeto_adatok.statusz = 'A'			  AND
									  ceg_adatok.statusz = '$status'
								ORDER BY ceg_regisztracio DESC
							    ");

    return $ceg_aktiv;
}

/*

$result - standard mysql db query results

*/
function company_list_render($results, $status) {
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

while($c_a = mysqli_fetch_array($results))
{

	print"
		<tr>
			
			<td><a href='href/ceg_adatok.php?c_adat=$c_a[ceg_id]'>$c_a[ceg_nev]</a></td>
			<td>$c_a[ceg_profil]</td>
			<td>$c_a[ugyvezeto_email]</td>
			<td>$c_a[ceg_regisztracio]</td>
			";

if ($status == 'active') {
	render_form_button('trash');
}
else {
	render_form_button('set active');
}
			print "
		</tr>
	";
}


print"
	</table>
";
}

function render_form_button($status) {
	switch ($status):
	'trash':
  print "
			<form action='actions/ceg_lomtar.php' method='post' target='ablak'>
				<td><input name='ceg_id_l' type='hidden' value='$c_a[ceg_id]'><input type='submit' value='Lomtár'></td>
			</form>
			break;
			'set active'
}
