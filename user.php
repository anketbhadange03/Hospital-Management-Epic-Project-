<!DOCTYPE html>
<?php include 'details.php' ?>
<?php include 'bookt.php' ?>
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
        }

        .detail{
            border: 3px solid black;
            background-color: #6f9fc1;
            border-radius: 10px;
            padding: 12px 25px;
            margin-top: 60px;
            margin-left: 38%;
            margin-right: 38%;
        
        }

        .php-content{
            display: block;
            border: 3px solid black;
            background-color: #6f9fc1;
            border-radius: 10px;
            margin-top: 50px;
            margin-right: 65%;
            margin-left: 2%;
            padding: 12px 12px;
        }

        .main1{
            display: flex;
            justify-content: space-evenly;
            margin-top: 50px;
        }

        .main2{
            display: flex;
            justify-content: space-evenly;
            margin-top: 30px;
            
        }

        img{
            height: 450px;
            width: 500px;
            border: 3px solid black;
        }

    </style>
    
</head>

<body>
    

    <h1 align="center" class="detail">USER DETAILS</h1>    
    <div class="php-content">

        <?php 
            $sqlo = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sqlo);
            $displayed = false;

            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {
                    if (!$displayed) {
                        echo "<h2>Name: " . $rows["name"] . "</h2>
                            <h2>Email: " . $rows["email"] . "</h2>
                            <h2> user ID: ".$rows["user_id"]."</h2>";
                        $displayed = true; // Set the flag to true after displaying the information
                    }
                }
            }
        ?>

    </div>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/19e92deb-d7a0-487a-b2a1-5f565ef795c3/webchat/config.js" defer></script>

    <div class="main-content">
        <div class="main1">
            
        </div>

       
        <table align="center">
    <tbody>
        <tr>
            <td id="bn"><b>Patient ID</b></td>
            <td id="bn"><b>Patient Name</b></td>
            <td id="bn"><b>Healthcare Provider</b></td>
            <td id="bn"><b>Profession</b></td>
            <td id="bn"><b>Hospital/Pharmacy</b></td>
            <td id="bn"><b>Duration</b></td>
            <td id="bn"><b>Medicine</b></td>
            <td id="bn"><b>Prescription</b></td>
            <td id="bn"><b>Date</b></td>
            <td id="bn"><b>Time</b></td>
        </tr>
        <?php
        // Assuming $conn is the database connection
        $sql = "SELECT * FROM prescriptions";
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $rows["patient_id"] . "</td>
                    <td>" . $rows["patient_name"] . "</td>
                    <td>" . $rows["healthcare_provider"] . "</td>
                    <td>" . $rows["profession"] . "</td>
                    <td>" . $rows["hospital_pharmacy_name"] . "</td>
                    <td>" . $rows["duration"] . "</td>
                    <td>" . $rows["medicines"] . "</td>
                    <td>" . $rows["prescription"] . "</td>
                    <td>" . $rows["date"] . "</td>
                    <td>" . $rows["time"] . "</td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>

<br><br>




</body>

</html>
