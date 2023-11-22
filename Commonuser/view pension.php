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
		<li class="breadcrumb-item active" aria-current="page">View Pension Details</li>
	</ol>
</div>
<div class="container">
<?php 
$r=mysql_query("select * from tb_pension") or die(mysql_error());
while ($row=mysql_fetch_assoc($r)) {
	

?>
	<div class="card col-md-4" style="display: inline-flex;">
  <div class="card-body">
  	Pensin Type : <?php echo $row["type_of_pension"]; ?><br>
  	Description : <?php echo $row["description"]; ?><br>
  	Website Link : <a href="<?php echo $row['link'] ?>" target="_blank">Click to view</a><br>
  	Posted Date : <?php echo $row["date"]; ?><br>
  	
  	
  </div>
</div>

<?php
}

?>
</div>


<?php
include 'footer.html';
?>