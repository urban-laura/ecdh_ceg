<?php

print_r($_POST);

include('../sql.php');

$van = mysqli_query($adb, "SELECT ugyvezeto_email FROM ugyvezeto_adatok WHERE ugyvezeto_email='$_POST[ugyvezeto_email]'");

if(mysqli_num_rows($van)>0)
{
die("
<script> alert('Ezt az ügyvezetőt egyszer már felvette!') </script>
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

	INSERT INTO ugyvezeto_adatok
		(ugyvezeto_id, 	  ceg_id, 		   ugyvezeto_email, statusz)
	VALUES
		(  		 NULL, $_POST[c], '$_POST[ugyvezeto_email]',    'A')
		
				      ");

	mysqli_query($adb, " 
				   UPDATE ugyvezeto_adatok
				   SET    statusz = 'I' 
				   WHERE  ugyvezeto_id = '$_POST[a_u]'
                   ");
	
print"
<script> alert('Sikeres Ügyvezető felvétel.') 

parent.location.href = parent.location.href
</script>
";			 
}

mysqli_close($adb);
