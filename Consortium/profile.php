<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>

<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
while($row=mysql_fetch_assoc($re))
{
	$log=$row['log_id'];
$b=$row['consortium_district'];
$c=$row['consortium_head'];
$d=$row['consortium_head_phone'];
$e=$row['consortium_head_email'];
$f=$row['photo'];
}
$res=mysql_query("select * from tb_login where log_id='$log'",$con);
while ($row=mysql_fetch_assoc($res))
{
	$que=$row['security_question'];
	$ans=$row['security_answer'];
}
?>
<table align="Center" width="40%" cellpadding="35">
<tr><th><h2> My Profile</h2></th></tr>
</table>
<table width="40%" align="Center" cellpadding="10">
<tr>
<td><label><b>Consortium District      <br></b></label></td>
<td><input disabled class="form-control" type="Text" value="<?php echo "$b"; ?>"></td>
</tr>
<tr>
<td><label><b>Consortium Head      <br></b></label></td>
<td><input disabled class="form-control" type="Text" value="<?php echo "$c"; ?>"></td>
</tr>
<tr>
<td><label><b>Consortium Head Phone     <br></b></label></td>
<td><input disabled class="form-control" type="Text" value="<?php echo "$d"; ?>"></td>
</tr>
<tr>
<td><label><b>Consortium Head Email      <br></b></label></td>
<td><input disabled class="form-control" type="Text" value="<?php echo "$e"; ?>"></td>
</tr>
<tr>
<td><label><b>Security Questions      <br></b></label></td>
<td><select disabled class="form-control" name="que" size="1" >
<option value="<?php if(isset($que)){echo "$que";}else{echo "--Select Questions--";} ?>" Selected><?php if(isset($que)){echo "$que";}else{echo "--Select Questions--";} ?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      <br></b></label></td>
<td><input disabled class="form-control" type="Text" name="ans" maxlength="25" value="<?php if(isset($ans)){echo "$ans";}else{echo "No Answers";} ?>"><br></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
<div class="col-md-2">
</div>
	<div class="col-md-6">
		<button align="center" type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase"><a href="edit_profile.php">Edit Profile</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
