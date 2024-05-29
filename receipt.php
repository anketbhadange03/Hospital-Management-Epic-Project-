<!DOCTYPE html>
<?php include 'bookt.php'?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>payment</title>
  <link rel="stylesheet" href="C:\xampp\htdocs\payment.css">
  <style>#bn{border:5px solid black;padding:18px;border-collapse:collapse;background-color:yellow} table,td{border:5px solid black;padding:40px; border-collapse:collapse;}</style>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<style>div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}</style>


<script type="text/javascript" src="C:\xampp\htdocs\gpay.js"></script>
    <body>
    <h1 align="center">Patient EMR</h1><br>
    <h2>We would love to have your feedback</h2>
    <div class="stars" align="center">
   <form action="" method="POST" align="center">
    <input class="star star-5" id="star-5" type="radio" name="star" value="welldone"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star1" value="verygood"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star2" value="good"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star3" value="not bad"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star4" value="poor"/>
    <label class="star star-1" for="star-1"></label>
    <input type="text" name="name" placeholder="your name"><br>
    <br><textarea name='feed' row='50' cols='50'></textarea>
    <button type="submit" name="rate">Done </button>
  </form>
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



<br>




  

    
</body>





</html>