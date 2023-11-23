<?php
include 'db1.php';
$d=$_GET['hid'];
$var=mysql_query("update tb_hostel set status=1 where hostel_id='$d'",$con);
echo "<script>alert('Request Approved')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/h_newrequest.php'</script>";
?>