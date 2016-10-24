<?php
 session_start();

include "profile.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_SESSION['email'];
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','raghav') or die('Unable To connect');

    $sql = "insert into loveeconnect (image) values(?) where email='$email' ";

    $stmt = mysqli_prepare($con,$sql);

    //mysqli_stmt_bind_param($stmt, "s",$img);
    //mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        header('Location:  profile.php?success');

    }else{
 echo "<script>Error: </script>" . $sql . "<script><br></script>" . $conn->error;

        header('Location:  profile.php?failure');
    }
    mysqli_close($con);
}else{
    header('Location: profile.php');
}


