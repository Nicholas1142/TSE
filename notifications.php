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
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>
            alert('User not found');
            window.location.href = 'login.php';
          </script>";
    exit();
}

$sql = "SELECT comp_id, comp_title, comp_details, comp_status, replymsg FROM comp WHERE uid = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
            <a href="index.php">Add New</a>
            <a href="logout.php" id="logout">Logout</a>
        </div>
    </header>
    <div class="container">
        <header>
            <h1>Notifications</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["comp_id"] . "</td>";
                            echo "<td>" . $row["comp_title"] . "</td>";
                            echo "<td>" . $row["comp_details"] . "</td>";
                            echo "<td>";
                            if($row['comp_status'] == "1") {
                                echo "<span class='badge bg-label-success me-1'>Close case</span>";
                            } elseif($row['comp_status'] == "0") {
                                echo "<span class='badge bg-label-info me-1'>Unread</span>";
                            }
                            echo "</td>";
                            echo "<td>" . $row["replymsg"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No results</td></tr>";
                    }
                    $connect->close();
                    ?>
                </tbody>
            </table>
        </main>
    </div>
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Do you want to log out?')) {
                alert('Logged out successfully.');
                window.location.href = 'login.php';
            }
        });

        document.getElementById('Add New').addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    </script>
</body>
</html>
