<?php
session_start();
include "connect.php";

if (!isset($_SESSION['id'])) {
    echo "<script>
            alert('Please login first');
            window.location.href = 'login.php';
          </script>";
    exit();
}

$id = $_SESSION['id'];
$uemail = $_SESSION['uemail']; // Fetch email from session

$title = $_POST['title'];
$description = $_POST['description'];

// Prepare SQL statement to prevent SQL injection
$sql = "INSERT INTO comp (uid, email, comp_title, comp_details) VALUES (?, ?, ?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("isss", $id, $uemail, $title, $description);

if ($stmt->execute()) {
    echo "<script>
            window.location.href = 'thankyou.php';
          </script>";
} else {
    echo json_encode(array('success' => false));
    echo "Error: " . $stmt->error;
}

// Optionally, retrieve the last row to find the new ID, if needed
$last_row = mysqli_query($connect, "SELECT * FROM comp ORDER BY comp_id DESC LIMIT 1");
if (mysqli_num_rows($last_row) != 0) {
    $row = mysqli_fetch_assoc($last_row);
    $new_id = $row['comp_id'] + 1; // Assuming comp_id is the primary key
}

$stmt->close();
$connect->close();
?>
