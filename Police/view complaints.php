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
		<li class="breadcrumb-item active" aria-current="page">View Complaints</li>
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
			</th>
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
				Document
			</th>
			<th>
				Response
			</th>
			<th>
				FollowUps
			</th>
		
		</tr>
		</tr>
		<?php
	
		$r=mysql_query("select tb_assign.complaint_id,comp_type,comp_subject,comp_details,date,tb_complaint. doc_upload,user_name,mobile_no,tb_user.place,tb_user.district,house_name,pin from tb_complaint,tb_user,tb_police,tb_assign where tb_complaint.user_id=tb_user.user_id and tb_complaint.comp_id=tb_assign.complaint_id and tb_police.police_id='1' and tb_complaint.status!='Solved'",$con) or die(mysql_error());
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
				<a href="../uploads/<?php echo $row["doc_upload"] ?>" target="_blank">View</a>
				
			</td>
			<td>
				<a href="com response.php?comp_id=<?php echo $row["complaint_id"] ?>">Response</a>
			</td>
			<td>
				<a href="followup.php?comp_id=<?php echo $row["complaint_id"] ?>">Followup</a>
			</td>
		</tr>
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