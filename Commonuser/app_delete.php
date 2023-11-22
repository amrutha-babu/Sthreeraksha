<?php
include 'db1.php';
mysql_query("delete from tb_appointment where app_id='".$_GET["app_id"]."'") or die(mysql_error());
// echo "<script>alert('Appointment deleted')<script>";
echo "<script>window.location.href='view Appointment.php'</script>";
?>