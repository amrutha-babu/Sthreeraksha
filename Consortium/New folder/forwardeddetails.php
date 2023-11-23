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
		<li class="breadcrumb-item active" aria-current="page">Forwarded Details</li>
	</ol>
</div>
	<table align="center" border="2"  >

		<tr>
			<th>
				Station
			</th>
			<th>
				Response
			</th>
			<th>
				Document
			</th>
			<th>
				Response Time
			</th>
			
		</tr>
		<?php
		$r=mysql_query("select district,place,response,doc_upload,response_datetime from tb_forwardcomplaint,tb_police_station where comp_id='".$_GET["id"]."' and tb_police_station.station_id=tb_forwardcomplaint.station_id",$con) or die(mysql_error());
		while ($row=mysql_fetch_assoc($r)) {
			
		
		?>
		<tr>
			<td>
				<?php echo $row["place"].",".$row["district"]; ?>
			</td>
			<td>
				<?php echo $row["response"]; ?>
			</td>
			<td>
				<a href="../uploads/<?php echo $row["doc_upload"] ?>" target="_blank">View</a>
				
			</td>
			<td>
				<?php echo $row["response_datetime"] ?>
			</td>
			
			
			
		</tr>
		<?php
}
		?>
	</table>
</form>
<?php

include 'footer.html';
?>