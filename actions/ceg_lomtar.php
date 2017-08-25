<?php

print_r($_POST);

include('../sql.php');

mysqli_query($adb, " 
				   UPDATE ceg_adatok
				   SET    statusz = 'I' 
				   WHERE  ceg_id = '$_POST[ceg_id_l]'
                   ");
				 

mysqli_close($adb);
?>

<script>
parent.location.href = parent.location.href
</script>