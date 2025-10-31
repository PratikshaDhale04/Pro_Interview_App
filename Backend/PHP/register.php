<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration & Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('3.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 300px;
      margin: 50px auto;
      padding: 20px;
      background: rgba(255, 255, 255, 0.9); /* white background with transparency */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      text-align: center;
    }

    input, button {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background: blue;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 16px;
      padding: 10px;
    }

    button:hover {
      background: darkblue;
    }

    .hidden {
      display: none;
    }

    .profile-pic {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container" id="register-container">
    <h2>Register</h2>
    <input type="text" id="username" placeholder="Enter Username" />
    <input type="password" id="password" placeholder="Enter Password" />
    <input type="text" id="name" placeholder="Enter Name" />
    <input type="email" id="email" placeholder="Enter Email" />
    <input type="tel" id="phone" placeholder="Enter Phone Number" />
    <input type="file" id="profile-pic-input" accept="image/*" />
    <button onclick="registerUser()">Register</button>
  </div>

  <div class="container hidden" id="profile-container">
    <h2>User Profile</h2>
    <img id="profile-pic" class="profile-pic" src="" alt="Profile Picture" />
    <p><strong>Name:</strong> <span id="profile-name"></span></p>
    <p><strong>Email:</strong> <span id="profile-email"></span></p>
    <p><strong>Phone:</strong> <span id="profile-phone"></span></p>
    <button onclick="logout()">Logout</button>
  </div>

  <script>
    function registerUser() {
      let username = document.getElementById("username").value.trim();
      let password = document.getElementById("password").value.trim();
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let phone = document.getElementById("phone").value.trim();
      let profilePicInput = document.getElementById("profile-pic-input");

      if (username && password && name && email && phone) {
        localStorage.setItem("name", name);
        localStorage.setItem("email", email);
        localStorage.setItem("phone", phone);

        if (profilePicInput.files.length > 0) {
          let reader = new FileReader();
          reader.onload = function (e) {
            localStorage.setItem("profilePic", e.target.result);
            showProfile();
          };
          reader.readAsDataURL(profilePicInput.files[0]);
        } else {
          showProfile();
        }
      } else {
        alert("Please fill all fields before registering.");
      }
    }

    function showProfile() {
      document.getElementById("profile-name").innerText = localStorage.getItem("name");
      document.getElementById("profile-email").innerText = localStorage.getItem("email");
      document.getElementById("profile-phone").innerText = localStorage.getItem("phone");

      let profilePic = localStorage.getItem("profilePic");
      document.getElementById("profile-pic").src = profilePic || "https://via.placeholder.com/100";

      document.getElementById("register-container").classList.add("hidden");
      document.getElementById("profile-container").classList.remove("hidden");
    }

    function logout() {
      localStorage.clear();
      document.getElementById("register-container").classList.remove("hidden");
      document.getElementById("profile-container").classList.add("hidden");
    }

    window.onload = function () {
      if (localStorage.getItem("name")) {
        showProfile();
      }
    };
  </script>
</body>
</html>
