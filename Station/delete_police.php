<?php
include 'db1.php';
$d=$_GET['pid'];
$r=mysql_query("select log_id from tb_police where police_id='$d'",$con);
while ($row=mysql_fetch_assoc($r)) {
	$id=$row['log_id'];
}
$var=mysql_query("delete from tb_police where police_id='$d'",$con);
$res=mysql_query("delete from tb_login where log_id='$id'",$con);
echo "<script>alert('Job deleted')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/view police.php'</script>";
?>