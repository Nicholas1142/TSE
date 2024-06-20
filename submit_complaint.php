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

    $last_row = mysqli_query($connect, "select * from comp order by comp_id desc limit 1");
    if(mysqli_num_rows($last_row)!=0)
    $row = mysqli_fetch_assoc($last_row);

    $new_id = $row['wid']+1;

    $stmt->close();
    $connect->close();
?>
