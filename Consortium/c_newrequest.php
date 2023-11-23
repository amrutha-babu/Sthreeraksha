<?php
session_start();
include 'header.html';
include 'db1.php';
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $date->format('H:m:s');
?>
<table>
<tr>
<th>Name</th>
<th>Name</th>
</tr>