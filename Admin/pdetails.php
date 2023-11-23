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
		<li class="breadcrumb-item active" aria-current="page">Pension Details</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="100%">
<tr>
<th>Date</th>
<th>Pension Type</th>
<th>Description</th>
</tr>
<?php
$res=mysql_query("select * from tb_pension",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['pid'];
	$a=$row['date'];
	$b=$row['type_of_pension'];
	$c=$row['description'];
	$d=$row['link'];
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td><a href=edit_pdetails.php?id=".$id.">View and Edit</a></td><td><a href=pdelete.php?id=".$id.">Delete</a></td></tr>";
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
