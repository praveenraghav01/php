<?php
include "profile.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$email=$_SESSION['email'];
$image = $_FILES['image']['tmp_name'];
$img = file_get_contents($image);
$con = mysqli_connect('localhost','root','','raghav') or die('Unable To connect');

$sql = "insert into loveeconnect (image) values(?) where username='$email' ";
$stmt = mysqli_prepare($con,$sql);
$result = $conn->query($sql);
 mysqli_stmt_execute($stmt);

$result=mysqli_query($conn,$sql);
if ($result->num_rows==1)
 {
 	 header('Location:  profile.php?success');

    }else{

        header('Location:  profile.php?failure');
    }
}
else
{
	header('Location: profile.php');
}