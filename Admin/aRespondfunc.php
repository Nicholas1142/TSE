<?php
include "../connect.php";
session_start();

$cid = $_GET['cid'];
$description = $_POST['description'];
$worker = $_POST['worker'];

$update = mysqli_query($connect,"update comp set comp_status = '1', assign_to = '$worker' where comp_id = $cid");
                if($update)
                {
                    $_SESSION['msg'] = "Message sent.";
                    header("Location: Replysuccessful.php?cid=$cid");
                    exit(0);
                }
                else
                {
                    $_SESSION['errormsg'] = "Cannot send. Try again.";
                    header("Location: Response.php?cid=$cid");
                    exit(0);
                }
?>