<?php
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
$email=$_POST['email'];
$sql="SELECT * from loveeconnect where email='$email' ";
$result = $conn->query($sql);
$result=mysqli_query($conn,$sql);
if ($result->num_rows==1)
	{
	
    while($row = mysqli_fetch_array($result))
   {	
		echo  "<script>alert(\"Your username and password have been emailed to you\")</script><br>"; 
		$username = $row['username'];
		$email = $row['email'];
		$password = $row['password'];
		$msg  = "Your login information is:\n\n";
		$msg .= "Username: $username\n";
		$msg .= "Email: $email\n";
		$msg .= "Password: $password\n";
		mail($email, "Login Information", $msg, "From:rockingpraveen96@gmail.com");
		echo "<script>location.replace(\"index.php\")</script><br>";
	}
}
else
{
	echo  "<script>alert(\"We're sorry, but we could not find a user with that email address\")</script><br>"; 
	echo "<script>location.replace(\"index.php?option=2\")</script><br>";
}
}
?>