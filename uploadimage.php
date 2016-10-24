<?Php
if(isset($_REQUEST['submit'])){

if(!empty($_FILES['photo']['name']))//input type="file" name="photo"
{
$error="";
$path="../upload/slider"."slider1".'.jpg';
if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){

}
else{
$error=$error."image not uploaded";
}
}
else{
echo $_FILES['photo']['name'];
}
}

?>