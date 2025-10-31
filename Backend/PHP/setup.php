<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Interview Setup</title>
    <style>
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
            background: url('A1.jpg') no-repeat center center/cover;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        button:hover {
            background: #2980b9;
        }
        @media (max-width: 480px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Interview Setup</h2>
        <form id="setupForm">
            <label for="role">Select Role:</label>
            <select id="role" required>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Data Scientist">Data Scientist</option>
                <option value="Product Manager">Product Manager</option>
                <option value="System Administrator">System Administrator</option>
            </select>
            
            <label for="experience">Years of Experience:</label>
            <input type="number" id="experience" min="0" max="50" required>
            
            <label for="difficulty">Select Difficulty:</label>
            <select id="difficulty" required>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
            
            <button type="submit">Start Interview</button>
        </form>
    </div>

    <script>
        document.getElementById("setupForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let role = document.getElementById("role").value;
            let experience = document.getElementById("experience").value;
            let difficulty = document.getElementById("difficulty").value;

            if (role && experience && difficulty) {
                alert("Interview setup complete! Redirecting to interview...");
                window.location.href = "mock.html"; 
            } else {
                alert("Please fill in all fields before proceeding.");
            }
        });
    </script>
</body>
</html> -->
<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Interview Setup</title>
    <style>
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
            background: url('4.jpg') no-repeat center center/cover;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        button:hover {
            background: #2980b9;
        }
        @media (max-width: 480px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Interview Setup</h2>
        <form id="setupForm">
            <label for="interviewType">Select Interview Type:</label>
        <select id="interviewType" required onchange="toggleQualification()">
            <option value="HR">HR</option>
            <option value="Technical">Technical</option>
        </select>
            <label for="role">Select Role:</label>
            <select id="role" required>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Data Scientist">Data Scientist</option>
                <option value="Product Manager">Product Manager</option>
                <option value="System Administrator">System Administrator</option>
            </select><label for="experience">Years of Experience:</label>
        <input type="number" id="experience" min="0" max="50" required>
        
        <label for="difficulty">Select Difficulty:</label>
        <select id="difficulty" required>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>
         
        <div id="qualificationDiv" style="display: none;">
            <label for="qualification">Select Qualification:</label>
            <select id="qualification">
                <option value="B.Tech">B.Tech</option>
                <option value="BBA">BBA</option>
                <option value="BCA">BCA</option>
                <option value="MBA">MBA</option>
                <option value="M.Tech">M.Tech</option>
                <option value="MCA">MCA</option>
                <option value="Diploma">Diploma</option>
            </select>
        </div>
        
        <button type="submit">Start Interview</button>
    </form>
</div>

<script>
    function toggleQualification() {
        let interviewType = document.getElementById("interviewType").value;
        let qualificationDiv = document.getElementById("qualificationDiv");
        if (interviewType === "Technical") {
            qualificationDiv.style.display = "block";
        } else {
            qualificationDiv.style.display = "none";
        }
    }

    document.getElementById("setupForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let role = document.getElementById("role").value;
        let experience = document.getElementById("experience").value;
        let difficulty = document.getElementById("difficulty").value;
        let interviewType = document.getElementById("interviewType").value;
        let qualification = interviewType === "Technical" ? document.getElementById("qualification").value : "N/A";
        
        if (role && experience && difficulty && interviewType) {
            alert("Interview setup complete! Redirecting to interview...");
            window.location.href = "mock.php"; 
        } else {
            alert("Please fill in all fields before proceeding.");
        }
    });
</script>

</body>
</html>