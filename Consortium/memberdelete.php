<?php
include 'db1.php';
$d=$_GET['id'];
$re=mysql_query("select log_id from tb_consortium_members where member_id='$d'",$con);
while($row=mysql_fetch_assoc($re)) {
	$log=$row['log_id'];
}
$var=mysql_query("delete from tb_consortium_members where member_id='$d'",$con);
$va=mysql_query("delete from tb_login where log_id='$log'",$con);
echo "<script>alert('Deleted Successfully')</script>";
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/memberdetails.php'</script>";
?>