<?php
// Database connection
include("../connect.php");
session_start();

if (!isset($_SESSION['admin_id'])) {
  // Redirect to the login page or handle the unauthorized access
  header("Location: adminlogin.php");
  exit();
}

if (!isset($_GET['cid'])) {
  echo "No complaint ID provided.";
  exit();
}

$adminID = $_SESSION['admin_id'];
$compID = $_GET['cid'];
$query = "
SELECT 
    comp.comp_id, 
    comp.comp_title, 
    comp.comp_details, 
    comp.comp_status,
    comp.replymsg,
    users.username, 
    users.uemail, 
    worker.worker_position 
FROM 
    comp 
JOIN 
    users ON comp.uid = users.id 
LEFT JOIN 
    worker ON comp.assign_to = worker.wid 
WHERE 
    comp.comp_id = '$compID'
";

$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No complaint found with the provided ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container-Complain">
    <div class="Complain-detail">
        <div class="comp-form">
            <h3>Complaint Title: <?= strtoupper($row['comp_title']); ?></h3>
            <br>
            <div>
                <label for="username"><h5>User Name: <?= $row['username']; ?></h5></label>
            </div>
            <br>
            <div>
                <h5>Email: <?= $row['uemail']; ?></h5>
            </div>
            <br>
            <div>
                <h5>Complaint Details: <?= $row['comp_details']; ?></h5>
            </div>
            <br>
            <div>
                <h5>Status: <?= $row['comp_status'] == "1" ? "Replied" : ($row['comp_status'] == "0" ? "Unread" : "Unknown"); ?></h5>
            </div>
            <br>
            <div>
                <h5>Assigned To: <?= isset($row['worker_position']) ? ucfirst($row['worker_position']) : 'Not assigned yet.'; ?></h5>
            </div>
            <br>
            <div>
                <h5>Response: <?= isset($row['replymsg']) ? $row['replymsg'] : 'No response yet.'; ?></h5>
            </div>
            <br>
            <div>
                <a href="admin.php"><button type="button" class="btn btn-primary" name="backbtn">Back</button></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
