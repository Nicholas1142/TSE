<?php
// Database connection
include("../connect.php");

$newid = $_POST['newid'];
$position = $_POST['position'];

// Check if the position already exists in the database
$existingPositionQuery = mysqli_query($connect, "SELECT worker_position FROM worker WHERE worker_position = '$position'");
if (mysqli_num_rows($existingPositionQuery) > 0) {
    // position already exists, display an error message
    ?>
    <script type="text/javascript">
        alert("Position already exists. Please enter a different position.");
    </script>
    <?php
    header("refresh:0.1; url=aAddworker.php");
    exit(0);
}

$worker = mysqli_query($connect, "insert into worker ( wid, worker_position ) values ( '".$newid."','".$position."')");

if ($worker) {
    ?>
    <script type="text/javascript">
        alert("Worker Added Successfully");
    </script>
    <?php
    header("refresh:0.1; url=aAllWorker.php");
    exit(0);
} else {
    ?>
    <script type="text/javascript">
        alert("Update failed");
    </script>
    <?php
    header("refresh:0.1; url=aAddworker.php");
    exit(0);
}
?>