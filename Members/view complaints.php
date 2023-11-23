<?php
include 'db1.php';
include 'header.html';
session_start();

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
				Document
			</td>
			<td>
				Forwarded Details
			</td>
		</tr>
		</tr>
		<?php
		$r=mysql_query("select tb_complaint.comp_id,comp_type,comp_subject,comp_details,tb_complaint.date,doc_upload,user_name,mobile_no,place,district,house_name,pin from tb_complaint,tb_user,tb_consortium,tb_consortium_members where tb_complaint.user_id=tb_user.user_id and tb_user.district=tb_consortium.consortium_district and tb_consortium.consortium_id=tb_consortium_members.	
consortium_id and tb_consortium_members.member_id='".$_SESSION["user_id"]."'",$con) or die(mysql_error());
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
				<a href="forwardeddetails.php?id=<?php echo $row["comp_id"] ?>">View</a>
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