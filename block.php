<!DOCTYPE html>
<?php include 'details.php' ?>
<html>

<head>
    <title>User account</title> 

    <style>

        *{
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background-image: url("background_image1.jpg");
            background-size: cover;
            color: black;
        }

        #user_d{
            margin-top: 80px;
            border: 3px solid black;
            background-color: #6f9fc1;
            margin-left: 38%;
            margin-right: 38%;
            padding: 12px 25px;
            font-size: 40px;
        }

        .main-content1{
            display: flex;
            justify-content: space-evenly;
            margin-top: 60px;
        }

        .main-content{
            display: flex;
            justify-content: space-evenly;
            margin-top: 60px;
        }

        h1{
            border: 3px solid black;
            padding: 12px 25px;
            background-color: #6f9fc1;
        }

        img{
            height: 400px;
            width: 400px;
        }

    </style>

</head>

<body align="center">

    <h1 id="user_d">USER DETAILS</h1>    
    <?php 
    $sqlos = "SELECT * FROM hospital WHERE email='$email'";
    $result = mysqli_query($conn, $sqlos);
    $displayed = false;

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                if (!$displayed) {
                    echo "<h2>Name: " . $rows["name"] . "</h2>
                        <h2>Email: " . $rows["email"] . "</h2>";
                    $displayed = true; // Set the flag to true after displaying the information
                }
            }
        }
        ?>


    <div class="main">
    
        <div class="main-content1">
            <h1>BlockChain</h1>
            <h1>Access & manage</h1>
        </div>

        <div class="main-content">
            <a href=/login.php ><img src="https://www.orientsoftware.com/Themes/OrientSoftwareTheme/Content/Images/blog/2021-11-17/blockchain.jpg" width="460" height="460"></a> 
            
            <a href=/login.php><img class="em" src="https://learn.g2.com/hubfs/Data%20exchange.png" width="450" height="40%"/></a>

        </div>

    </div>
        
           
</body>
</html>