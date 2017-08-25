<?php

print_r($_POST);

include('../sql.php');

mysqli_query($adb, " 
				   UPDATE ceg_adatok
				   SET    statusz = 'A' 
				   WHERE  ceg_id = '$_POST[ceg_id_a]'
                   ");
				 

mysqli_close($adb);
?>

<script>
parent.location.href = parent.location.href
</script>