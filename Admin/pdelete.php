<?php
include 'db1.php';
$d=$_GET['id'];
$var=mysql_query("delete from tb_pension where pid='$d'",$con);
echo "<script>alert('Deleted Successfully')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pdetails.php'</script>";
?>