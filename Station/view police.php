<?php
session_start();
include 'header.html';
include 'db1.php';
$id=$_SESSION['user_id'];
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
<th>Police Name</th>
<th>Date of Birth</th>
<th>Designation</th>
<th>Phone No</th>
<th>Email ID</th>
</tr>
<?php
$res=mysql_query("select * from tb_police where station_id=$",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['police_id'];
	$a=$row['police_name'];
	$c=$row['police_dob'];
	$d=$row['designation'];
	$e=$row['phone_no'];
	$f=$row['email_id'];
	echo "<tr><td>".$a."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td><a href=edit_police.php?police_id=".$id.">View and Edit</a></td><td><a href=delete_police.php?pid=".$id.">Delete</a></td></tr>";
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
