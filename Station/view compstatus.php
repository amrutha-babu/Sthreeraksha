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
		<li class="breadcrumb-item active" aria-current="page">Complaint Status</li>
	</ol>
</div>
	<table align="center" border="2"  >

		<tr>
			<th>
				Name
			</th>
			<th>
				Phone Number
			</th>
			<th>
				Address
			</td>
			<th>
				Complaint Type
			</th>
			<th>
				Subject
			</th>
			<th>
				Complaint Details
			</th>
			<th>
				Date
			</th>
			<th>
				Status
			</th>
			<th>
				Document
			</th>
			<th>
				Assign Details
			</th>
		</tr>
		
		<?php
		$sid=$_SESSION["user_id"];
		$r=mysql_query("select tb_forwardcomplaint.comp_id,comp_type,comp_subject,comp_details,date,tb_complaint.doc_upload,tb_complaint.status,user_name,mobile_no,place,district,house_name,pin from tb_complaint,tb_user,tb_forwardcomplaint where tb_complaint.user_id=tb_user.user_id and tb_complaint.comp_id=tb_forwardcomplaint.comp_id and tb_forwardcomplaint.station_id='".$_SESSION["user_id"]."' and tb_complaint.status!='Solved'",$con) or die(mysql_error());
		while ($row=mysql_fetch_assoc($r)) {
			
		
		?>
		<tr>
			<td>
				<?php echo $row["user_name"]; ?>
			</td>
			<td>
				<?php echo $row["mobile_no"]; ?>
			</td>
			<td>
				<?php echo $row["house_name"].",".$row["place"].",".$row["district"].",".$row["pin"]; ?>
			</td>
			<td>
				<?php echo $row["comp_type"] ?>
			</td>
			<td>
				<?php echo $row["comp_subject"];  ?>
			</td>
			<td>
				<?php echo $row["comp_details"]; ?>
			</td>
			<td>
				<?php echo $row["date"]; ?>
			</td>
				<td>
				<?php echo $row["status"]; ?>
			</td>
			<td>
				<a href="../uploads/<?php echo $row["doc_upload"] ?>" target="_blank">View</a>
				
			</td>
			<td>
				<a href="assigndetails.php?id=<?php echo $row["comp_id"] ?>">View</a>
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