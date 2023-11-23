<?php 
include 'connection.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input", true));
$res=[];
//$today = date("F j, Y, g:i a");
$r=mysql_query("insert into tbl_inlocation values('','$data->lat','$data->lon','$data->location')",$con) or die(mysql_error());
echo json_encode("ok");
?>
