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
$email=$_SESSION['email'];	
$sql="UPDATE loveeconnect SET log = 0 WHERE email='$email'";
$result = $conn->query($sql);
 $sql="UPDATE `loveeconnect` SET `active` = NOW() WHERE email = '$email' ";
  $result = $conn->query($sql);
  
//$result=mysqli_query($conn,$sql);
// remove all session variables
session_unset();
// destroy the session
session_destroy();
echo "<script>location.replace(\"index.php\")</script><br>";
}
?>