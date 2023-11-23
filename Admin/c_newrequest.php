<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<body>

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Counselling Center New Request</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="100%">
<tr>
<th>Date</th>
<th>Name</th>
<th>District</th>
<th>Place</th>
<th>Pin</th>
<th>Phone Number</th>
<th>Email ID</th>
<th>Document Upload</th>
</tr>
<?php
$res=mysql_query("select * from tb_ccenter where status=0",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['center_id'];
	$a=$row['date'];
	$b=$row['center_name'];
	$c=$row['district'];
	$d=$row['place'];
	$e=$row['pin'];
	$f=$row['phone_no'];
	$g=$row['email_id'];
	$h=$row['doc_upload'];
	
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td>".$g."</td><td><a href='../Counsellingcenter/Documents/".$h."'>".$h."</a></td><td><a href=crequest2.php?cid=".$id.">Approve</a></td><td><a href=creject.php?cid=".$id.">Reject</a></td></tr>";
}

?>
</table>
<!-- map -->
<div class="w3l-map p-2">
	<iframe src="D:\Main Project\Sthree raksha\images\banner3.jpg"></iframe>
</div>
<!-- //map -->
<?php
include 'footer.html';
?>
</body>
</html>
