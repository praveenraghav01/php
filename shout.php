<?php
####### db config ##########
$db_username = 'root';
$db_password = '';
$db_name = 'raghav';
$db_host = 'localhost';
####### db config end ##########
session_start();
if($_POST)
{
	//connect to mysql db
	$sql_con = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	
	if(isset($_POST["message"]) &&  strlen($_POST["message"])>0)
	{
		//sanitize user name and message received from chat box
		//You can replace username with registerd username, if only registered users are allowed.
		$userid1= $_SESSION['id']; 
		$username = filter_var(trim($_SESSION['Name']),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$user_ip = $_SERVER['REMOTE_ADDR'];
		

		//insert new message in db
		if(mysqli_query($sql_con,"INSERT INTO shout_box(userid1, message, ip_address) value('$userid1','$message','$user_ip')"))
		{
			$msg_time = date('h:i A M d',time()); // current time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$username.'</span><span class="message">'.$message.'</span></div>';
		}
		
		// delete all records except last 10, if you don't want to grow your db size!
		mysqli_query($sql_con,"DELETE FROM shout_box WHERE id NOT IN (SELECT * FROM (SELECT id FROM shout_box ORDER BY id DESC LIMIT 0, 10) as sb)");
	}
	elseif($_POST["fetch"]==1)
	{
		$results = mysqli_query($sql_con,"SELECT userid1, message, date_time FROM (select * from shout_box ORDER BY date_time ASC LIMIT 10) shout_box ");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["date_time"])); //message posted time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$_SESSION['Name'] .'</span> <span class="message">'.$row["message"].'</span></div>';
		}
	}
	else
	{
		header('HTTP/1.1 500 Are you kiddin me?');
    	exit();
	}
}