<?php
session_start();
include 'db1.php';
include 'header.html';
if (isset($_POST["change"])) {
	mysql_query("update tb_complaint set status='".$_POST["status"]."' where comp_id='".$_POST["comp_id"]."'") or die(mysql_error());
}
?>
<form action="" method="post">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Appointments</li>
	</ol>
</div>
	<table align="center" border="2"  >

		<tr>
			<td>
				Name
			</td>
			<td>
				Phone Number
			</td>
			<td>
				Address
			</td>
			<td>
				Complaint Type
			</td>
			<td>
				Subject
			</td>
			<td>
				Complaint Details
			</td>
			<td>
				Date
			</td>
			<td>
				Status
			</td>
			<td>
				Document
			</td>
			<td>
				Forwarded Details
			</td>
			<td>
				Change Status
			</td>
		</tr>
		
		<?php
		$r=mysql_query("select tb_complaint.status,comp_id, comp_type,comp_subject,comp_details,tb_complaint.date,doc_upload,user_name,mobile_no,place,district,house_name,pin from tb_complaint,tb_user,tb_consortium where tb_complaint.user_id=tb_user.user_id and tb_user.district=tb_consortium.consortium_district and tb_consortium.consortium_id='".$_SESSION["user_id"]."' and tb_complaint.status!='Solved'",$con) or die(mysql_error());
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
				<a href="forwardeddetails.php?id=<?php echo $row["comp_id"] ?>">View</a>
			</td>
			<td>
				<input type="hidden" value="<?php echo $row["comp_id"] ?>" name="comp_id">
				<select name="status">
					<option >--select--</option>
					
					<option value="Solved">Solved</option>
					<option value="Rejected">Rejected</option>
				</select>
				<input type="submit" name="change" value="Change">
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