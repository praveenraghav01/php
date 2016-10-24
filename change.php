<?php
session_start();
if(isset($_POST['submit']))
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
//include "log.php";
$email=$_POST['email'];
$old_pwd=$_POST['old'];
$new_pwd=$_POST['new'];
$cnew_pwd=$_POST['cnew'];
$sql="SELECT * from loveeconnect where email='$email' ";
$result = $conn->query($sql);
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
  {
  if(!strcmp($old_pwd,$row['password'])==0)
  { 
	echo  "<script>alert(\"Wrong Old password\")</script><br>"; 
	echo "<script>location.replace(\"profile.php?option=2\")</script><br>";
  }
 else if(!strcmp($new_pwd,$cnew_pwd)==0)
  {
    echo  "<script>alert(\"Passwords dont match\")</script><br>"; 
    echo "<script>location.replace(\"profile.php?option=2\")</script><br>";
  }
 else
 {
//$sql=mysqli_query("UPDATE loveeconnect SET password = '$new_pwd' WHERE email ='$email'");
$sql="UPDATE loveeconnect SET password = '$new_pwd' WHERE email ='$email'";
$result = $conn->query($sql);
$result=mysqli_query($conn,$sql);
echo "<script>alert(\"password successfully changed\")</script><br>";
echo "<script>location.replace(\"profile.php\")</script><br>";
break; 
}
}
}
?>