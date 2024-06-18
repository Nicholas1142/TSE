<?php
include "connect.php";


$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO complaints (title, complain) VALUES ('$title', '$description')";

if ($connect->query($sql) === TRUE) {
    echo json_encode(array('success' => true));
    header('Location: thankyou.php');
} else {
    echo json_encode(array('success' => false));
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>
