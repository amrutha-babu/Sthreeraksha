<?php
include 'db1.php';
if ($_GET["type"]=="approve") {
	mysql_query("update tb_appointment set status='Approved' where app_id='".$_GET["app_id"]."'") or die(mysql_error());

}
elseif ($_GET["type"]=="reject") {
	mysql_query("update tb_appointment set status='Rejected' where app_id='".$_GET["app_id"]."'") or die(mysql_error());

}
echo "<script>window.location.href='view appointment.php'</script>";

?>