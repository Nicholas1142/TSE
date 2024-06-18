<?php
// Database connection
include("connect.php");

// Fetch data from database
$sql = "SELECT comp_id, Username, Email, comp_title  FROM comp";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="header">
        <h1 class="admin-title">Admin Dashboard</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <div class="list-complain">
        <header>
            <h2 class="small title">COMPLAIN LIST</h2>
        </header>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Complain title</th>
                    <th>Status</th>
                    <th>Assign</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["comp_id"] . "</td>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["comp_title"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>" . $row["assign"] . "</td>";
                        echo "<td><a href='Response.html' class='action-btn'>Response</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No complaints found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
