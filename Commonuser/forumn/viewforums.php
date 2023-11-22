
<?php
session_start();
include '../db1.php';
include 'header.html';
?>
 <!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="../index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page"> View Forums</li>
	</ol>
</div>
<!-- //page details -->
<?php
$result = mysql_query("select * from forum",$con);

echo "<div class='row'><div class='col-md-offset-3'>";
while($row=mysql_fetch_assoc($result))
 {
	  $id=$row['id'];
	  $fname=$row['name'];
	  $type=$row['type'];
	  $head=$row['head'];
	  
	  ?>

	  <div class="col-md-10">
        <div class="img-thumbnail">
		    <div class="text-center">
			   <h3><?php echo $fname; ?></h3>
			</div>
			<img src="images/abc.jpg" width="200" height="300" class="img-responsive">
			<div class="text-center">
			   <h6>Catagory: <?php echo $type; ?></h6>
			   <h6>Organizer: <?php echo $head; ?></h6>
			  <a href="<?php echo "viewtopics.php?id=".$id; ?>" class="btn btn-primary">Enter to Forum</a></div>
			</div>  
			</div>	
	

	  
	  <?php
	  
 }

?>
</div>
</div>
<?php
include 'footer.html';
?>	