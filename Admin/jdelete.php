<?php
include 'db1.php';
$d=$_GET['id'];
$var=mysql_query("delete from tb_joboffer where job_id='$d'",$con);
echo "<script>alert('Job deleted')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/jdetails.php'</script>";
?>