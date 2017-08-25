<?php

print_r($_POST);

include('../sql.php');

$van = mysqli_query($adb, "SELECT ceg_nev FROM ceg_adatok WHERE ceg_nev='$_POST[ceg_nev]'");

if($_POST[ceg_nev] == "")
{
die("
<script> alert('Nem adott meg Cégnevet!') </script>
");
}

if(mysqli_num_rows($van)>0)
{
die("
<script> alert('Ezt a céget egyszer már felvette!') </script>
");
}

if($_POST[profil] == "")
{
die("
<script> alert('Nem adott meg Profilt!') </script>
");
}

if($_POST[ugyvezeto_email] == "")
{
die("
<script> alert('Nem adott meg email címet!') </script>
");
}


else
{
mysqli_query($adb, "

	INSERT INTO ceg_adatok
		(ceg_id, 		   ceg_nev, 	  ceg_profil, ceg_regisztracio, statusz)
	VALUES
		(  NULL, '$_POST[ceg_nev]', '$_POST[profil]', 			 NOW(),     'A')

				   ");


mysqli_query($adb, "

	INSERT INTO ugyvezeto_adatok
		(ugyvezeto_id, 			 ceg_id, 		   ugyvezeto_email, statusz)
	VALUES
		(  		 NULL, LAST_INSERT_ID(), '$_POST[ugyvezeto_email]',     'A')
		
				   ");

print"
<script> alert('Sikeres Cég felvétel.') 

parent.location.href = '../index.php'
</script>
";
}

mysqli_close($adb);