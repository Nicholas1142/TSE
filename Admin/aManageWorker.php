<?php
// Database connection
include("../connect.php");

$result = mysqli_query($connect, "select * from worker");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">

    <script type="text/javascript">

    function confirmation()
    {
      answer = confirm("Do you want to delete this worker?");
      return answer;
    }

    </script>
</head>
<body>
    <div class="header">
        <h1 class="admin-title">Worker Management</h1>
        <a href="" class="logout-btn">Logout</a>
    </div>

    <div class="list-complain">
        <header>
            <h2 class="small title">WORKER LIST</h2>
        </header>
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
                if(mysqli_num_rows($result)>0) {
                    while($row = $result->fetch_assoc()) {
                    ?>
            <tbody>
                        <tr>
                            <td><?= $row['wid'] ?></td>
                            <td><?= ucfirst($row['worker_position']) ?></td>
                            <td><a class='action-btn' href="aEditworker.php?wid=<?php echo $row['wid'];?>">Edit</a>
                            <a class='action-btn' href="aEditworker.php?wid=<?php echo $row['wid'];?>" onclick="return confirmation();">Delete</a></td>

                        </tr>
            </tbody>
            <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>No Worker found</td></tr>";
                }
                $connect->close();
                ?>
        </table>
    </div>
</body>
</html>