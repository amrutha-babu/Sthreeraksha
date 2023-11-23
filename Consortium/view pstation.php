<?php
session_start();
include 'header.html';
include 'db1.php';
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
while ($row=mysql_fetch_assoc($re)) 
{
	$dis=$row['consortium_district'];
}
?>
<html>
<body>

</div><div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Police Details</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="90%">
<tr>
<th>Police Station</th>
<th>Station Phone Number</th>
<th>Incharge Name</th>
<th>Incharge Phone No</th>
<th>Incharge Email ID</th>
<th>Photo</th>
</tr>
<?php
$res=mysql_query("select * from tb_police_station where district='$dis'",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['station_id'];
	$a=$row['place'];
	$b=$row['district'];
	$d=$row['station_no'];
	$c=$row['station_pin'];
	$e=$row['incharge_name'];
	$f=$row['incharge_phone'];
	$g=$row['incharge_email'];
	$h=$row['photo'];
	echo "<tr><td>".$b.", ".$a." ,".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td>".$g."</td><td><a href='../Station/Photos/".$h."'>".$h."</a></td><td><a href=edit_pstation.php?police_id=".$id.">View and Edit</a></td></tr>";
}
?>
</table>
<!-- map -->
<div class="w3l-map p-2">
	<iframe src="D:\Main Project\Sthree raksha\images\banner3.jpg"></iframe>
</div>
<!-- //map -->
</body>
<?php
include 'footer.html';
?>
</html>
