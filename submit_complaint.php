<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO complaints (title, complain) VALUES ('$title', '$description')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success' => true));
    header('Location: thankyou.php');
} else {
    echo json_encode(array('success' => false));
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
