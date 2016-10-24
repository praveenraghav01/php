<?php
 session_start();
include "profile.php";

if($_SERVER['REQUEST_METHOD']=='POST') {
    //$id = $_GET['id'];
    $email=$_SESSION['email'];

    $con = mysqli_connect('localhost', 'root', '', 'raghav') or die('Unable To connect');

    $sql = "SELECT image FROM loveeconnect WHERE email='$email' ";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    mysqli_close($con);

    header("Content-type: image/jpeg");
    echo $row['image'];
}