<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$servername = "localhost";
$username = "root";
$password = "";
$database = "raghav";
//create connection
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
{
	die("connection failed:" .$conn->connect_error);

}
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$city=$_POST['city'];
$state=$_POST['state'];

$sql="INSERT INTO loveeconnect(username,password,email,gender,dob,city,state) 
	                VALUES ('$username','$password','$email','$gender','$dob','$city','$state')";
if ($conn->query($sql) === TRUE) 
{
     session_start();
     $_SESSION["Name"] = $_POST["username"];
     $_SESSION["email"] = $_POST['email'];
     $_SESSION["dob"] = $_POST['dob'];
     $_SESSION['city'] = $_POST['city'];
     $_SESSION['state'] = $_POST['state'];
     $sql="UPDATE `loveeconnect` SET `log` = 1 WHERE email ='$email'";
     $result = $conn->query($sql);
     $result=mysqli_query($conn,$sql);
     $sql="UPDATE `loveeconnect` SET `active` = NOW() WHERE email = '$email' ";
     $result = $conn->query($sql);
     header('location:profile.php');

} else 
{
	echo  "<script>alert(\"Email id already exists!!!!\")</script><br>"; 
	echo "<script>location.replace(\"signup.php\")</script><br>";
    echo "<script>Error: </script>" . $sql . "<script><br></script>" . $conn->error;
}
}
