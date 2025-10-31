<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Interview App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #2c3e50;
            padding: 15px 20px;
            color: white;
            position: relative;
        }

        /* Sidebar Navigation */
        .sidebar {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-right: 15px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
            border-radius: 5px;
        }

        /* Right-Side Dropdown */
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        .dropdown {
            position: absolute;
            right: 20px;
            top: 60px;
            background: white;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            display: none;
            flex-direction: column;
        }

        .dropdown a {
            text-decoration: none;
            color: black;
            padding: 10px 15px;
            display: block;
            transition: 0.3s;
        }

        .dropdown a:hover {
            background: #ddd;
        }

        /* Tagline */
        .tagline-container {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            padding: 20px;
            background: #27ae60;
            color: white;
            margin-top: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Single Image */
        .main-image-container {
            width: 100%;
            margin: 20px 0;
        }

        .main-image-container img {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
                flex-direction: column;
                position: absolute;
                background: #2c3e50;
                top: 60px;
                left: 10px;
                width: 80px;
                border-radius: 5px;
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            }

            .sidebar.show {
                display: flex;
            }

            .menu-icon {
                display: block;
            }

            .main-image-container img {
                height: 300px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <ul class="sidebar">
            <li><a href="main.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register2.php">Register</a></li>
            <li><a href="company.php">Company</a></li>
            <li><a href="setup.php">Setup</a></li>
            <li><a href="mock.php">Mock Interview</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>

        <div class="menu-icon" onclick="toggleDropdown()">☰</div>
        <div class="dropdown" id="dropdownMenu">
            <a href="profile.php">Profile</a>
            <a href="progress.html">Progress</a>
            <a href="course.html">Courses</a>
            <a href="term.html">Terms & Conditions</a>
            <a href="#" onclick="signOut()">Sign Out</a>
        </div>
    </nav>

    <div class="tagline-container">
        Turn <span style="color: yellow;">Nerves</span> into <span style="color: yellow;">Confidence</span>, 
        Dreams into <span style="color: yellow;">Reality</span>.
    </div>

    <!-- Single Image -->
    <div class="main-image-container">
        <img src="A1.jpg" alt="Professional Interview Preparation">
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById("dropdownMenu");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        function signOut() {
            alert("Signing Out...");
            window.location.href = "lo.php";
        }
    </script>

</body>
</html>