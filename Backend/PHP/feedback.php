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

// Fetch all the responses from the database
$query = "SELECT * FROM interview_responses";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview Feedback</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    textarea {
      width: 100%;
      height: 80px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<h2>Interview Responses</h2>

<?php if ($result->num_rows > 0): ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Interview Type</th>
        <th>Qualification</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Feedback</th>
        <th>Submit Feedback</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <form action="submit_feedback.php" method="POST">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['interview_type']; ?></td>
            <td><?php echo $row['qualification']; ?></td>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo nl2br($row['answer']); ?></td>
            <td>
              <textarea name="feedback" placeholder="Enter feedback..."><?php echo nl2br($row['feedback']); ?></textarea>
            </td>
            <td>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit">Submit Feedback</button>
            </td>
          </form>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No interview responses found.</p>
<?php endif; ?>

<?php
$conn->close();
?>

</body>
</html>
