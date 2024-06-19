<?php
// Database connection
include("../connect.php");
session_start();

$last_row = mysqli_query($connect, "select * from worker order by wid desc limit 1");
if(mysqli_num_rows($last_row)!=0)
$row = mysqli_fetch_assoc($last_row);

$new_id = $row['wid']+1;

?>

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
        <h1 class="admin-title">Add New Worker</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <div class="container-Complain">
        <div class="Complain-detail">
            <form action="aAddworkerFunc.php" id="complaintForm" method="POST">                
                <h3>Worker ID: <?=$new_id?></h3>

                <div>
                    <label for="position"><h5>Position:</h5></label><br>
                    <input type="text" id="position" name="position"><br>
                </div>

                <div>
                    <input type="hidden" name="newid" value="<?=$new_id;?>">
                    <button type="submit" class="action-btn">Submit </button>
                    <a href="aAllworker.php"><button type="button" class="btn btn-primary"name="backbtn">Back</button></a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
