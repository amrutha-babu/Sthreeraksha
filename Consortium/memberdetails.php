<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<body>

</div><div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Consortium Members Details</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="90%">
<tr>
<th>Member Name</th>
<th>Member Type</th>
<th> Phone No</th>
<th> Email ID</th>
<th> Photo<th>
</tr>
<?php
$res=mysql_query("select * from tb_consortium_members",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['member_id'];
	$a=$row['member_name'];
	$c=$row['member_type'];
	$d=$row['member_phone'];
	$e=$row['member_email'];
	$f=$row['photo'];
	echo "<tr><td>".$a."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td><a href='../Members/Photos/".$f."'>".$f."</a></td><td><a href=edit_cmembers.php?id=".$id.">View</a></td><td><a href=memberdelete.php?id=".$id.">Delete</a></td></tr>";
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
