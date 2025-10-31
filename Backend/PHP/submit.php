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

// Get and sanitize data
$interview_type = $_POST['interview_type'] ?? '';
$qualification = $_POST['qualification'] ?? '';
$questions = $_POST['questions'] ?? [];
$answers = $_POST['answers'] ?? [];

if (count($questions) !== count($answers)) {
    die("Mismatched questions and answers.");
}

$stmt = $conn->prepare("INSERT INTO interview_responses (interview_type, qualification, question, answer) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $interview_type, $qualification, $question, $answer);

// Insert each question and answer
for ($i = 0; $i < count($questions); $i++) {
    $question = $questions[$i];
    $answer = $answers[$i];
    $stmt->execute();
}

$stmt->close();
$conn->close();

// Redirect to feedback page
header("Location: feedback.php");
exit;
?>
