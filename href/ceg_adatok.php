<head>
	<link rel='stylesheet' type='text/css' href='../css/index.css'>
</head>

<?php 

include('../includes/iframe.php');

include('../sql.php');

$ceg = mysqli_query($adb, "
						  SELECT *
						  FROM ceg_adatok
						  WHERE ceg_id = '$_GET[c_adat]'
						  ");

$aktiv_ugyvezeto = mysqli_query($adb, "
						  			  SELECT *
						  			  FROM ugyvezeto_adatok
						  			  WHERE ceg_id = '$_GET[c_adat]' AND
						  					statusz = 'A'
						  			  ");

$inaktiv_ugyvezeto = mysqli_query($adb, "
						  			  SELECT *
						  			  FROM ugyvezeto_adatok
						  			  WHERE ceg_id = '$_GET[c_adat]' AND
						  					statusz = 'I'
						  			  ");

$c = mysqli_fetch_array($ceg);
$a_u = mysqli_fetch_array($aktiv_ugyvezeto);

print"
<table id='adatok'>
	<tr>
		<td class='title'>Cégnév:</td>
		<td>$c[ceg_nev]</td>
	</tr>
	
	<tr>
		<td class='title'>Profil:</td>
		<td>$c[ceg_profil]</td>
	</tr>	

	<tr>
		<td class='title'>Ügyvezető email:</td>
		<td>$a_u[ugyvezeto_email]
	</tr>

	<tr>
		<td class='title'>Regisztráció ideje:</td>
		<td>$c[ceg_regisztracio]<td>
	</tr>
</table>

<form action='../actions/ugyvezeto_felvesz.php' method='post' target='ablak'>
<table id='ugyvezeto_felvesz'>
	<tr>
		<td colspan='2' class='cim'>Új ügyvezető</td>
	</tr>

	<tr>
		<td>Ügyvezető email:</td>
		<td><input type='email' name='ugyvezeto_email'></td>
	</tr>

	<tr>
		<td colspan='2' class='gomb'>
			<input name='a_u' type='hidden' value='$a_u[ugyvezeto_id]'>
			<input name='c' type='hidden' value='$c[ceg_id]'>
			<input type='submit' name='felvetel' value='Felvétel'>
		</td>
	</tr>
</table>
</form>

<table id=lomtar_ugyvezeto>
	<tr>
		<td class='cim'>Lomtár</td>
	</tr>

	<tr>
		<td class='title'>Ügyvezető email</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
";

while($i_u = mysqli_fetch_array($inaktiv_ugyvezeto))
{

	print"
		<tr>
			<td>$i_u[ugyvezeto_email]</td>
			<form action='../actions/ugyvezeto_aktiv.php' method='post' target='ablak'>
				<td>
					<input name='ugyvezeto_id_a' type='hidden' value='$i_u[ugyvezeto_id]'>
					<input name='a_u' type='hidden' value='$a_u[ugyvezeto_id]'>
					<input type='submit' value='Aktiválás'>
				</td>
			</form>
			<form action='../actions/ugyvezeto_torol.php' method='post' target='ablak'>
				<td>
					<input name='ugyvezeto_id_t' type='hidden' value='$i_u[ugyvezeto_id]'>
					<input type='submit' value='Törlés'>
				</td>
			</form>
		</tr>
	";
}


print"
</table>

<a href='../index.php'><h2>Cégjegyzék</h2></a>
";