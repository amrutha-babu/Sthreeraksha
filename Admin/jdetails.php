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
		<li class="breadcrumb-item active" aria-current="page">Job Details</li>
	</ol>
</div>
<br>
<br>
<br>
<table align="center" border="1" width="90%">
<tr>
<th>Date</th>
<th>Job Title</th>
<th>start Date</th>
<th>End Date</th>
</tr>
<?php
$res=mysql_query("select * from tb_joboffer",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['job_id'];
	$a=$row['date'];
	$b=$row['job_title'];
	$c=$row['application_sdate'];
	$d=$row['application_edate'];
	$e=$row['link'];	
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td>".$d."</td><td><a href=edit_jdetails.php?id=".$id.">View and Edit</a></td><td><a href=jdelete.php?id=".$id.">Delete</a></td></tr>";
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
