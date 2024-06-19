<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
</head>
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
        let countdown = 5;
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
