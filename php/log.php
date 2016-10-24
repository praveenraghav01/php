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
public function verify1($email, $password,$chek_value) 
{
$email=$_POST['email'];
$password=$_POST['password'];
$result=mysql_query("SELECT * from love-e-connect where Email='$email'") ;
while($row1= mysql_fetch_array($result))
{
$pwd=$row1['Password'];
if($password==$pwd)
{
$this->sessionverify();
mysql_query("UPDATE love-e-connect SET log = 1 WHERE email ='$email'");
if($chek_value)
{
$this->set_cookie();
}
echo  "<script>alert(\"login successful\")</script><br>"; 
//echo "<script>location.replace(\"$_SESSION[destination]\")</script><br>";
header("Location: profile.php");
break; 
}
else
{
echo  "<script>alert(\"Email or password doesnt match!!!!\")</script><br>"; 
echo "<script>location.replace(\"login.php\")</script><br>";
}

}
}

public function sessionverify() 
{	
$_SESSION['val'] = true;
$_SESSION['email'] = $this->email;
$_SESSION['username'] = $this->username;
$_SESSION['password'] = $this->password;
}

public function set_cookie() 
{	
setcookie("user", $this->username, time()+3600);
setcookie("pwd", $this->password, time()+3600);
}

public function destroy_cookie() 
{	
setcookie("user", $this->username, time()-3600);
setcookie("pwd", $this->password, time()-3600);
}

public function sessiondestroy() 
{	
mysql_query("UPDATE love-e-connect SET log = 0 WHERE email='$email'");
unset($_SESSION['username']);
session_destroy();
$_SESSION['val']=false;

echo "<script>location.replace(\"login.php\")</script><br>";
}

public function forgot_pwd($email) 
{
	$result = mysql_query("SELECT * from love-e-connect where email='$email'");
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
		//echo "<script>location.replace(\"login.php\")</script><br>";
	}
}




}
