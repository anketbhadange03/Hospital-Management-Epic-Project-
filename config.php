<?php
$server='localhost';
$username='root';
$password='';
$database='user';
$conn=mysqli_connect($server,$username,$password,$database);


 


if(isset($_POST['register'] ))
{$email=$_POST['email'];
 $password=$_POST['password'];
 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $station=$_POST['station'];
 $user=$_POST['remember'];
 $license=$_POST['license'];
 $values = [];
 if (isset($_POST['remember']) && !empty($_POST['remember'])) {
    $values = $_POST['remember'];}

 foreach($values as $i){
 if($i==="healthcare"){
 
 $sql="INSERT INTO `coolie`(`email`, `password`,`name`,`phone`,`profession`,`registration`) VALUES ('$email','$password','$name','$phone','$station','$license');";
 
 mysqli_query($conn,$sql); }


elseif($i==="user")
{$sql="INSERT INTO `users`(`email`, `password`,`name`) VALUES ('$email','$password','$name');";
 mysqli_query($conn,$sql);}

else
    {$sql="INSERT INTO `hospital`(`email`,`name`,`password`,`phone`,`registration`) VALUES ('$email','$name','$password','$phone','$license');";
    mysqli_query($conn,$sql);}

   
   header("location:login.php");
   
   }}
  

session_start();
if(isset($_POST['login']))
{$email=$_POST['email'];
 $password=$_POST['password'];
 
 
 $sql = "SELECT * FROM `users`WHERE `email`='$email'AND`password`='$password'";
 
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  if(mysqli_num_rows($result)==1){  $_SESSION['email'] = $email; header("location:user.php");
   }
   $sqlt = "SELECT * FROM `coolie`WHERE `email`='$email'AND`password`='$password'";
 
   $results=mysqli_query($conn,$sqlt);
   $row=mysqli_fetch_array($results,MYSQLI_ASSOC);
   if(mysqli_num_rows($results)==1){ $_SESSION['email'] = $email; header("location:health.php");
    }
     
    $sqlp = "SELECT * FROM `hospital`WHERE `email`='$email'AND`password`='$password'";
 
  $resulte=mysqli_query($conn,$sqlp);
  $row=mysqli_fetch_array($resulte,MYSQLI_ASSOC);
  if(mysqli_num_rows($resulte)==1){  $_SESSION['email'] = $email; header("location:block.php");
   }
  mysqli_close($conn);}
  
 
  
   ?>














