<?php
$host = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP has no password
$dbname = "ip";

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if feedback is provided and if 'id' is set
if (isset($_POST['id']) && isset($_POST['feedback'])) {
    $id = $_POST['id'];
    $feedback = trim($_POST['feedback']); // Clean the feedback input

    // Check if feedback is empty
    if (empty($feedback)) {
        echo "Feedback cannot be empty.";
        exit;
    }

    // Prevent SQL injection by using real_escape_string
    $feedback = $conn->real_escape_string($feedback);

    // Prepare the query to update feedback in the database
    $stmt = $conn->prepare("UPDATE interview_responses SET feedback = ? WHERE id = ?");
    $stmt->bind_param("si", $feedback, $id);
    
    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the feedback page
        header("Location: feedback.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
