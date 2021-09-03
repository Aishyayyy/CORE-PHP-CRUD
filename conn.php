<?php
$con=mysqli_connect('localhost','root');
$new=mysqli_select_db($con,'CRUDapplication');
if($new);
echo "connected";
?>