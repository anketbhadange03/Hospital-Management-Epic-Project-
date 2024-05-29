<!DOCTYPE html>
<?php include 'details.php' ?>
<html>

<head>
    <title>User account</title>

    <style>


        *{
            margin: 0;
            padding: 0;

        }

        body{
            background-image: url(background_image1.jpg);
            background-size: cover;
        }


        .flex-one{
            display : flex;
            align-items: center;
            justify-content: space-evenly;
            margin-bottom: 50px;
            font-size: 30px;
        }

        .flex-two{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .emo{
            height: 450px;
            width: 450px;
            box-shadow: 0 0 5rem black;
        }

        .eml{
            
                height: 450px;
                width: 450px;
                box-shadow: 0 0 5rem black;
            }


        .user{
            font-size: 50px;
            font-weight: 600;
            border: 5px outset black;
            border-radius: 15px;
            margin: 0 30%;
            box-shadow: 0 0 5rem black;
            margin-bottom: 50px;
        }


    </style>


        

</head>

<body>
    
    
    <?php 
    $sqlo = "SELECT * FROM coolie WHERE email='$email'";
    $result = mysqli_query($conn, $sqlo);
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


    <h1 align='center' class="user">USER DETAILS</h1>
     
    <div align="center" >
            
         
            <div class="flex-one">
                <h1>EMR</h1>

                <h1>Data entry</h1>
            </div>

             <div class="flex-two">
                <a href=/receipt.php ><img class="emo" src= "/emrs.png" ></a> 
            
                <a href=/payment.php><img class="eml" src="https://b2461891.smushcdn.com/2461891/wp-content/uploads/2021/10/E-prescription-Software-Development_-benefits-solutions-features.png?lossy=1&strip=1&webp=1.png" ></a>
                
             </div>
    </div>  

    </body>




</html>