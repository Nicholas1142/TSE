<?php

$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="complain";
$connect=mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);


if(!$connect)
{
    die("Connection failed: " . mysqli_connect_error());
}