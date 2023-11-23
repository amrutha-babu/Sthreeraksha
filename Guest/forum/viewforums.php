<?php
include 'header.php';
include '../db.php';
$result = mysql_query("select * from forum",$con);

echo "<div class='row'><div class='col-md-offset-3'>";
while($row=mysql_fetch_assoc($result))
 {
	  $id=$row['id'];
	  $fname=$row['name'];
	  $type=$row['type'];
	  $head=$row['head'];
	  
	  ?>
	  <div class="col-md-3">
        <div class="img-thumbnail">
		    <div class="text-center">
			   <h6><?php echo $fname; ?></h6>
			</div>
			<img src="images/banner.jpg" width="200" height="300" class="img-responsive">
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