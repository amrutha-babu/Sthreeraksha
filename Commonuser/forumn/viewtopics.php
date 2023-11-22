<?php
include 'header.html';

include '../db1.php';
?>
<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="../index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page"> View Topics</li>
	</ol>
</div>
<!-- //page details -->
<?php

$fid=$_GET['id'];
$result = mysql_query("select * from discussion where forumid='$fid'",$con);

echo "<div class='row'><div class='col-md-offset-3'><a href='discussion.php?id=".$fid."' class='btn btn-primary'>Create a new topic</a>";
?>

	<table>
	<tr>
<?php
while($row=mysql_fetch_assoc($result))
 {
	  $id=$row['id'];
	  $topic=$row['topic'];
	  $date=$row['date'];
	  $uname=$row['uname'];
	  
	  ?>
	  	<td>
	  <div>
        <div class="img-thumbnail">
		    <div class="text-center">
			   <h6><?php echo $topic; ?></h6>
			</div>
			<img src="images/banner.jpg" width="200" height="300" class="img-responsive">
			<div class="text-center">
			   <h6>Posted by: <?php echo $uname; ?></h6>
			   <h6>date: <?php echo $date; ?></h6>
			  <a href="<?php echo "comments.php?id=".$id; ?>" class="btn btn-primary">Enter discussion</a></div>
			</div>  
			</div>	


	</td>
	

	  
	  <?php
	  
 }	

?>
</tr></table>
</div>
</div>

<?php
include 'footer.html';
?>