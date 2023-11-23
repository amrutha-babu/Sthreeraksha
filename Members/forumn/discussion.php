<!DOCTYPE html>
<html>
<head>
<?php
ob_start();
session_start();
include 'header.html';
include '../db1.php';
?>
	<meta charset="utf-8" />
	<title>Create topic</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<?php
$result = mysql_query("select max(id) id from discussion",$con);
  $row=mysql_fetch_assoc($result); 
  $id1=$row['id'];
  $id1=$id1+1;
  if(isset($_POST['submit']))
  {
    $id=$_SESSION['user_id'];
    $res=mysql_query("select member_name from tb_member wher member_id='$id'",$con);
    while ($row=mysql_fetch_assoc($res)) {
    	$uname=$row['member_name'];
    }
	$fid=$_GET['id'];
	$comptit=$_POST['comptit'];
	$comp=$_POST['comp'];
	$date=Date("d-m-y");
	$result=mysql_query("insert into discussion values('','$fid','$comptit','$comp','$date','$uname')",$con);
	   header("Location:viewforums.php");
	   echo "<Script>javascript:alert('Complaint registered successfully')</Script>";
	   
 }
		?>	


<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#17175e;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Create topic</h2></div>
	<div class="element-input"><label class="title"><span class="required"></span></label><div class="item-cont"><input class="large" type="text" name="compid" value=<?php echo $id1; ?> disabled required="required" /><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="comptit" required="required" placeholder="Complaint Header"/><span class="icon-place"></span></div></div>

	<div class="element-textarea"><label class="title"><span class="required">*</span></label><div class="item-cont"><textarea class="medium" name="comp" cols="20" rows="5" required="required" placeholder="Description"></textarea><span class="icon-place"></span></div></div>
	
<div class="submit"><input type="submit" name="submit" value="Submit"/></div></form><p class="frmd">
<!-- Stop Formoid form-->



</body>
</html>
