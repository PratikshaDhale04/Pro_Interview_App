<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Selection</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('1.jpg') no-repeat center center/cover;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 320px;
        }
        h2 {
            margin-bottom: 15px;
        }
        .company-menu {
            list-style: none;
            padding: 0;
        }
        .company-menu li {
            margin: 10px 0;
        }
        .company-menu a {
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: 0.3s;
        }
        .company-menu a:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Select a Company</h2>
        <ul class="company-menu">
            <li><a href="#" onclick="selectCompany('Google')">Google</a></li>
            <li><a href="#" onclick="selectCompany('Amazon')">Amazon</a></li>
            <li><a href="#" onclick="selectCompany('Microsoft')">Microsoft</a></li>
            <li><a href="#" onclick="selectCompany('Apple')">Apple</a></li>
            <li><a href="#" onclick="selectCompany('Tesla')">Tesla</a></li>
            <li><a href="#" onclick="selectCompany('Facebook (Meta)')">Facebook (Meta)</a></li>
            <li><a href="#" onclick="selectCompany('IBM')">IBM</a></li>
            <li><a href="#" onclick="selectCompany('Intel')">Intel</a></li>
        </ul>
    </div>

    <script>
        function selectCompany(company) {
            window.location.href = "setup.php";
        }
    </script>

</body>
</html>