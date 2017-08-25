<?php

print_r($_POST);

include('../sql.php');

mysqli_query($adb, " 
				   UPDATE ugyvezeto_adatok
				   SET    statusz = 'A' 
				   WHERE  ugyvezeto_id = '$_POST[ugyvezeto_id_a]'
                   ");


mysqli_query($adb, " 
				   UPDATE ugyvezeto_adatok
				   SET    statusz = 'I' 
				   WHERE  ugyvezeto_id = '$_POST[a_u]'
                   ");
				 

mysqli_close($adb);
?>

<script>
parent.location.href = parent.location.href
</script>