<?php include 'config.php'?>
<!DOCTYPE html>

<html>
<head>
    <title>sign in</title>

    <style>
        *{
            margin: 0;
            color: black;
            
        }

        body{
            display: block;
            background-image: url("background_image1.jpg");
            background-size: cover;
        }

        .main{
            border: 3px solid black;
            margin-left: 28%;
            margin-right: 28%;
            height: 400px;
            box-shadow: 0 0 4rem black;
        }

        form{
            display: block;
        }

        p{
            font-size: 20px;
            font-weight: 700;
        }

        h2{
            margin-top: 40px;
            font-size: 40px;
        }

        #login{
            background-color: #6F9FC1;
            padding: 10px 30px;
            margin-top: 25px;
            font-size: 20px;
            font-weight: 700;
        }

        input{
            margin-top: 20px;
            height: 25px;
            width: 270px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: #add3ee;
        }

        #new_user{
            margin-top: 20px;
        }


        .back-btn{
            padding: 1rem 1.3rem;
            border-radius: 100px;
            background-color: #6F9FC1;
            border: 3px outset black;
            margin-top: 20px;
            margin-left: 20px;
            margin-bottom: 100px;
            font-size: 1.5rem;
            font-weight: 600;
            box-shadow: 0 0 7.5rem #2b5166;
        }

        a{
            text-decoration: none;
        }

        .back-btn :hover{
            color: white;
            
        }


    </style>

</head>
<body>

    <button class="back-btn"><a href="/Ecoolie.php">Back</a></button>

    <div class="main" align="center">
        <h2>Sign in</h2>
        <form method='POST'> 
            <p>Enter your email : 
            <input type="email" id="email" name="email" placeholder="Enter your email" size="50" required><br></p>
            <p>Enter password :
            <input type="password" id="password" name="password" placeholder="Atleast 8 characters" size="50" required></p>
            <button type="submit" id="login" name="login" title="click to continue">Login</button>

            <p id="new_user">New User? <a href="\signup.php">Register</a>
        </form>
    </div>
    
</body> 
 
</html>