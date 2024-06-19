<?php
// Database connection
include("../connect.php");

// Fetch data from database
/*
$sql = "SELECT comp_id, uid, email, comp_title, comp_status, assign_to FROM comp";
$result = $connect->query($sql);
*/

$result = mysqli_query($connect, "select * from comp 
join users on comp.uid = users.id");
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
    <div class="header">
        <h1 class="admin-title">Admin Dashboard</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <div class="list-complain">
        <header>
            <h2 class="small title">COMPLAIN LIST</h2>
        </header>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Complain title</th>
                    <th>Status</th>
                    <th>Assign to</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $row['comp_id'] ?>
                            <td><?= $row['username'] ?>
                            <td><?php if(!empty($row['email'])) {echo $row['email'];} else {echo "-";}?>
                            <td><?= $row['comp_title'] ?>
                            <td><?= $row['comp_status'] ?>
                            <td><?php if(!empty($row['assign_to'])) {echo $row['assign_to'];} else {echo "-";}?>
                            <td><a class='action-btn' href="Response.php?cid=<?php echo $row['comp_id'];?>">Response</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>No complaints found</td></tr>";
                }
                $connect->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
