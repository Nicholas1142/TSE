<?php
// Database connection
include("../connect.php");
session_start();

$adminID = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin WHERE admin_id = '$adminID'";
$result = mysqli_query($connect, $sql);
if (!isset($_SESSION['admin_id'])) {
  // Redirect to the login page or handle the unauthorized access
  header("Location: adminlogin.php");
  exit();
}

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
 

<?php include 'nav.php'; ?>

    <div class="container-Complain">
        <div class="Complain-detail">
            <form action="aAddworkerFunc.php" id="complaintForm" method="POST">   
                
            <div class="comp-form">

            <h3>Worker ID: <?=$new_id?></h3>
<br>
                <div class="position">
                    <label for="position"><h5>Position:</h5></label>
                    <input type="text" id="position" name="position"><br>
                </div>
            
            </div>
                

                <div>
                    <input type="hidden" name="newid" value="<?=$new_id;?>">
                    <button type="submit" class="action-btn">Add </button>
                    <a href="aAllworker.php"><button type="button" class="btn btn-primary"name="backbtn">Back</button></a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
