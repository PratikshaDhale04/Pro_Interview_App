<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            height: 100vh;
            position: relative;
        }

        .top-buttons {
            position: absolute;
            top: 20px;
            left: 30px; /* Changed from right to left */
        }

        .top-buttons a {
            background-color:rgb(25, 26, 27);
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .top-buttons a:hover {
            background-color: #3366cc;
        }

        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-card {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            animation: fadeIn 1s ease-in-out;
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #4c8bf5;
        }

        .profile-card h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: #333;
        }

        .profile-card p {
            margin: 8px 0;
            font-size: 16px;
            color: #555;
        }

        .profile-card a.logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4c8bf5;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .profile-card a.logout:hover {
            background-color: #3366cc;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="top-buttons">
    <a href="main.php"> Back to Home</a>
</div>

<div class="container">
    <div class="profile-card">
        <img src="data:image/jpeg;base64,<?php echo $_SESSION['profile_pic']; ?>" alt="Profile Picture">
        <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>
        <a class="logout" href="register2.php">Logout</a>
    </div>
</div>

</body>
</html>
