<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<header class="header-bar">
        <div class="header-left">Complaint System</div>
        <div class="header-right">
        <a href="notifications.php" id="notifications"><i class="fas fa-bell"></i></a>
        <a href="logout.php" id="logout">Logout</a>
        </div>
    </header>
<body>
    <div class="container">
        <header>
            <h1>Thank You!</h1>
        </header>
        <main>
            <p class="thank-you-message">Your complaint has been submitted successfully.</p>
            <p>You will be redirected to the home page in <span id="countdown">5</span> seconds.</p>
        </main>
    </div>
    <script>
        let countdown = 3;
        const countdownElement = document.getElementById('countdown');

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown === 0) {
                clearInterval(interval);
                window.location.href = 'index.php';
            }
        }, 1000);
    </script>
</body>
</html>
