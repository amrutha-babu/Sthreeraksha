<?php
session_start();
include 'db1.php';
include 'header.html';


?>

<form action="" method="post">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Location/li>
	</ol>
</div>
		<?php
		$r=mysql_query("select * from tbl_inlocation",$con) or die(mysql_error());
		while ($row=mysql_fetch_assoc($r)) {
			
		
		?>
		<div class="card col-md-4" style="display: inline-flex;">
  <div class="card-body">
  	
  	Location : <?php echo $row["location"]; ?>
  </div>
</div>

		<?php
}
		?>
	</table>
</form>
<!-- map -->
<div class="w3l-map p-2">
	<iframe src="D:\Main Project\Sthree raksha\images\banner3.jpg"></iframe>
</div>
<!-- //map -->
<?php

include 'footer.html';
?>