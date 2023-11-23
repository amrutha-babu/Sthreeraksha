<?php
include 'db1.php';
$d=$_GET['cid'];
$var=mysql_query("update tb_ccenter set status=1 where center_id='$d'",$con);
echo "<script>alert('Request Approved')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/c_newrequest.php'</script>";
?>