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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
            <a href="notifications.php" id="notifications"><i class="fas fa-bell"></i></a>
            <a href="logout.php" id="logout">Logout</a>
        </div>
    </header>
    <div class="container">
        <header>
            <h1>Welcome User</h1>
        </header>
        <main>
            <h2>Register a Complaint</h2>
            <form id="complaintForm" method="post" action="submit_complaint.php">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <input type="hidden" name="newid" value="<?=$new_id;?>">
                <button type="submit" id="submit-btn">Submit Complaint</button>
            </form>
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

        document.getElementById('notifications').addEventListener('click', function() {
            window.location.href = 'notifications.php';
        });

        document.getElementById('submit-btn').addEventListener('click', function(event) {
            var confirmation = confirm("Are you sure you want to submit?");
            if (!confirmation) {
                event.preventDefault();
            }
            });

        function showErrorToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast error';
            toast.innerText = message;
            document.body.appendChild(toast);
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
                document.body.removeChild(toast);
            }, 3000);
        }
    </script>
</body>
</html>
