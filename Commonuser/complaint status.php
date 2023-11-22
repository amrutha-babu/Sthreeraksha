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
		<li class="breadcrumb-item active" aria-current="page">Complaint Status</li>
	</ol>
</div>
<div class="container">
<?php 
$r=mysql_query("select * from tb_complaint where user_id='".$_SESSION["user_id"]."'") or die(mysql_error());
while ($row=mysql_fetch_assoc($r)) {
	

?>
	<div class="card col-md-4">
  <div class="card-body">
  	Complaint Subject : <?php echo $row["comp_subject"]; ?><br>
  	Complaint Type : <?php echo $row["comp_type"]; ?><br>
  	Complaint Details : <?php echo $row["comp_details"]; ?><br>
  	Complaint Date : <?php echo $row["date"]; ?><br>
  	Complaint Status : <?php echo $row["status"]; ?><br>
  	Complaint Document : <a href="<?php echo '../uploads/'.$row['doc_upload'] ?>">Click to view</a>
  </div>
</div>

<?php
}

?>
</div>


<?php
include 'footer.html';
?>