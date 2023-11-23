<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<head>
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
        return true;
    }
</script>
<script type="text/javascript">
    function checkDOBS() {
        var dateString = document.getElementById('datepickers').value;
        var myDate = new Date(dateString);
        var today = new Date();
        var todayIs =today.getTime();
        if ( myDate.getTime() < todayIs ) { 
            alert("Please select a valid date");
            document.getElementById('datepickers').value="";
             return false;
        }
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
		<li class="breadcrumb-item active" aria-current="page">New Job Registration</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form7" id="form7">
<?php
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$no=$_POST['post'];
	$qual=$_POST['qual'];
	$exp=$_POST['exp'];
	$sal=$_POST['sal'];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	$age=$_POST['age'];
	$link=$_POST['link'];
	date_default_timezone_set("Asia/Kolkata");
	$date=date("d-m-Y") ;
	$res=mysql_query("insert into tb_joboffer (job_title,date,no_of_post,qualification,experience,salary,application_sdate,application_edate,link,age_limit)values ('$title','$date','$no','$qual','$exp','$sal','$sdate','$edate','$link','$age')",$con);
	echo "<script> alert('Inserted Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/jdetails.php'</script>";
}
?>

<h2 align="center">New Job Registration</h2>
<br>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Job Title       </b></label></td>
<td><input class="form-control" type="Text" name="title" required></td>
</tr>
<tr>
<td><label><b>Number of post      </b></label></td>
<td><input class="form-control" type="Text" name="post" required></td>
</tr>
<tr>
<td><label><b>Qualification       </b></label></td>
<td><input class="form-control" type="Text" name="qual" required></td>
</tr>
<tr>
<td><label><b>Experiance     <br></b></label></td>
<td><input class="form-control" type="Text" name="exp" required></td>
</tr>
<tr>
<td><label><b>Salary     <br></b></label></td>
<td><input class="form-control" type="Text" name="sal" required></td>
</tr>
<tr>
<td><label><b>Application Starting Date     </b></label></td>
<td><input class="form-control" type="date" name="sdate" id='datepicker' onchange="checkDOB();" required></td>
</tr>
<tr>
<td><label><b>Application Ending Date</b></label></td>
<td><input class="form-control" type="date" name="edate" id='datepickers' onchange="checkDOBS();" required></td>
</tr>
<tr>
<td><label><b>Age Limit     <br></b></label></td>
<td><input class="form-control" type="Text" name="age" required></td>
</tr>
<tr>
<td><label><b>Link     <br></b></label></td>
<td><input class="form-control" type="Text" name="link" required></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-2">
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-4">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/jdetails.php'">cancel</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
</form>
</body>
<?php 
include 'footer.html';
?>
</html>