<?php
session_start();
include '../db1.php';
include 'header.html';
$uid=$_SESSION["user_id"];
$res=mysql_query("select * from tb_consortium where consortium_id='$uid'",$con);
while ($row=mysql_fetch_assoc($res)) 
{
	$uname=$row['consortium_head'];
}
$result = mysql_query("select * from forum",$con);

echo "<div class='row'><div class='col-md-offset-3'>";
while($row=mysql_fetch_assoc($result))
 {
	  $id=$row['id'];
	  $type=$row['type'];
	  $head=$row['head'];
	  
	  ?>
	  <div class="col-md-9">
        <div class="img-thumbnail">
		    <div class="text-center">
			   <h3><?php echo $uname; ?></h3>
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