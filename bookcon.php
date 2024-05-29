

<?php
SESSION_START();
$server='localhost';
$username='root';
$password='';
$database='user';
$conn=mysqli_connect($server,$username,$password,$database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patientID = $_POST['patientID'];
    $patientName = $_POST['patientName'];
    $healthcareProvider = $_POST['healthcareProvider'];
    $profession = $_POST['profession'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $hospitalPharmacyName = $_POST['hospitalPharmacyName'];
    $medicines = $_POST['medicines'];
    $prescription = $_POST['prescription'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO prescriptions (patient_id, patient_name, healthcare_provider, profession, date, time, duration, hospital_pharmacy_name, medicines, prescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $patientID, $patientName, $healthcareProvider, $profession, $date, $time, $duration, $hospitalPharmacyName, $medicines, $prescription);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Prescription added successfully!";
    } else {
        echo "Error adding prescription: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
 
