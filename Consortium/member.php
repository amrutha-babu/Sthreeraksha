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
 <th>Consortium Name</th>
 <th>Consortium District</th>
 <th>Consortium Head</th>
 <th>Consortium Head Phone</th>
 <th>Consortium Head Email</th>
 <th>Photo</th>
 <th>Proof Upload</th>
 </tr>
 <?php
 $a=mysql_query("select * from Consortium where status=0",$con);
 while($row=mysql_fetch_assoc($a))
 {
 $name=$row['center_name'];
 $dis=$row['district'];
 $place=$row['place'];
 $pno=$row['phone_no'];
 $eid=$row['email_id'];
 $doc=$row['doc_upload'];
 $date=$row['date'];
 echo "<tr><td>".$name."</td><td>".$dis."</td><td>".$place."</td><td>".$pno."</td><td>".$eid."</td><td>".$doc."</td><td>".$date."</td></tr>";
 }
 
 
 ?>
 </table>
</body>
</html>

