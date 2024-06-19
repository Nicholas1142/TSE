<?php
include "connect.php";

$sql = "SELECT comp_id, comp_title, comp_details FROM comp";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
            <a href="index.php">Home</a>
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
                        <th>Complaint ID</th>
                        <th>Title</th>
                        <th>Details</th>
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
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No complaints found.</td></tr>";
                    }
                    $connect->close();
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
