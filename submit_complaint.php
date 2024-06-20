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

    $title = $_POST['title'];
    $description = $_POST['description'];

    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO comp (uid, comp_title, comp_details) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("iss", $id, $title, $description);

    if ($stmt->execute()) {
        echo "<script>
                alert('Complaint submitted successfully!');
                window.location.href = 'thankyou.php';
            </script>";
    } else {
        echo json_encode(array('success' => false));
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connect->close();
?>
