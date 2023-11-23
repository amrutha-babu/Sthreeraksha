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
		<li class="breadcrumb-item active" aria-current="page">Assign Details</li>
	</ol>
</div>
	<table align="center" border="2"  >

		<tr>
			<th>
				Police Name
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
		$r=mysql_query("select police_name,designation,progress,doc_upload from tb_assign,tb_police where tb_assign.complaint_id='".$_GET["id"]."' and tb_police.police_id=tb_assign.police_id",$con) or die(mysql_error());
		while ($row=mysql_fetch_assoc($r)) {
			
		
		?>
		<tr>
			<td>
				<?php echo $row["police_name"]; ?>
			</td>
			<td>
				<?php echo $row["designation"]; ?>
			</td>
			<td>
				<?php echo $row["doc_upload"] ?>
			</td>
			<td>
				<?php echo $row["progress"] ?>
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