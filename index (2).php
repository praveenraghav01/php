<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>

<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','raghav') or die('Unable To connect');
    $sql = "insert into images (image) values(?)";

    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly UPloaded';
    }else{
        $msg = 'Could not upload';
    }
  
    mysqli_close($con);
}
?>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
 //$id = (int) $_GET["id"]; 
    echo $msg;
    //echo "\n<IMG SRC=\"getimage.php?id=$id\" />";
    $image_id = mysqli_insert_id() ;
  
    printf("\n<br>Last inserted record has id %d\n",$image_id);
    
    echo "\n<BR><BR>And The Photo is:";
    echo "\n<IMG SRC=\"getimage.php?id=$image_id\" />";
    



?>
<img src="getImage.php?id=16" />


</body>
</html>