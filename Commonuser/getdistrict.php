	<?php
session_start();

include 'db1.php';
		$dist=$_GET["district"];
		
		$res=mysql_query("select * from tb_ccenter where district='$dist' and status='1'",$con);
		print_r($res);
		?>
		<?php
		while($row=mysql_fetch_assoc($res))
		{
			$name=$row['center_name'];
		?>
		<option value= "<?php echo $name; ?>"><?php echo $name; ?></option>

		<?php
		}
		?>