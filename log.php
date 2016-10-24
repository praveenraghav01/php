<?php
//session_start();
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
$password=$_POST['password'];
$sql="SELECT * from loveeconnect where email='$email' and password='$password' ";
$result = $conn->query($sql);
$result=mysqli_query($conn,$sql);
if ($result->num_rows==1)
 {
 //sessionverify();
 //set_cookie();
 session_start();
 while($row = $result->fetch_assoc()) 
  {
     $_SESSION["Name"] = $row["username"];
     $_SESSION["email"] = $row['email'];
     $_SESSION["dob"] = $row['dob'];
     $_SESSION['city'] = $row['city'];
     $_SESSION['state'] = $row['state'];
     $_SESSION['id'] = $row['id']; 
setcookie("user", $username, time()+3600);
setcookie("pwd", $password, time()+3600);
 }
 $sql="UPDATE `loveeconnect` SET `log` = 1 where email='$email'";
  $result = $conn->query($sql);
  //$result=mysqli_query($conn,$sql);
  $sql="UPDATE `loveeconnect` SET `active` = NOW() WHERE email = '$email' ";
  $result = $conn->query($sql);
  //$result=mysqli_query($conn,$sql);
echo  "<script>alert(\"login successful\")</script><br>"; 
//echo "<script>location.replace(\"$_SESSION[destination]\")</script><br>";
header("Location: profile.php");
break; 
}
else
{
echo  "<script>alert(\"Email or password doesnt match!!!!\")</script><br>"; 
echo "<script>location.replace(\"index.php\")</script><br>";
}
}

 function sessionverify() 
{	
$_SESSION['val'] = true;
$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
}

 function set_cookie() 
{	
setcookie("user", $username, time()+3600);
setcookie("pwd", $password, time()+3600);
}

function destroy_cookie() 
{	
setcookie("user", $username, time()-3600);
setcookie("pwd", $password, time()-3600);
}



 function forgot_pwd($email) 
{
	$result = mysql_query("SELECT * from loveeconnect where email='$email'");
	if(mysql_num_rows($result) == 0)
	{
	echo  "<script>alert(\"We're sorry, but we could not find a user with that email address\")</script><br>"; 
	echo "<script>location.replace(\"forgot.php\")</script><br>";
	}
    while($row = mysql_fetch_array($result))
   {	
		echo  "<script>alert(\"Your username and password have been emailed to you\")</script><br>"; 
		$username = $row['username'];
		$email = $row['email'];
		$password = $row['password'];
		$msg  = "Your login information is:\n\n";
		$msg .= "Username: $username\n";
		$msg .= "Email: $email\n";
		$msg .= "Password: $password\n";
		mail($email, "Login Information", $msg, "From:noreply@domain.com");
		echo "<script>location.replace(\"index.php\")</script><br>";
	}
}

