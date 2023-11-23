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
		<li class="breadcrumb-item active" aria-current="page">Consortium Details</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="90%">
<tr>
<th>Date</th>
<th>District</th>
<th>Consortium Head Name</th>
<th>Head Phone No</th>
<th>Head Email ID</th>
</tr>
<?php
$res=mysql_query("select * from tb_consortium",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['consortium_id'];
	$a=$row['date'];
	$c=$row['consortium_district'];
	$d=$row['consortium_head'];
	$e=$row['consortium_head_phone'];
	$f=$row['consortium_head_email'];
	echo "<tr><td>".$a."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td><a href=edit_consortium.php?id=".$id.">View and Edit</a></td></tr>";
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
