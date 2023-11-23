<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include 'header.php';
include '../db.php';
?>
	<meta charset="utf-8" />
	<title>Create forum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<?php
$result = mysql_query("select max(id) id from forum",$con);
  $row=mysql_fetch_assoc($result); 
  $id1=$row['id'];
  $id1=$id1+1;
  if(isset($_POST['submit']))
  {
	  $cid=$id;
	  $conid=$_POST['name'];
	  $type=$_POST['type'];
	  $head=$_POST['head'];
	$result=mysql_query("insert into forum values('','$conid','$type','$head','','','','')",$con);	
	 echo "forum created successfully";
	 
 }
		?>	


<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#17175e;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Create forum</h2></div>
<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="id" value=<?php echo $id1; ?> required="required" disabled /><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text"  name="name" required="required" placeholder="NAME"/><span class="icon-place"></span></div></div>
	<div class="element-select"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="type" >

		<option value="civil">Civil</option>
		<option value="domestic">Domestic</option>
		<option value="other">Other</option></select><i></i><span class="icon-place"></span></span></div></div></div>
		<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="head" required="required" placeholder=" Heade Name"/><span class="icon-place"></span></div></div>
	
<div class="submit"><input type="submit" name="submit" value="Submit"/></div></form><p class="frmd">
<!-- Stop Formoid form-->



</body>
</html>
