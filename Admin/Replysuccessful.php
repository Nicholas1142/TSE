<?php   session_start();
$adminID = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin WHERE admin_id = '$adminID'";
$result = mysqli_query($connect, $sql);
if (!isset($_SESSION['admin_id'])) {
  // Redirect to the login page or handle the unauthorized access
  header("Location: adminlogin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<?php include 'nav.php'; ?>


    <div class="success-message">
        <h2>Submit Successful!</h2>
        <p>Your complaint has been submitted successfully.</p>
        <a href="admin.php">Go Back to Home</a>
    </div>
</body>
</html>
