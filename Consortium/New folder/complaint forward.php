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
		<li class="breadcrumb-item active" aria-current="page">Forward Complaint</li>
	</ol>
</div>
	<table align="center" border="2" cellpadding="4" width="100%">

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
				Escalate
			</th>
		</tr>
		<?php
		$r=mysql_query("select comp_id,comp_type,comp_subject,comp_details,tb_complaint.date,doc_upload,user_name,mobile_no,place,district,house_name,pin from tb_complaint,tb_user,tb_consortium where tb_complaint.user_id=tb_user.user_id and tb_user.district=tb_consortium.consortium_district and tb_consortium.consortium_id='".$_SESSION["user_id"]."' and tb_complaint.status='submitted'",$con) or die(mysql_error());
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
				<a href="../../uploads/<?php echo $row["doc_upload"] ?>" target="_blank">View</a>
				
			</td>
			<td>
				<input type="hidden" name="comp_id" value="<?php echo $row["comp_id"] ?>">
				<select name="police">
					<option>--select--</option>
					<?php 
						$res=mysql_query("select station_id,district,place from tb_police_station") or die(mysql_error());
						while ($row=mysql_fetch_assoc($res)) {
						$sid=$row["station_id"];
					?>
					<option value="<?php echo $row["station_id"] ?>"><?php echo $row["place"].",".$row["district"]; ?></option>
					<?php
				}?>
				</select>
				<input type="submit" name="proceed" value="Proceed">
			</td>
		</tr>
		<?php
}
?>
<?php
if (isset($_POST["proceed"])) {
	mysql_query("insert into tb_forwardcomplaint values('','".$_POST["comp_id"]."','$sid','','','')") or die(mysql_error());
	
	mysql_query("update tb_complaint set status='Forwarded' where comp_id='".$_POST["comp_id"]."'") or die(mysql_error());
	echo "<script> alert('Forwarded Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/consortium/complaint forward.php'</script>";
}
		?>
	</table>
	<br>
	<br>
</form>
<?php
include 'footer.html';
?>