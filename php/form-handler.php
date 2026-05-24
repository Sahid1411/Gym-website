<?php

// 1. Database Connection
$servername = "localhost";
$username = "root";  // default in XAMPP
$password = "";      // empty password in XAMPP
$dbname = "gym";  // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']=='POST'){


// 2. Get Form Data
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$locality = $_POST['locality'];
$phone = $_POST['phone'];
$email = $_POST['email'];


// 3. Insert Query
$sql = "INSERT INTO gym_members (name, age, gender, locality, phone, email)
        VALUES ('$name', '$age', '$gender', '$locality', '$phone', '$email')";


// 4. Check Insert Status
if ($conn->query($sql) === TRUE) {
    echo "
    <div style='
        font-family: \"Inter\", sans-serif;
        max-width: 500px;
        margin: 100px auto;
        padding: 40px;
        border-radius: 16px;
        text-align: center;
        background: rgba(20, 22, 26, 0.95);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 30px rgba(255, 51, 0, 0.2);
        color: #fff;
    '>
        <div style='font-size: 60px; margin-bottom: 20px;'>🏋️‍♂️</div>
        <h2 style='font-family: \"Oswald\", sans-serif; text-transform: uppercase; font-size: 32px; margin-bottom: 10px; color: #ff3300;'>Welcome to the Club</h2>
        <p style='font-size: 16px; color: #94a3b8; line-height: 1.6;'>
            Thank you <strong>$name</strong>. Your assessment request has been received.<br>
            Our coaching team will reach out to you shortly.
        </p>
        <a href='index.html' style='
            display: inline-block;
            margin-top: 30px;
            padding: 14px 28px;
            background: #ff3300;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        '>Back to Gym</a>
    </div>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>



<!-- run this command to make your webiste live -->
<!-- http://localhost/gym-website/index.html -->