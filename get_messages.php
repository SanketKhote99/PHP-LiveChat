<?php
// Retrieve chat messages from the database and display them
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

$sql = "SELECT * FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["sender"] . ":</strong> " . $row["message_content"] . "</p>";
    }
} else {
    echo "No messages yet";
}

$conn->close();
?>
