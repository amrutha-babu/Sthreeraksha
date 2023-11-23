<?php
include 'db1.php';
$d=$_GET['cid'];
$var=mysql_query("update tb_hostel set status=2 where hostel_id='$d'",$con);
echo "<script>alert('Request Rejected')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/h_newrequest.php'</script>";
?>