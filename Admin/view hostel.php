<?php
session_start();
include 'header.html';
include 'db1.php';
?>

<!-- //header -->

<!-- inner banner -->

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
<table align="center" border="2" width="75%">
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
$res=mysql_query("select * from tb_ccenter where status=1",$con);
while($row=mysql_fetch_assoc($res))
{
	$a=$row['date'];
	$b=$row['center_name'];
	$c=$row['district'];
	$d=$row['place'];
	$e=$row['pin'];
	$f=$row['phone_no'];
	$g=$row['email_id'];
	$h=$row['doc_upload'];
	
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td><td>".$f."</td><td>".$g."</td><td>".$h."</td><td><a href=c_newrequest.php>Approve</a></td></tr>";
}

?>
</table>
<?php 

include 'footer.html';
?>