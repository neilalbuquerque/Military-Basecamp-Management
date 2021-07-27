<?php
$dbhandle = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($dbhandle, "assignment") or die("No Database connected!");
?>