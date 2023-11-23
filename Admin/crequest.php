<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<body>
<br>
<br>
<br>
 <table align="center" border="2" width="50%">
 <tr>
 <br>
 <br>
 <br>
 <th>Center Name</th>
 <th>District</th>
 <th>Place</th>
 <th>Pin</th>
 <th>Phone No</th>
 <th>Email Id</th>
 <th>Doc Upload</th>
 <th>Date</th>
 </tr>
 <?php
 $a=mysql_query("select * from tb_ccenter where status=0",$con);
 while($row=mysql_fetch_assoc($a))
 {
 $name=$row['center_name'];
 $dis=$row['district'];
 $place=$row['place'];
 $pin=$row['pin'];
 $pno=$row['phone_no'];
 $eid=$row['email_id'];
 $doc=$row['doc_upload'];
 $date=$row['date'];
 echo "<tr><td>".$name."</td><td>".$dis."</td><td>".$place."</td><td>".$pin."</td><td>".$pno."</td>
 <td>".$eid."</td><td><img src=/Images/".$doc." width=100 height=100></td><td>".$date."</td><td><a href=crequest.php>Approve</a></td>></tr>";
 }
 
 
 ?>
 </table>
</body>
<?php
include 'footer.html';
?>
</html>

