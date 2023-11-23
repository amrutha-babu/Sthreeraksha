<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<?php
$id=$_SESSION['user_id'];
$var=mysql_query("select * from tb_ccenter where status=1 and center_id='$id'",$con);
if(mysql_num_rows($var)>0)
{
	
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/regdoctors.php'</script>";
}
else
{
	echo "<script>alert('Request is not Approved.Permission is not Allowed')</script>";
	
echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/index.html'</script>";
}
?>