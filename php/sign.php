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

$result=mysql_query("INSERT INTO love-e-connect (username,password,email,gender,dob,city,state,log) 
	                VALUES ('$username','$password','$email','$gender','$dob','$city','$state',1)") ;
if($result!=0)
{
header('location: profile.php');
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}