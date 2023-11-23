<?php 
include 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $data = json_decode(file_get_contents("php://input", true));
$res=[];
$r=mysql_query("select * from tb_hostel where status=1",$con) or die(mysql_error());
while($row=mysql_fetch_assoc($r))
{
	$path = "../hostel/photos/".$row["picture"];
	$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
$row["picture"]=$base64;
	$res[]=$row;
}
echo json_encode($res);
?>
