<?php
session_start();
include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $admin_name = $_POST['admin_name'];
  $pass = $_POST['pass'];

  // Prepare SQL statement to prevent SQL injection
  $stmt = $connect->prepare("SELECT * FROM admin WHERE admin_name = ?");
  $stmt->bind_param("s", $admin_name);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if user exists
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify password
    if ($pass == $user['pass']) {
      // Successful login
      $_SESSION['admin_id'] = $user['admin_id'];
      $_SESSION['admin_name'] = $user['admin_name'];
      echo "<script>
              alert('Login successful!');
              window.location.href = 'admin.php';
            </script>";
      exit();
  } else {
      // Invalid password, show a pop-up alert
      echo "<script>alert('Invalid password!');</script>";
  }
}  else {
          // Invalid username or password, show a pop-up alert
          echo "<script>alert('Invalid Admin name!');</script>";
        }

  $stmt->close();
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin Login Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../CSS/adminlogin1.css">
</head>
<body>
<main>
  <div class="overlay">
    <form method="POST" action="adminlogin.php">
      <div class="con">
        <header class="head-form">
          <h2>Admin Log In</h2>
        </header>
        <br>
        <div class="field-set">
          <span class="input-item">
            <i class="fa fa-user-circle"></i>
          </span>
          <input class="form-input" id="usname" type="text" placeholder="Admin Name" name="admin_name" required>
          <br>
          <span class="input-item">
            <i class="fa fa-key"></i>
          </span>
          <input class="form-input" type="password" placeholder="Password" name="pass" id="pwd" required>
          <span>
            <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
          </span>
          <br>
          <button class="log-in" style = "width : 50%; margin-left : 25%; border-radius: 7px 20px 7px 20px;" type="submit"> Log In </button>
        </div>
        <br>
        <div class="other">
          <a class="btn submits frgt-pass" href="../login.php"> User Loginㅤ</a>
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
</html>
