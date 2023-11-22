<?php
session_start();
include 'header.html';

include '../db1.php';

$tid=$_GET['id'];


?>
<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="../index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page"> Discussion</li>
	</ol>
</div>
<!-- //page details -->

<?php
  if(isset($_POST['comment']))
  {
    $id=$_SESSION['user_id'];
    $res=mysql_query("select user_name from tb_user where user_id='$id'",$con);
    while ($row=mysql_fetch_assoc($res)) {
    	$uname=$row['user_name'];
    }
	$tid=$_GET['id'];
	$comp=$_POST['commenttxt'];
	$date=Date("d-m-y");
	$result=mysql_query("insert into comments values('','$tid','$uname','$comp','$date')",$con);
	   echo "<Script>javascript:alert('Your comment was added')</Script>";
	   
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
 <?php
 include 'footer.html';
 ?>