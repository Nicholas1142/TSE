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
    <link rel="stylesheet" href="admin1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include 'nav.php'; ?>

    <div class="container-Complain">
        <div class="Complain-detail">
            <form action="aRespondFunc.php?cid=<?=$row['comp_id'];?>" id="complaintForm" method="POST"> 
                
            <div class="comp-form">
            <h3>Complain Title: <?= strtoupper($row['comp_title']);?></h3>
                <br>
                <div>
                    <label for="username"><h5>User Name: <?=$row['username']?></h5></label>
                </div>
<br>
                <div>
                    <h5>Email: <?=$row['email']?></h5>
                </div>
                <br>
                <div>
                    <h5>Complain Details: <?=$row['comp_details']?></h5>
                </div>
                <br>
                <h5>Response:</h5>
            </div>
                
              
                <div>
                    
                    <br>
                    <textarea id="description" name="description" cols="60" rows="10" required maxlength="3500"></textarea>
                              
                <!--Assign to-->
                   
               
                <div class="dropdown">
                <h5>Assign To:</h5>
                <select name="worker" id="worker" required>
                    
                        <?php 
                        $sql = mysqli_query($connect, "select * from comp join worker on worker.wid = comp.assign_to where comp_id = '".$_GET['cid']."' limit 1");
                        if(mysqli_num_rows($sql)!=0){
                            while($row2 = mysqli_fetch_assoc($sql)){?>
                        
                            <option <?php if(isset($row['assign_to']))
                            {?>value = "<?= $row['assign_to'];?>" <?php }
                            else?>value="">
                            <?php if(isset($row['assign_to'])){echo ucfirst($row2['worker_position']);}?>
                            </option>
                            
                            <?php
                            $sql2 = mysqli_query($connect, "select * from worker");
                            while($row3 = mysqli_fetch_assoc($sql2)){
                                ?>
                                <option value="<?=$row3['wid']?>"><?= ucfirst($row3['worker_position']);?></option>
                            <?php
                                }
                            }
                        }
                        else{
                        $sql2 = mysqli_query($connect, "select * from worker");?>
                        <option value="">--Assign to Worker--</option>
                        <?php
                            while($row3 = mysqli_fetch_assoc($sql2)){
                            ?>
                            <option value="<?=$row3['wid']?>"><?= ucfirst($row3['worker_position']);?></option>
                            <?php
                            }
                        }
                        ?>
                        </select> 
                    <br><br>
                </div>
            
                </div>

                <div>
                    <input type="hidden" name="cid" value="<?=$row['comp_id'];?>">
                    <button type="submit" class="action-btn" id="submit-btn">Submit </button>
                    <a href="admin.php"><button type="button" class="btn btn-primary"name="backbtn">Back</button></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('submit-btn').addEventListener('click', function(event) {
            var confirmation = confirm("Are you sure you want to submit?");
            if (!confirmation) {
                event.preventDefault();
            }
            });
    </script>
</body>
</html>
