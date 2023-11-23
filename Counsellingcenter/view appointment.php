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
		<li class="breadcrumb-item active" aria-current="page">View Appointments</li>
	</ol>
</div>
	<table align="center" border="2" cellpadding="20" >

		<tr>
			<td>
				Name
			</td>
			<td>
				Phone Number
			</td>
			<td>
				Date
			</td>
			<td>
				Time
			</td>
			<td>
				Appointment Type
			</td>
			<td>
				Apporve/Reject
			</td>
		</tr>
		<?php
		$r=mysql_query("select app_id,tb_appointment.date,time,app_type,user_name,mobile_no from tb_appointment,tb_user where tb_appointment.user_id=tb_user.user_id and center_id='".$_SESSION["user_id"]."' and tb_appointment.status='0'",$con) or die(mysql_error());
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
				<?php echo $row["date"] ?>
			</td>
			<td>
				<?php echo $row["time"];  ?>
			</td>
			<td>
				<?php echo $row["app_type"]; ?>
			</td>
			<td>
				<a href="app_verify.php?app_id=<?php echo $row["app_id"] ?>&type=approve">Approve</a>/
				<a href="app_verify.php?app_id=<?php echo $row["app_id"] ?>&type=reject">Reject</a>
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