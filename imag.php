<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="image" id="image" size="40">
<input name="" type="submit" value="upload" />
 
</form>
</body>
</html>
<?php 
$con = mysql_connect('localhost', 'root', ''); //Update hostname
mysql_select_db("raghav", $con); //Update database name
 
define ("MAX_SIZE","1000"); 
function getExtension($str)
{
   $i = strrpos($str,".");
   if (!$i) { return ""; }
   $l = strlen($str) - $i;
   $ext = substr($str,$i+1,$l);
   return $ext;
}
 
$errors=0;
$image=$_FILES['image']['name'];
if ($image) 
{
  $filename = stripslashes($_FILES['image']['name']);
  $extension = getExtension($filename);
  $extension = strtolower($extension);
  if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
    && ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
    && ($extension != "PNG") && ($extension != "GIF")) 
  {
    echo '<h3>Unknown extension!</h3>';
    $errors=1;
  }
  else
  {
    $size=filesize($_FILES['image']['tmp_name']);
 
    if ($size > MAX_SIZE*1024)
    {
      echo '<h4>You have exceeded the size limit!</h4>';
      $errors=1;
    }
 
    $image_name=time().'.'.$extension;
    $newname="images/".$image_name;
 
    $copied = copy($_FILES['image']['tmp_name'], $newname);
    if (!$copied) 
    {
      echo '<h3>Copy unsuccessfull!</h3>';
      $errors=1;
    }
    else echo '<h3>uploaded successfull!</h3>';
 
    mysql_query("insert into file_tbl (path) values('".$newname."')");
  }
 
  //Display image
  $rs=mysql_query("select * from file_tbl");
  if($rs)
    while($row=mysql_fetch_array($rs))
    {
     ?>
     <img width="150" src="<?php echo $row['path'];?>"><br>
     <?php 
    }
}
?>