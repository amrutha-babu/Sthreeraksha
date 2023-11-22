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
	
<!-- //header -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint follow ups</li>
	</ol>
</div>
<br>
<br>
<div class="row">
 <div class="col-md-2"></div>
  <div class="col-md-6">
<?php
$uid= $_SESSION['user_id'];
$result = mysql_query("select tb_followup.*,tb_complaint.* from tb_followup,tb_complaint where tb_followup.comp_id=tb_complaint.comp_id and tb_complaint.user_id = '$uid'",$con);
if(mysql_num_rows($result)>0)
	{
 while($row=mysql_fetch_assoc($result))
		{
?>
	<div class="card col-md-6">
  	<div class="card-body">
  	<b>Complaint Subject : </b><?php echo $row["comp_subject"]; ?><br>
  	<b>Complaint Type : </b><?php echo $row["comp_type"]; ?><br>
  	<b>Complaint Details : </b><?php echo $row["comp_details"]; ?><br>
  	<b>Date : </b><?php echo $row["date"]; ?><br>
  	<b>Current Status : </b><?php echo $row["curr_status"]; ?><br>
  	<b>Follow Up Details : </b><?php echo $row["details"]; ?><br>
  	<b>Verdict : </b><?php echo $row["verdict"]; ?><br> 	
  	</div>
	</div>
	<?php 
		}
	}
	else
	{
		echo "No Follow Ups";
	}
  	?>
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