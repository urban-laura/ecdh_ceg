<?php

print_r($_POST);

include('../sql.php');

mysqli_query($adb, " 
				   UPDATE ugyvezeto_adatok
				   SET    statusz = 'D' 
				   WHERE  ugyvezeto_id = '$_POST[ugyvezeto_id_t]'
                   ");

mysqli_close($adb);
?>

<script>
parent.location.href = parent.location.href
</script>