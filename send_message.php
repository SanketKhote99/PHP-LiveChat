<?php
// Store the received message in the database
// Replace with your database connection code

// Sample implementation (assuming you have a database table named "messages")
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = $_POST["message"];
$sender = $_POST["user"]; // Replace with appropriate sender identification

$sql = "INSERT INTO messages (sender, message_content) VALUES ('$sender', '$message')";
$conn->query($sql);
header("Location: ./index.html");

$conn->close();
?>
