<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>

<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_consortium_members where member_id='$id'",$con);
while($row=mysql_fetch_assoc($re))
{
$log=$row['log_id'];
$a=$row['consortium_id'];
$c=$row['member_name'];
$d=$row['member_type'];
$e=$row['member_phone'];
$f=$row['member_email'];
$g=$row['photo'];
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
<td><label><b> Consortium  Id  </b></label></td>
<td><input disabled type="Text" class="form-control" name="cid" value="<?php echo "$a"; ?>"></td>
</tr>
<tr>
<td><label><b>Member Name       </b></label></td>
<td><input maxlength="20" required type="Text" class="form-control" disabled value="<?php echo "$c"; ?>" name="name"></td>
</tr>
<tr>
<td><label><b> Member Type  </b></label></td>
<td><input maxlength="20" required type="Text" class="form-control" disabled value="<?php echo "$d"; ?>" name="mtype"></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input required type="Text" maxlength="10" pattern="[7-9]{1}[0-9]{9}" value="<?php echo "$e"; ?>" class="form-control" disabled name="mobno"></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input required type="Text" maxlength="30" class="form-control" disabled value="<?php echo "$f"; ?>" name="email"><br></td>
</tr>
<tr>
<td><label><b>Photo   </b></label></td>
<td><input disabled required value="<?php echo "$g"; ?>" type="text" class="form-control" name="pho"></td>
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
