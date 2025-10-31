<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Database connection
    $host = "localhost"; // Change if needed
    $user = "root";      // Your DB username
    $pass = "";          // Your DB password
    $dbname = "registered_users"; // Your DB name

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 2. Get form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];

    // 3. Handle profile picture
    $profilePic = null;
    if (isset($_FILES['profile_pic']['tmp_name']) && is_uploaded_file($_FILES['profile_pic']['tmp_name'])) {
        $profilePic = file_get_contents($_FILES['profile_pic']['tmp_name']);
    }

    // 4. Prepare and execute query
    $stmt = $conn->prepare("INSERT INTO registered_users (username, password, name, email, phone, profile_pic) VALUES (?, ?, ?, ?, ?, ?)");
    $null = NULL;
    $stmt->bind_param("sssssb", $username, $password, $name, $email, $phone, $null);
    $stmt->send_long_data(5, $profilePic);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('3.jpg') no-repeat center center fixed;
      background-size: cover;
      padding: 40px;
      margin: 0;
    }

    .container {
      width: 320px;
      margin: auto;
      background: rgba(255,255,255,0.95);
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px #888;
    }

    h2 {
      text-align: center;
    }

    input, button {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      font-size: 16px;
    }

    button {
      background: #007BFF;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="tel" name="phone" placeholder="Phone Number" required />
      <input type="file" name="profile_pic" accept="image/*" />
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
