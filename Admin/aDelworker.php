<?php
include "../connect.php";

        $wid = $_GET['wid'];
        $del = mysqli_query($connect, "delete from worker where wid = $wid");

        //Reset
        $reset = mysqli_query($connect, "select * from worker");
        $num = 1;

        while($row = mysqli_fetch_assoc($reset)){
                $id = $row['wid'];
                $sql = mysqli_query($connect,"update worker set wid = $num where wid = $id");

                $num++;
        }

        header("Location: aAllworker.php");
?>