<?php 
session_start();
include 'db1.php';
include 'header.html';
if (isset($_POST["save"])) {
	

	mysql_query("insert into tb_pension values('". date("Y-m-d") ."','".$_POST["link"]."','".$_POST["pension_type"]."','".$_POST["name"]."','".$_POST["des"]."')",$con) or die(mysql_error());
	echo "<script>alert('Saved Successfully')</script>";
	echo "<script>window.location.href='add pension.php'</script>";
}
?>
<form method="post" enctype="multipart/form-data">
	<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Pension</li>
	</ol>
</div>


	<table align="center" cellpadding="15"  >
		<tr><th><h2> Pension</h2></th></tr>
		<tr>
			<td>
				Pension Name
			</td>
			<td>
				<input type="text" class="form-control" name="name">
			</td>
			</tr>
<tr>
<td>
				Description
			</td>
			<td>
				<textarea name="des"></textarea>
			</td>
			</tr>


			<tr>
			<td>
				Website Link
			</td>
			<td>
				<input type="text" class="form-control" name="link">
			</td>
			</tr>
			<tr>
			<td>
				Pension Type
			</td>
		

			<td>
				<input type="text" class="form-control" name="pension_type">
			
			</td>
		</tr>
		
				<tr>
			<td>
				
			</td>
		

			<td>
				<input type="submit" name="save" value="Save" class="btn btn-primary btn-block">
					
			
			</td>
		</tr>
	</table>
	</form>

<?php
include 'footer.html';
?>