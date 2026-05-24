<?php
// 1. Database Connection Settings
$servername = "localhost";
$username = "root";  // default in XAMPP
$password = "";      // empty password in XAMPP
$dbname = "gym";     // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// 2. Process the Form Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize inputs to prevent SQL injection and XSS
    $name = $conn->real_escape_string(htmlspecialchars(strip_tags(trim($_POST['name']))));
    $email = $conn->real_escape_string(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
    $message = $conn->real_escape_string(htmlspecialchars(strip_tags(trim($_POST['message']))));

    // Basic Validation
    if (empty($name) || empty($email) || empty($message)) {
        die("Error: Please fill out all required fields.");
    }

    // 3. Insert Query (Assuming you have a table named 'inquiries')
    $sql = "INSERT INTO inquiries (name, email, message) VALUES ('$name', '$email', '$message')";

    // 4. Check Insert Status & Show UI
    if ($conn->query($sql) === TRUE) {
        // Beautiful Dark Theme Success Message
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
            <div style='font-size: 60px; margin-bottom: 20px;'>✉️</div>
            <h2 style='font-family: \"Oswald\", sans-serif; text-transform: uppercase; font-size: 32px; margin-bottom: 10px; color: #ff3300;'>Message Sent</h2>
            <p style='font-size: 16px; color: #94a3b8; line-height: 1.6;'>
                Thank you, <strong>$name</strong>. Your message has been received.<br>
                Our team will reply to <strong>$email</strong> within 24 hours.
            </p>
            <a href='../pages/contactus.html' style='
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
                transition: background 0.3s;
            '>Back to Contact Page</a>
        </div>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect back if accessed directly without POST
    header("Location: ../contactus.html");
    exit();
}

$conn->close();
?>