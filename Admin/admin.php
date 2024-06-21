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

$result = mysqli_query($connect, "select * from comp");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
   

<?php include 'nav.php'; ?>




    <div class="list-complain">
        <header>
            <h2 class="small title">COMPLAIN LIST</h2>
        </header>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserID</th>
                    <th>Email</th>
                    <th>Complain title</th>
                    <th>Status</th>
                    <th>Assign to</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
                if(mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
            <tbody>
                        <tr>
                            <td><?= $row['comp_id'] ?></td>
                            <td><?= $row['uid'] ?></td>
                            <td><?php if(!empty($row['email'])) {echo $row['email'];} 
                                else {echo "-";}?></td>
                            <td><?= $row['comp_title'] ?></td>
                            <td><?php if($row['comp_status'] == "1"):?>
                            <span class="badge bg-label-success me-1">Replied</span>
                            <?php elseif($row['comp_status'] == "0"):?>
                            <span class="badge bg-label-info me-1">Unread</span>
                            <?php else:?>
                            -
                            <?php endif;?></td>
                            
                            <?php
                            $result2 = mysqli_query($connect, "select * from worker where '".$row['assign_to']."' = wid");
?>
                            <td>
                            <?php
                            while($row2 = mysqli_fetch_assoc($result2)){
                                if(!empty($row['assign_to']))
                                    {echo ucfirst($row2['worker_position']);}
                                else {?> - <?php }
                                } ?>
                            </td>
                          
                            <td><a class='action-btn' href="Response.php?cid=<?php echo $row['comp_id'];?>">Response</a></td>
                        </tr>
            </tbody>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>No complaints found</td></tr>";
                }
                $connect->close();
                ?>
        </table>
    </div>
</body>
</html>
