<?php
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
        $email=$_SESSION["email"];
        $sql="SELECT username,id FROM loveeconnect where `log` = 1 and email !='$email' ";
        $result = $conn->query($sql);
        $result=mysqli_query($conn,$sql);
        $friends = array();
      static $userid2 = array();
       if ($result)
       {
       while($row = $result->fetch_assoc())
       {
        $friends['username'] = $row['username'];
        $userid2['id'] = $row['id'];
        foreach (array_values($userid2) as $i => $value) {
  echo "$i: $value\n";
}
        echo '<span><a href="#"> &nbsp;&nbsp;&nbsp;' .$friends['username'].'&nbsp;&nbsp;&nbsp;'. $userid2['id'].'</a></span><img src="images/dot.png">';
        echo "<br><br>";
     }
   }
          ?>
