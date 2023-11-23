<?php
include 'db1.php';
$d=$_GET['aid'];
$var=mysql_query("update tb_appointment set status=2 where app_id='$d'",$con);
echo "<script>alert('Request Rejected')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Counsellingcenter/appview.php'</script>";
?>