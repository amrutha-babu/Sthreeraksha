<?php 
session_start();
include 'db1.php';
include 'header.html';

?>
<form method="post" enctype="multipart/form-data">
	<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Job Details</li>
	</ol>
</div>
<div class="container">
<?php 
$r=mysql_query("select * from tb_joboffer") or die(mysql_error());
while ($row=mysql_fetch_assoc($r)) {
	

?>
	<div class="card col-md-4" style="display: inline-flex;">
  <div class="card-body">
  	Job Title : <?php echo $row['job_title']; ?><br>
  	Application Start Date : <?php echo $row['application_sdate']; ?><br>
	Application End Date : <?php echo $row['application_edate']; ?><br>
  	Website Link : <a href="<?php echo $row['link'] ?>" target="_blank">Click to view</a><br>
  	Posted Date : <?php echo $row['date']; ?><br>
  	
  	
  </div>
</div>

<?php
}

?>
</div>
<!-- map -->
<div class="w3l-map p-2">
	<iframe src="D:\Main Project\Sthree raksha\images\banner3.jpg"></iframe>
</div>
<!-- //map -->


<?php
include 'footer.html';
?>