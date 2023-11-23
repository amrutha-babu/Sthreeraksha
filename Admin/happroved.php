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
		<li class="breadcrumb-item active" aria-current="page">Hostel Approved List</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="100%">
<tr>
<th>Date</th>
<th>Hostel Name</th>
<th>District</th>
<th>Place</th>
<th>Pin</th>
<th>Warden Name</th>
<th>Available Rooms</th>
<th>Mobile Number</th>
<th>Email ID</th>
<th>Picture</th>
<th>Documents</th>
</tr>
<?php
$res=mysql_query("select * from tb_hostel where status=1",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['hostel_id'];
	$a=$row['date'];
	$b=$row['hostel_name'];
	$c=$row['district'];
	$d=$row['place'];
	$e=$row['pin'];
	$f=$row['warden'];
	$g=$row['no_of_rooms'];
	$h=$row['mobile_no'];
	$i=$row['email_id'];
	$k=$row['picture'];
	$l=$row['doc_upload'];
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td>".$g."</td><td>".$h."</td><td>".$i."</td><td><a href='../Hostel/Photos/".$k."'>".$k."</a></td><td><a href='../Hostel/Documents/".$l."'>".$l."</a></td></tr>";
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