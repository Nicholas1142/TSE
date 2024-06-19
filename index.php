<?php
include "connect.php";

$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO admin (title, complain) VALUES ('$title', '$description')";

    if ($connect->query($sql) === TRUE) {
        $success = true;
        header('Location: thankyou.php');
        exit();
    } else {
        $error = true;
    }
}

$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint System</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
            <a href="#" id="notifications"><i class="fas fa-bell"></i></a>
            <a href="#" id="logout">Logout</a>
        </div>
    </header>
    <div class="container">
        <header>
            <h1>Welcome User</h1>
        </header>
        <main>
            <h2>Register a Complaint</h2>
            <form id="complaintForm" method="post" action="">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit">Submit Complaint</button>
            </form>
            <?php if ($error): ?>
                <div class="toast error show">Failed to submit complaint.</div>
            <?php endif; ?>
        </main>
    </div>
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Do you want to log out?')) {
                alert('Logged out successfully.');
                // Here you can add the actual logout logic.
            }
        });

        document.getElementById('notifications').addEventListener('click', function() {
            window.location.href = 'notifications.php';
        });
    </script>
</body>
</html>
