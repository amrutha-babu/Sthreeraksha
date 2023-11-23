<?php
session_start();
include 'header.php';

include '../db.php';

$tid=$_GET['id'];


?>

<?php
  if(isset($_POST['comment']))
  {
	  
    $uname="ddd";
	$tid=$_GET['id'];
	$comp=$_POST['commenttxt'];
	$date=Date("d-m-y");
	$result=mysql_query("insert into comments values('','$tid','$uname','$comp','$date')",$con);
	   echo "<Script>javascript:alert('Complaint registered successfully')</Script>";
	   
 }
		?>
		
		
		<div class='row'><div class='col-md-8 col-md-offset-3'>
<form method="post">
<textarea class="form-control" name="commenttxt" placeholder="Enter your comment"></textarea>
<br>
<div class="pull-right">
<input type="submit" name="comment" class="btn btn-primary" value="Comment" />
</div>
</form>
<br>Recent Discussions<br>
<br><br>
<?php

  $result = mysql_query("select * from comments where tid='$tid' order by id desc",$con);
while($row=mysql_fetch_assoc($result))
 {
	  $id=$row['id'];
	  $com=$row['comment'];
	  $date=$row['dat'];
	  $uname=$row['uname'];	 
 

?>		


<div class="">
	  <div class="col-md-12">
	 <div class="thumbnail">
       <div class="bg-info">
	   
	    
		<div class="container">
		<div class="row">
		    <div class="pull-left">
			   <h4 class="text-primary"><?php echo $uname; ?>:  </h4>
			  <p class="text-muted"><i>Commented on :<?php echo $date; ?></i><p>
			</div>
			<div class="">
			
			</div>
             </div>
			<div class="row"> 
			
			
			<div class="">
			  <h5> &nbsp;&nbsp;&nbsp; "<?php echo $com; ?> "</h5>
			  
			 			</div>  
			</div>
			</div>
			</div>
</div></div></div>

<br><br>
<?php


 }
 ?>
 </div>
 </div>