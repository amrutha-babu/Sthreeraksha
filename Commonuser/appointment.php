<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script type="text/javascript">
    function checkDOB() {
        var dateString = document.getElementById('datepicker').value;
        var myDate = new Date(dateString);
        var today = new Date();
        var todayIs =today.getTime();
        if ( myDate.getTime() < todayIs ) { 
            alert("Please select a valid date");
            document.getElementById('datepicker').value="";
             return false;
        }
        return dateString;
    }
</script>


<script>



		function getdist(val)
		{
			$.ajax({
				type: "GET",
				url: "getdistrict.php",
				data: "district="+val,
				success: function(data){
					$("#centre-list").html(data);
				}
			});
			}
			$(function()
			{
				$('dob').datetin
			});
		</script>
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
<form action="" method="post"enctype="multipart/form-data" name="form7" id="form7">
<?php
$uid=$_SESSION['user_id'];
$var=mysql_query("select * from tb_user where user_id='$uid'",$con);
while($row=mysql_fetch_assoc($var))
{
	$uname=$row['user_name'];
}
  if(isset($_POST['submit']))
  {
	date_default_timezone_set("Asia/Kolkata");
	$date=date("d-m-Y");
	$dist=$_POST['dist'];
	$center=$_POST['center'];
	$rs=mysql_query("select * from tb_ccenter where center_name='$center'",$con);
	while($row=mysql_fetch_assoc($rs))
	{
		$cid=$row['center_id'];
	}
	$adate=$_POST['datepicker'];
	$status="0";
	$result=mysql_query("insert into tb_appointment (user_id,district,center_id,app_date,status,date) 
	values('$uid','$dist','$cid','$adate','$status','$date')",$con);
	echo "<Script>javascript:alert('Appointment registered successfully')</Script>";
  }
?>

<!-- //header -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Appointment Request</li>
	</ol>
</div>
<form method="post" class="register-wthree">
<table align="Center" cellpadding="10">
	<th colspan="2" align="center"><h2 align="center">Appointment Details</h2></th><br>
<tr>
	<th> District </th>
	<th><select onchange="getdist(this.value)" name="dist" id="dist" required class="form-control">
        <option value="option 1">--Select District--</option>
		<option value="trivandrum">Trivandrum</option>
		<option value="kollam">Kollam</option>
		<option value="pathanamthitta">Pathanamthitta</option>
		<option value="alappuzha">Alappuzha</option>
		<option value="kottayam">Kottayam</option>
		<option value="idukki">Idukki</option>
		<option value="ernakulam">Ernakulam</option>
		<option value="thrissur">Thrissur</option>
		<option value="palakkad">Palakkad</option>
		<option value="malappuram">Malappuram</option>
		<option value="kozhikode">Kozhikode</option>
		<option value="vayanad">Vayanad</option>
		<option value="kannur">Kannur</option>
		<option value="kasargode">Kasargode</option></select>
	</th>
</tr>
<tr>
	<th> Centre Name</th>
	<th><select class="form-control" name="center" id="centre-list" required>
	    <option value="">--Select Centre--</option>
	</select>
	</th>
</tr>
<tr>
	<th> Date of Appointment</th>
	<th><input class="form-control" name='datepicker' type="date" id='datepicker' onchange="checkDOB();">
	</th>
</tr>
<tr>
<th colspan="4" align="center">
<div class="row mt-4">
<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Submit</a></button>
	</div>
</div>
</th>
</tr>
</table>
</form>

<?php 
include 'footer.html';
?>
</body>
</html>