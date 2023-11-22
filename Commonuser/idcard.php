<?php
session_start();
include 'db1.php';
include 'header.html';
$uid=$_SESSION['user_id'];
$result = mysql_query("select * from tb_user where user_id='$uid'",$con);
$row=mysql_fetch_assoc($result);
$a=$row['user_name'];
$b=$row['date_of_birth'];
$c=$row['district'];
$d=$row['place'];
$e=$row['house_name'];
$f=$row['pin'];
$g=$row['aadhar_no'];
$h=$row['mobile_no'];
$i=$row['email_id'];
$date = date("d-m-Y");
?>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>USER ID CARD</title>
<body>
	<br>
<section class="texture-section texture1">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
     
        <table class="table">
        	<tr>
                <td>User ID</td>
                <td><?php echo $uid;?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $a;?></td>
            </tr>
            <tr>
                <td colspan="2">*** This is to certify that the following information has been taken from the submitted data***</td>
                
            </tr>
            <tr>
                <td>House Name</td>
                <td><?php echo $e;?></td>
            </tr>
            <tr>
			    <td>Place</td>
                <td><?php echo $d;?></td>
            </tr>
            <tr>
			    <td>District</td>
                <td><?php echo $c;?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $b;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $i;?></td>
            </tr>
            <tr>
                <td>Contact no</td>
                <td><?php echo $h;?></td>
            </tr>
            <tr>
                <td>Issue Date</td>
                <td><?php echo $date;?></td>
            </tr>
        </table>       

        <?php
            include "lib/qrcode/qrlib.php";
            $qrimg = 'idcard/'.$a.'.jpg';
            $msg="ID Card issued by Admin for ".$a."";
            QRcode::png($msg,$qrimg , 'R', 4, 4);

        ?> 
        <img src="<?php echo $qrimg;?>">
</div>
<a href="index.html" class="list-group-item">Return</a>
</div>
</div>
</section>
<br>
</body>
</html>

<?php
include 'footer.html';
?>
<script>
    print();
</script>