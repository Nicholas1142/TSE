<?php
// Database connection
include("../connect.php");
session_start();

$result = mysqli_query($connect, "select * from comp 
join users on comp.uid = users.id
where comp_id = '".$_GET['cid']."' ");

if(mysqli_num_rows($result)!=0)
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <h1 class="admin-title">Admin</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <!-- Dismissible Alerts -->
    <?php if(isset($_SESSION['msg'])):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                This message has been replied.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['msg']);?>

                <?php elseif(isset($_SESSION['errormsg'])) :?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                Failed to reply to this message.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>        
                <?php unset($_SESSION['errormsg']); ?>
                <?php endif;?>
    <!--/ Dismissible Alerts -->

    <div class="container-Complain">
        <div class="Complain-detail">
            <form action="aRespondFunc.php?cid=<?=$row['comp_id'];?>" id="complaintForm" method="POST">
                <h3>Complain title:</h3>
                <div>
                    <label for="username"><h5>User Name:<?=$row['username']?></h5></label>
                </div>

                <div>
                    <h5>Email:<?=$row['email']?></h5>
                </div>

                <div>
                    <h5>Complain details: <?=$row['comp_details']?></h5>
                </div>

                <div>
                    <h5>Response:</h5>
                    <textarea id="description" name="description" cols="60" rows="10" required></textarea>
                    
                    <div class="dropdown">
                        <label for="worker">Assign to:</label>
                        <select name="worker" id="worker">
                            <option value="Manager">Manager</option>
                            <option value="Staff">Staff</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                        <br><br>
                    </div>
                </div>

                <div>
                    <input type="hidden" name="cid" value="<?=$row['comp_id'];?>">
                    <button type="submit" class="action-btn">Submit </button>
                    <a href="admin.php"><button type="button" class="btn btn-primary"name="backbtn">Back</button></a>
                </div>
            </form>
        </div>
    </div>
    <!--
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
                    window.location.href = 'Response.php';
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
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
