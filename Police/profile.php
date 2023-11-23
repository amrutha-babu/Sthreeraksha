<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>

<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_police where police_id='$id'",$con);
while($row=mysql_fetch_assoc($re))
{
$log=$row['log_id'];
$a=$row['police_name'];
$b=$row['police_dob'];
$c=$row['designation'];
$d=$row['phone_no'];
$e=$row['email_id'];
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
<tr><th  colspan="2"><h2 align="center"> My Profile</h2></th></tr>
</table>
<table width="40%" align="Center" cellpadding="10">
	<tr>
<td><label><b>Police ID    <br></b></label></td>
<td><input disabled value="<?php echo "$id"; ?>" type="Text" class="form-control" name="pid" maxlength="30" required="" ></td>
</tr>
<tr>
<td><label><b>Police Name     <br></b></label></td>
<td><input disabled value="<?php echo "$a"; ?>" type="Text" class="form-control" name="place" maxlength="30" required="" ></td>
</tr>
<tr>
<td><label><b>Date of Birth     <br></b></label></td>
<td><input disabled value="<?php echo "$b"; ?>" type="Text" class="form-control" name="pin" maxlength="6" required="" ></td>
</tr>
<tr>
<td><label><b>Designation</b></label></td>
<td><input disabled value="<?php echo "$c"; ?>" maxlength="12" type="Text" class="form-control" name="stno" required=""></td>
</tr>
<tr>
<td><label><b>Phone Number</b></label></td>
<td><input disabled value="<?php echo "$d"; ?>" maxlength="20" type="Text" class="form-control" name="name" required=""></td>
</tr>
<tr>
<td><label><b>Email ID</b></label></td>
<td><input disabled value="<?php echo "$e"; ?>" type="Text" maxlength="10" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="phno" required=""></td>
</tr>
<tr>
<td><label><b>Photo</b></label></td>
<td><input disabled value="<?php echo "$f"; ?>" type="Text" maxlength="30" class="form-control" name="email" required=""></td>
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
<th colspan="2" align="center">
<div class="row mt-3">
<div class="col-md-2">
</div>
	<div class="col-md-6">
		<button align="center" type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase"><a href="edit_profile.php">Edit Profile</a></button>
	</div>
	</div>
	<br>
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
