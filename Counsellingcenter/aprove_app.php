<?php
session_start();
include 'db1.php';
include 'header.html';
$id=$_SESSION['user_id'];
?>
<html>
<head>
<script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>
</head>
<body> 

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Approved Appointments</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form10" id="form10">
<br>
<br>
<br>
<table align="center" border="1" width="75%">
<tr>
<th>Appointment Date</th>
<th>Appointment Time</th>
<th>Appointment Type</th>
<th>Doctor Name</th>
<th>Token Number</th>
</tr>
<?php
$res=mysql_query("select * from tb_appointment where status=1 and center_id='$id'",$con);
while($row=mysql_fetch_assoc($res))
{
	$a=$row['app_date'];
	$b=$row['app_time'];
	$c=$row['app_type'];
	$e=$row['token_no'];
	$did=$row['doc_id'];
	$res2=mysql_query("select * from tb_cdoctors where doc_id='$did'",$con);
	while($row=mysql_fetch_assoc($res2))
	{
		$d=$row['doc_name'];
	}
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td>".$d."</td><td>".$e."</td></tr>";
}
?>
</table>
</form>
</body>
</html>
