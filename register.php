<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change this if you use a different username
$password = "";     // Change this if you use a different password
$dbname = "complain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>
                alert('User registered successfully.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="register.css">
</head>
<body>
  <main>
    <div class="overlay">
      <form method="POST" action="register.php">
        <div class="con">
          <header class="head-form">
            <h2>Register</h2>
          </header>
          <br>
          <div class="field-set">
            <span class="input-item">
              <i class="fa fa-user-circle"></i>
            </span>
            <input class="form-input" id="usname" type="text" placeholder="Username" name="username" required>
            <br>

            <span class="input-item">
              <i class="fa fa-user-circle"></i>
            </span>
            <input class="form-input" id="usemail" type="text" placeholder="@Email" name="email" required>
            <br>
            
            <span class="input-item">
              <i class="fa fa-key"></i>
            </span>
            <input class="form-input" type="password" placeholder="Password" name="password" id="pwd" required>

            <span>
              <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
            </span>
            <br>
            <button class="register" type="submit"> Register </button>
          </div>
        </div>
      </form>
    </div>
  </main>
  <script>
    function show() {
      var p = document.getElementById('pwd');
      p.setAttribute('type', 'text');
    }

    function hide() {
      var p = document.getElementById('pwd');
      p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById('eye').addEventListener('click', function () {
      if (pwShown == 0) {
        pwShown = 1;
        show();
      } else {
        pwShown = 0;
        hide();
      }
    }, false);
  </script>
</body>
<!-- <body>

<div class="register-container">
    <form method="POST">
        <header class="head-form">
            <h2>Register</h2>
        </header>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>
</div>

</body> -->

</html>
