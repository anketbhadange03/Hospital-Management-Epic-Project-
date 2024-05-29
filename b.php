<!DOCTYPE html>
<?php include 'details.php' ?>
<html>

<head>
<title>User account</title>
<style>
    
td,th{text-align:center; border:1px solid black;padding:10px;border-collapse:separate;}
.no,.nop{border:0px;border-collapse:separate;}

</style>
</head>

<body>
    
<div id=hori style="width:10%; height:600px; padding:0.5%; float:left; background-color: rgb(255,69,0);">
 
</div> 

   
    
    <h1 align='center'>USER DETAILS</h1>    
    <?php 
    $i=0;
    if($result->num_rows>0){while($rows=$result->fetch_assoc())
    {echo"<h2>Name: ". $rows["name"] . "</h2>
        <h2>Email: ". $rows["email"] ."</h2>";}
        }?>
     
    
    <hr>
    <h1 align='center'>BOOKING DETAILS</h1>
    <table align="center">

    <tr> <th>name</th> <th>email</th><th>station</th><th>Train</th><th>Mobile no.</th><th>coach</th><th>seat</th><th>bags</th>
    <?php 
    $sql ="SELECT * FROM books WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    
    $i=0;
    if($result->num_rows>0){while($rows=$result->fetch_assoc())
    {echo"<tr>
           
           <td> ". $rows["name"] . "</td>
           <td> ". $rows["email"] ."</td>
           <td> ". $rows["station"] . "</td>
           <td> ". $rows["train"] ."</td>
           <td> ". $rows["phone"] . "</td>
           <td> ". $rows["coach"] ."</td>
           <td> ". $rows["seat"] ."</td>
           <td> ". $rows["bags"] ."</td>
       
        </tr>";}}?>


<?php 
    $sql ="SELECT * FROM `coolie` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    
    $i=0;
    if($result->num_rows>0){while($rows=$result->fetch_assoc())
    {echo"<tr>
           
           <td> ". $rows["name"] . "</td>
           <td> ". $rows["email"] ."</td>
           <td> ". $rows["station"] . "</td>
           <td> ". $rows["train"] ."</td>
           <td> ". $rows["phone"] . "</td>
           <td> ". $rows["coach"] ."</td>
           <td> ". $rows["seat"] ."</td>
           <td> ". $rows["bags"] ."</td>
       
        
        </tr>";}}?>
    </table>
    </body>




</html>