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
		<li class="breadcrumb-item active" aria-current="page">View New Appointments</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form10" id="form10">
<br>
<br>
<br>
<table align="center" border="1" width="75%">
<tr>
<th>Date</th>
<th>Appointment Date</th>
<th>Appointment Type</th>
</tr>
<?php
$resu=mysql_query("select * from tb_appointment where status=0 and center_id='$id'",$con);
while($row=mysql_fetch_assoc($resu))
{
	$aid=$row['app_id'];
	$uid=$row['user_id'];
	$a=$row['date'];
	$b=$row['app_date'];
	$c=$row['app_type'];
	echo "<tr><td>".$a."</td><td>".$b."</td><td>".$c."</td><td><a href=app_con.php?aid=".$aid.">View and Confirm</a></td><td><a href=appreject.php?aid=".$aid.">Reject</a></td></tr>";
}
?>
</table>
</form>
</body>
</html>
