<?php
include "connect.php";


$sql = "SELECT title, complain FROM complaints";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
            <a href="index.html">Home</a>
        </div>
    </header>
    <div class="container">
        <header>
            <h1>Notifications</h1>
        </header>
        <main>
            <ul>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["title"]. ": " . $row["complain"]. "</li>";
                    }
                } else {
                    echo "0 results";
                }
                $connect->close();
                ?>
            </ul>
        </main>
    </div>
</body>
</html>
