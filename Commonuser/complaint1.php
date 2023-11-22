<html>
<head>
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
<form action="" method="post"enctype="multipart/form-data" name="form5" id="form5">

<?php
$uid=$_SESSION['user_id'];
$var=mysql_query("select * from tb_user where user_id='$uid'",$con);
//echo "select * from tb_user where user_id='$uid'";
while($row=mysql_fetch_assoc($var))
{
	$uname=$row['user_name'];
	$dist=$row['district'];
}
if(isset($_POST['submit']))
{
	$comph=$_POST['comph'];
	$comp=$_POST['comp'];
	$type=$_POST['type'];
	$against=$_POST['against'];
	$dist=$_POST['dist'];
	$idate=$_POST['idate'];
	date_default_timezone_set("Asia/Kolkata");
	$date=date("d-m-Y") ;
	$result=mysql_query("insert into tb_complaint (user_id,comp_subject,comp_details,comp_type,against,district,i_date,date) 
	values('$uid','$comph','$comp','$type','$against','$dist','$idate','$date')",$con);
	echo "insert into tb_complaint (user_id,comp_subject,comp_details,comp_type,against,district,i_date,date) 
	values('$uid','$comph','$comp','$type','$against','$dist','$idate','$date')";
	if(isset($result))
	{
			echo "<Script>javascript:alert('Complaint registered successfully')</Script>";
	}
}
?>

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint Registration</li>
	</ol>
</div>
<br>
<table align="center" cellpadding="10">
	<tr><th colspan="2"><h2 align="center">Complaint Registration</h2></th></tr>
<form method="post" class="register-wthree">
<tr>
	<th><input class="form-control" type="text" name="comph" required="required" placeholder="Complaint Header" required /></th>
</tr>
<tr>
	<th> <select name="type" class="form-control" placeholder="Type" >
        <option value="option 1">---Select Type---</option>
		<option value="Acid Attack">Acid Attack</option>
		<option value="Cyber crime against women">Cyber crime against women</option>
		<option value="Dowry death">Dowry death</option>
		<option value="Denial of maternity benefits">Denial of maternity benefits</option>
		<option value="Free legal aids for women">Free legal aids for women</option>
		<option value="Gender discrimination">Gender discrimination</option>
		<option value="Dowry harrassment">Dowry harrassment</option>
		<option value="Indecent representation of women">Indecent representation of women</option>
		<option value="Rape/attempt to rape">Rape/attempt to rape</option>
		<option value="Right to live with dignity">Right to live with dignity</option>
		<option value="Sex selective abortion">Sex selective abortion</option>
		<option value="Sexual assault">Sexual assault</option>
		<option value="Sexual harrassment">Sexual harrassment</option>
		<option value="Stalking">Stalking</option>
		<option value="Traditional practices">Traditional practices(sati, devdasi)</option>
		<option value="Prostitution of women">Prostitution of women</option>
		<option value="Police apathy against women">Police apathy against women</option>
		<option value="Right to exercise choice in marriage">Right to exercise choice in marriage</option>
		<option value="Womens right of custody of children">Womens right of custody of children</option>
		<option value="other">Others</option></select></th>
</tr>
<tr>
	<th><input class="form-control" type="date" name="idate" placeholder="Date of Incident" required/></th>
</tr>
<tr>
	<th> <textarea class="form-control" name="comp" cols="20" rows="5" required="required" placeholder="Description"required></textarea></th>
</tr>
<tr>
	<th> <input class="form-control" type="text" name="against" placeholder="Against whom"required/></th>
</tr>
<tr>
	<th><select name="dist" class="form-control"required >
		<option value="<?php echo "$dist" ?>"selected><?php echo "$dist" ?></option>
        <option value="option 1">---Select District---</option>
		<option value="trivandrum">Trivandrum</option>
		<option value="kollam">Kollam</option>
		<option value="pathanamthitta">Pathanamthitta</option>
		<option value="alappuzha">Alappuzha</option>
		<option value="kottayam">Kottayam</option>
		<option value="idukki">Idukki</option>
		<option value="kochi">Ernakulam</option>
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
	<td><input type="file" class="form-control" name="file"></td>
</tr>

<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-6">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-6">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">cancel</a></button>
	</div>
</div>
</th></tr>
</form>
</table>
<?php 
include 'footer.html';
?>
</body>
</html>
