<?php
// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subcriptions";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data and perform form validation
$name = $_POST["name"];
$email = $_POST["email"];
$subscription_plan = $_POST["subscription_plan"];

if (empty($name) || empty($email) || empty($subscription_plan)) {
    die("All fields are required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Insert data into "subscriptions" table
$sql = "INSERT INTO subcriptions VALUES ('$name', '$email', '$subscription_plan')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for subscribing!";
    echo "ur values been inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
