<?php
session_start();
include 'db1.php';
include 'header.html';
?>
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
<form action="" method="post"enctype="multipart/form-data" name="form6" id="form6">
	
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">My Appointments</li>
	</ol>
</div>
<br>
<h2 align="center"> My Appointments</h2><br><br>
<table align="center" class="table-style-three" width="75%" border="1">
	<tr>
<th>Date</th><th>Center Name</th><th>Appointment Type</th><th>Appointment Date</th>
</tr>
<?php
$uid= $_SESSION['user_id'];
$result = mysql_query("select * from tb_appointment where user_id = '$uid'",$con);
 while($row=mysql_fetch_assoc($result))
 {
 	$id=$row['app_id'];
	$cid=$row['center_id'];
	$b=$row['date'];
	$c=$row['app_type'];
	$d=$row['status'];
	$e=$row['app_date'];
	$resu=mysql_query("select center_name from tb_ccenter where center_id=$cid");
	while($row=mysql_fetch_assoc($resu))
	{
		$a=$row['center_name'];
	}
	
	if($d==0)
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewuapp.php?app_id=".$id.">View</a></td></tr>";
	}
	elseif($d==1)
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewaapp.php?app_id=".$id.">View</a></td></tr>";
	}
	else
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewrapp.php?app_id=".$id.">View</a></td></tr>";
	}
 }
?>
</table>
</div>
</div>
</form>
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
