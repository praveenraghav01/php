<?php
session_start();
if (!isset($_SESSION['Name'])) 
{
$_SESSION['destination']=$_SERVER["REQUEST_URI"];
header("Location: index.php");
}

?>