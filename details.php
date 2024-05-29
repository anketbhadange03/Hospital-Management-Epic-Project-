<?php 

include 'config.php';
$email=$_SESSION['email'];
$sqlg ="SELECT * FROM `users` WHERE email='$email'";
 $result=mysqli_query($conn,$sqlg);
 
 ?>
 