<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="header">
        <h1 class="admin-title">Admin</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <div class="container-Complain">
        <div class="Complain-detail">
            <form id="complaintForm">
                <h3>Complain title:</h3>
                <h5>Username:</h5>
                <h5>Email:</h5>
                <h5>Complain details:</h5>
                <textarea id="description" name="description" cols="60" rows="10" required></textarea>
            <div class="dropdown">
                <label for="worker">worker:</label>
                <select name="worker" id="worker">
                  <option value="Manager">Manager</option>
                  <option value="Staff">Staff</option>
                  <option value="Supervisor">Supervisor</option>
                 
                </select>
                <br><br>
            </div>
            <div>
                <button type="submit" class="action-btn">Submit </button>
                <a href="admin.php"><button type="button" class="btn btn-primary"name="backbtn">Back</button></a>
            </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('complaintForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const description = document.getElementById('description').value.trim();

            if (description === "") {
                alert('Please fill in the information.');
                return;
            }

            fetch('/submit_complaint', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ description }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('description').value = '';
                    window.location.href = 'Response.html';
                } else {
                    alert('Failed to Response.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error submitting complaint.');
            });
        });
    </script>
</body>
</html>
