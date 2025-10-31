<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mock Interview</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(to right, #141e30, #243b55);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: rgba(0, 0, 0, 0.8);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
      width: 90%;
      max-width: 650px;
      max-height: 90vh;
      overflow-y: auto;
    }

    h2 {
      text-align: center;
      color: #1abc9c;
      margin-bottom: 25px;
    }

    .btn-group {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .btn-group button {
      padding: 10px 20px;
      background: #1abc9c;
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      transition: 0.3s;
    }

    .btn-group button:hover {
      background: #16a085;
    }

    #qualificationSelect {
      margin: 20px 0;
    }

    select {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      font-size: 16px;
      color: #333;
    }

    .question-block {
      margin-bottom: 20px;
    }

    .question-block p {
      margin-bottom: 5px;
      font-weight: bold;
    }

    textarea {
      width: 100%;
      min-height: 70px;
      padding: 10px;
      border-radius: 10px;
      resize: vertical;
      font-size: 14px;
      border: none;
      color: #333;
    }

    textarea:focus {
      outline: 2px solid #1abc9c;
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 10px;
      background-color: #1abc9c;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #16a085;
    }

    .confirmation {
      text-align: center;
      font-size: 18px;
      padding: 20px;
      background-color: #2ecc71;
      color: white;
      margin-top: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <h2>Mock Interview</h2>

    <div class="btn-group">
      <button id="hrBtn">HR</button>
      <button id="techBtn">Technical</button>
    </div>

    <div id="qualificationSelect" style="display: none;">
      <label for="qualification">Select Qualification:</label>
      <select id="qualification">
        <option value="">--Choose--</option>
        <option value="B.Tech">B.Tech</option>
        <option value="BBA">BBA</option>
        <option value="BCA">BCA</option>
        <option value="MBA">MBA</option>
        <option value="M.Tech">M.Tech</option>
        <option value="MCA">MCA</option>
        <option value="Diploma">Diploma</option>
      </select>
    </div>

    <form id="interviewForm" style="display: none;">
      <div id="questions"></div>
      <button type="submit">Submit</button>
    </form>

    <div id="confirmationMessage" class="confirmation" style="display: none;">
      Your responses have been submitted successfully!
    </div>
  </div>

  <script>
    const interviewData = {
      HR: [
        "Tell me about yourself.",
        "Why should we hire you?",
        "What are your strengths and weaknesses?",
        "Where do you see yourself in five years?"
      ],
      Technical: {
        "B.Tech": [
          "Explain OOP concepts.",
          "What is a linked list?",
          "Describe the OSI model in networking.",
          "What is a database index?"
        ],
        "BBA": [
          "What are the 4 P’s of marketing?",
          "Explain SWOT analysis.",
          "What is financial management?",
          "Define supply chain management."
        ],
        "BCA": [
          "What is the difference between C and Java?",
          "Explain cloud computing.",
          "What is an algorithm?",
          "Describe primary key and foreign key."
        ],
        "MBA": [
          "Explain Porter’s Five Forces Model.",
          "What is strategic management?",
          "Define financial accounting.",
          "What is the role of branding in marketing?"
        ],
        "M.Tech": [
          "What is machine learning?",
          "Explain distributed computing.",
          "How does blockchain work?",
          "Describe different software testing methodologies."
        ],
        "MCA": [
          "What is a relational database?",
          "Explain data structures and their types.",
          "What is the difference between Python and Java?",
          "Describe different software development models."
        ],
        "Diploma": [
          "What is PLC in automation?",
          "Explain different types of welding techniques.",
          "Describe basic electrical circuits.",
          "What is an HVAC system?"
        ]
      }
    };

    let currentQuestions = [];

    document.getElementById("hrBtn").addEventListener("click", function () {
      currentQuestions = interviewData.HR;
      document.getElementById("qualificationSelect").style.display = "none";
      renderQuestions(currentQuestions);
    });

    document.getElementById("techBtn").addEventListener("click", function () {
      document.getElementById("qualificationSelect").style.display = "block";
      document.getElementById("questions").innerHTML = "";
      document.getElementById("interviewForm").style.display = "none";
    });

    document.getElementById("qualification").addEventListener("change", function () {
      const selected = this.value;
      if (selected && interviewData.Technical[selected]) {
        currentQuestions = interviewData.Technical[selected];
        renderQuestions(currentQuestions);
      }
    });

    function renderQuestions(questions) {
      const container = document.getElementById("questions");
      container.innerHTML = "";
      document.getElementById("confirmationMessage").style.display = "none";

      questions.forEach((q, i) => {
        const block = document.createElement("div");
        block.className = "question-block";
        block.innerHTML = `
          <p>${i + 1}. ${q}</p>
          <textarea id="q${i}" placeholder="Your answer..." required></textarea>
        `;
        container.appendChild(block);
      });

      document.getElementById("interviewForm").style.display = "block";
    }
    document.getElementById("interviewForm").addEventListener("submit", function (e) {
  e.preventDefault();
  let allFilled = true;
  const formData = new FormData();
  const interviewType = document.getElementById("qualificationSelect").style.display === "block" ? "Technical" : "HR";
  const qualification = document.getElementById("qualification").value || "";

  formData.append("interview_type", interviewType);
  formData.append("qualification", qualification);

  currentQuestions.forEach((q, i) => {
    const ans = document.getElementById(`q${i}`).value.trim();
    if (!ans) allFilled = false;
    formData.append("questions[]", q);
    formData.append("answers[]", ans);
  });

  if (!allFilled) {
    alert("Please answer all questions before submitting.");
    return;
  }

  fetch("submit.php", {
    method: "POST",
    body: formData
  }).then(response => {
    if (response.redirected) {
      window.location.href = response.url;
    } else {
      alert("Submission failed.");
    }
  }).catch(error => {
    console.error("Error:", error);
    alert("Submission error.");
  });
});


   
  </script>
</body>
</html>
