<!Doctype html>
<?php include "config.php"?>
<html>
<head>
    <title> sign up</title>
    
    <meta charset="utf-8">
    <meta name="keywords" content="coolie booking">
    <meta name="description" content="book coolie">

    <style>
        *{
            margin: 0;
            color: black;
        }

        body{
            background-image: url("background_image1.jpg");
            background-size: cover;
            
        }

        .main{
            border: 3px solid black;
            margin-top: 100px;
            margin-left: 28%;
            margin-right: 28%;
            height: 600px;
            box-shadow: 0 0 4rem black;
        }

        h1{
            margin-top: 50px;
            font-size: 40px;
            font-weight: 700;
        }

        form{
            font-size: 25px;
            font-weight: 700;
            margin-top: 30px;
        }

        .two{
            height: 20px;
            width: 20px;
            margin-left: 10px;
            margin-right: 10px;
            border: 2px solid black;
        }

        .one{
            height: 25px;
            border: 3px solid black;
            border-radius: 10px;
            width: 280px;
            margin-top: 25px;
        }

        #btn{
            background-color: #6f9fc1;
            border: 3px solid black;
            padding: 12px 30px;
            font-size: 20px;
            font-weight: 700;
        }

        .btn-back{
            padding: 1rem 1.3rem;
            border-radius: 100px;
            background-color: #6F9FC1;
            border: 3px outset black;
            margin-top: 20px;
            margin-left: 20px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        a{
            text-decoration: none;
        }

        .btn-back :hover{
            color: white;
        }

    </style>

</head>

<body >

    <button class="btn-back"><a href="/Ecoolie.php">Back</a></button>

    <div class="main" align="center">

        <h1 >Sign up</h1>  
        
        <form method="POST">

            <label>Patient</label><input class="two" type=checkbox id="ch" name="remember[]" value="user" onclick=show()> 
            <label>Healthcare</label><input class="two" type=checkbox id="chi" name="remember[]" value="healthcare" onclick=hide()> 
            <label>Hospital</label><input class="two" type=checkbox name="remember[]" value="hospital" id="cho" onclick=shide()>

            <br>
            <label>Enter Name :</label>
            <input class="one" name="name" required>
            <br>
            <label>Enter Email : </label>
            <input class="one" type="email" name="email" required>
            <br>
            <label> Create new password : </label>
            <input class="one" type="password" name="password" required> <br>
            <label id="dips" hidden>phone</label>
            <input class="one" type="phone" name="phone" maxlength=10 id="dip" hidden><br>
            <label id="do">License no. :</label>
            <input class="one" id="dop" name="license"><br>
            <label id="di" hidden> profession  </label> 
            <select class="one" name="station" id="dipsy" hidden> 
                <option>Select profession</option>																		
                <option value="doc">Doctor</option>																		
                <option value="pharma">Pharmacist</option>
            </select>
            <br><br>
            <input type="submit" name="register"  id="btn" required>
            
        </form>

    </div>


<script> 
    function hide(){
        document.getElementById('dip').hidden = false;
        document.getElementById('dips').hidden = false;
        document.getElementById('dipsy').hidden = false;
        document.getElementById('di').hidden = false;
        document.getElementById('dop').hidden = false;
        document.getElementById('do').hidden = false;
        let b=document.getElementById("ch");
        let a=document.getElementById("cho");
        b.checked=false;
 
    }

    function show()
    {document.getElementById('dip').hidden = true;
        document.getElementById('dips').hidden = true;
        document.getElementById('dipsy').hidden = true;
        document.getElementById('di').hidden = true;
        document.getElementById('dop').hidden = true;
        document.getElementById('do').hidden = true;
        let a=document.getElementById("chi");
        let b=document.getElementById("cho");
        a.checked=false;
        b.checked=false;

    }


    function shide()
    {document.getElementById('dip').hidden = false;
        document.getElementById('dips').hidden = false;
        document.getElementById('dipsy').hidden = true;
        document.getElementById('di').hidden = true;
        document.getElementById('dop').hidden = false;
        document.getElementById('do').hidden = false;
        let a=document.getElementById("chi");
        let b=document.getElementById("ch");
        a.checked=false;
        b.checked=false;
    }

</script>

</body>



</html>
