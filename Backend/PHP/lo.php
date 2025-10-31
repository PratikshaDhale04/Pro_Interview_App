<?php
session_start();

// Database connection settings
$host = "localhost";
$dbname = "ip";
$username = "root";
$password = " ";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($inputPassword, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php"); // Redirect after successful login
            exit();
        } else {
            echo "<script>document.getElementById('error-message').textContent = 'Invalid password';</script>";
        }
    } else {
        echo "<script>document.getElementById('error-message').textContent = 'No user found with that username';</script>";
    }

    $stmt->close();
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: Arial, sans-serif;
        }

        body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          background-color: #f5f5f5;
        }

        .container {
          display: flex;
          width: 70%;
          height: 60vh;
          background: rgb(211, 199, 199);
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          overflow: hidden;
          position: relative;
        }

        .image-section {
          width: 50%;
        }

        .image-section img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .login-section {
          width: 50%;
          padding: 40px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          text-align: center;
        }

        h2 {
          margin-bottom: 20px;
        }

        .input-group {
          margin-bottom: 15px;
          text-align: left;
        }

        .input-group label {
          display: block;
          font-weight: bold;
        }

        .input-group input {
          width: 100%;
          padding: 10px;
          margin-top: 5px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        button {
          width: 100%;
          padding: 10px;
          background-color: #333;
          color: white;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        button:hover {
          background-color: #555;
        }

        #error-message {
          color: red;
          margin-top: 10px;
        }

        .back-home {
          position: absolute;
          top: 10px;
          left: 10px;
          background-color: #333;
          color: white;
          padding: 6px 12px;
          font-size: 14px;
          border: none;
          border-radius: 4px;
          text-decoration: none;
          cursor: pointer;
        }

        .back-home:hover {
          background-color: #555;
        }
    </style>
</head>
<body>
    <a href="main.php" class="back-home">Back to Home</a>

    <div class="container">
        <div class="image-section">
            <img src="A2.jpg" alt="Image">
        </div>
<div class="login-section">
    <h2>Login</h2>
    <form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<a href="register2.php">New user? Register here</a>
          <p id="error-message"></p>
        </div>
    </div>

    <script>
        document.getElementById("password").addEventListener("input", function() {
            const password = this.value;
            const requirements = document.getElementById("password-requirements");
            const invalidMessage = document.getElementById("invalid-password-message");
            const loginButton = document.getElementById("loginButton");
            const strongPassword = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            
            if (!strongPassword.test(password)) {
                requirements.style.color = "red";
                requirements.style.display = "block";
                invalidMessage.style.display = "block";
                loginButton.disabled = true;
            } else {
                requirements.style.color = "green";
                requirements.textContent = "Password is strong";
                invalidMessage.style.display = "none";
                loginButton.disabled = false;
            }
        });
    </script>
</body>
</html>
