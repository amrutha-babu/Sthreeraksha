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
		<li class="breadcrumb-item active" aria-current="page">View Hostel Details</li>
	</ol>
</div>
<div class="container">
<?php 
$r=mysql_query("select * from tb_hostel where status=1") or die(mysql_error());
while ($row=mysql_fetch_assoc($r)) {
	

?>
	<div class="card col-md-4" style="display: inline-flex;">
  <div class="card-body">
  	<img src="../hostel/Photos/<?php echo $row["picture"] ?>" width="300px" height="300px">
  	Name : <?php echo $row["hostel_name"]; ?><br>
  	District : <?php echo $row["district"]; ?><br>
  	Place : <?php echo $row["place"]; ?><br>
  	Pin Code : <?php echo $row["pin"]; ?><br>
  	Warden : <?php echo $row["warden"]; ?><br>
  	Mobile Number :  <?php echo $row["mobile_no"]; ?><br>
  </div>
</div>

<?php
}

?>
</div>


<?php
include 'footer.html';
?>