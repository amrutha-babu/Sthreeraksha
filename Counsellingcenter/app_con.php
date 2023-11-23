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



function onTimeChange() {
	var inputEle = document.getElementById('time');
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  alert(hours + ':' + minutes + ' ' + meridian);
  //document.getElementById('time').value="hi";
  //document.getElementById('timeInput').value=hours + ':' + minutes + ' ' + meridian;
}
</script>
</head>
<body> 
<?php
$id=$_GET['aid'];
$var=mysql_query("select * from tb_appointment where app_id='$id'",$con);
while($row=mysql_fetch_assoc($var))
{
	$cid=$row['center_id'];
	$uid=$row['user_id'];
	$date=$row['app_date'];
	$type=$row['app_type'];
}
$var1=mysql_query("select * from tb_user where user_id='$uid'",$con);
while($row=mysql_fetch_assoc($var1))
{
	$name=$row['user_name'];
	$dis=$row['district'];
	$place=$row['place'];
	$hname=$row['house_name'];
	$pin=$row['pin'];
	$dob=$row['date_of_birth'];
	$date2 = date('Y-m-d');
	$diff = abs(strtotime($date2) - strtotime($dob));
	$age = floor($diff / (365*60*60*24));
	$mob=$row['mobile_no'];
	$cat=$row['category'];
	$psta=$row['poverty_status'];
	$mar=$row['marital_status'];
}
if(isset($_POST['confirm']))
{
	$time=$_POST['time'];
	$timef=$_POST['ampm'];
	$ty=$time." ".$timef;
	$doc=$_POST['doc'];
	$status='1';
	$exe1=mysql_query("select * from tb_cdoctors where doc_name='$doc'",$con);
	while($row=mysql_fetch_assoc($exe1))
	{
		$did=$row['doc_id'];
	}
		$var2=mysql_query("select * from tb_appointment where app_date='$date' and app_time='$ty' and doc_id='$did'",$con);
		if(mysql_num_rows($var2) > 0)
		{
			echo "<script>alert('There is an another appointment on the same time')</script>";
		}
		else
		{
			$var3=mysql_query("select * from tb_appointment where doc_id='$did' and app_date='$date'",$con);
			if(mysql_num_rows($var3) <= 0)
			{
				$token=1;
			}
			else
			{
				while($row=mysql_fetch_assoc($var3))
				{
					$t=$row['token_no'];
					$token=$t+1;
				}
			}
			$exe=mysql_query("update tb_appointment set app_time='$ty',doc_id='$did',token_no='$token',status='$status' where app_id=$id",$con);
			echo "<script>alert('Appointment Confirmed')</script>";
			echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/appview.php'</script>";
		}

}
?>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Confirm Appointment</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form10" id="form10">
<table align="Center" cellpadding="10" width="40%">
	<tr><th colspan="2" align="center"><h2 align="center">Appointment Details</h2></th></tr>
<tr>
	<th> Sender's name</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$name" ?>"></td>
</tr>
<tr>
	<th> Address </th>
	<td><textarea class="form-control" rows="4" disabled ><?php echo "$hname\n$place\n$dis\n$pin" ?></textarea>
	</td>
</tr>
<tr>
	<th>Age</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$age" ?>"></td>
	
</tr>
<tr>
	<th>Mobile Number</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$mob" ?>"></td>
<tr>
	<th>Category</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$cat" ?>"></td>
</tr>
<tr>
	<th>Poverty Status</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$psta" ?>"></td>
</tr>
<tr>
	<th>Marital Status</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$mar" ?>"></td>
</tr>
<tr>
	<th>Appointment Date</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$date" ?>"></td>
</tr>
<tr>
	<th>Appointment Type</th>
	<td><input class="form-control" type="text" name="sname" disabled value="<?php echo "$type" ?>"></td>
</tr>
<tr>
	<th>Appointment Time</th>
	<td><input type="time" id="time" name="time" class="without_ampm"required />
	<select name="ampm" id="ampm" required>
	<option value="option 1">Select</option>
	<option value="AM">AM</option>
	<option value="PM">PM</option>
	</td>
</tr>
<tr>
	<td></td>
	<td id="time"></td>
</tr>
<tr>
	<th>Doctor Name</th>
	<td><select class="form-control" name="doc" id="doc" required>
        <option value="option 1">--Select Doctor--</option>
		<?php
		$re=mysql_query("select * from tb_cdoctors where center_id='$cid' and doc_specialization='$type'",$con);

		while($row=mysql_fetch_assoc($re))
		{
			echo "<option value='".$row['doc_name']."'>".$row['doc_name']."</option>";
		}
		?>
	</select>
	</td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-4">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<button type="submit" name="confirm" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Confirm</a></button>
	</div>
</div>
</th>
</form>
</table>
</form>
</body>
</html>