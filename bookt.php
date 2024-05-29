<?php 

include 'bookcon.php';
$patientID=$_SESSION['patientID'];
$sqlg ="SELECT * FROM prescriptions WHERE patient_id='$patientID'";
 $result=mysqli_query($conn,$sqlg);?>