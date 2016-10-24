<?php
require "checklogin.php";
      include "log.php";
      //include "index1.php";
   if (isset($_SESSION['Name']) &&isset($_SESSION['id'])  && isset($_SESSION['email']) && isset($_SESSION['dob']) && isset($_SESSION['city']) && isset($_SESSION['state']))
?>

<!doctype html>

<html>
<head>
  <title>love-e-connect</title>
<?php
$ses=null;

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("C:/xampp/htdocs/chat/freichat/hardcode.php")){

               require "C:/xampp/htdocs/chat/freichat/hardcode.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }

       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost/chat/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://localhost/chat/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  
  <script src="bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
  <script src="../../webcomponentsjs/webcomponents-lite.js"></script>
  <link rel="import" href="bower_components/iron-icons/iron-icons.html">
  <link rel="import" href="bower_components/paper-toolbar/paper-toolbar.html">
   <link rel="import" href="bower_components/font-roboto/roboto.html"> 
  <link rel="import" href="bower_components/paper-button/paper-button.html">
  <link rel="import" href="bower_components/paper-checkbox/paper-checkbox.html">
  <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
  <link rel="import" href="bower_components/paper-fab/paper-fab.html">
  <link rel="import" href="bower_components/paper-tabs/paper-tabs.html">
  <link rel="import" href="bower_components/paper-toast/paper-toast.html">
  <link rel="import" href="bower_components/paper-shadow/paper-shadow.html">
  <link rel="import" href="bower_components/paper-styles/color.html">
  <link rel="import" href="bower_components/paper-input/paper-input.html">
  <link rel="import" href="bower_components/paper-card/paper-card.html">
  <link rel="import" href="bower_components/paper-toggle-button/paper-toggle-button.html">
  <link rel="import" href="bower_components/paper-header-panel/paper-header-panel.html">
  <link rel="import" href="bower_components/paper-ripple/paper-ripple.html">
  <link rel="import" href="bower_components/paper-menu-button/paper-menu-button.html">
  <link rel="import" href="bower_components/paper-menu/paper-menu.html">
  <link rel="import" href="bower_components/paper-item/paper-item.html">
  <link rel="import" href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
  <link rel="import" href="bower_components/paper-progress/paper-progress.html">
  <link rel="import" href="bower_components/paper-listbox/paper-listbox.html">
  <link rel="import" href="bower_components/iron-form/iron-form.html">
 
  <link rel="stylesheet" href="styles.css">
  <style is="custom-style">
    paper-toolbar + paper-toolbar {
      margin-top: 20px;
    }
    paper-toolbar.red {
      --paper-toolbar-background: #0099FF;
    }
    .spacer {
      @apply(--layout-flex);
    }
      .avatar {
      height: 150px;
      width: 150px;
      border-radius: 75px;
      box-sizing: border-box;
      background-color: #DDD;
    }

  </style>

</head>
<body unresolved>
<!--<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$email=$_SESSION['email'];
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','raghav') or die('Unable To connect');
    $sql = "insert into loveeconnect (image) values(?) ";
 
    $stmt = mysqli_prepare($con,$sql);

   mysqli_stmt_bind_param($stmt, "s",$img);
   mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Successfullly UPloaded';

    }else{
    	 echo "<script>Error: </script>" . $sql . "<script><br></script>" . $conn->error;

        $msg = 'Could not upload';
    }
  
    mysqli_close($con);
}
?>-->
  <paper-toolbar id="title" class="red">
    
    <span class="title">LOVE E CONNECT</span>
    <paper-input label="Search" id="search" type="text" ></paper-input><paper-icon-button icon="search"></paper-icon-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <paper-icon-button icon="question-answer"></paper-icon-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <paper-icon-button icon="settings"></paper-icon-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
    <paper-icon-button icon="account-circle"></paper-icon-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  </paper-toolbar>
  <paper-card id="profile" image="images/a9.jpg" elevation="5">
<!--src="getImage.php?email=<?php echo $row['image'];?>" -->
  <img class="avatar" id="pic" src="images/mem2.png" alt="No Image">
   <paper-icon-button icon="create"></paper-icon-button>
      <div  class="card-content">
      NAME:<?php echo $_SESSION['Name']; ?><br>
      EMAIL:<?php echo $_SESSION['email'];?><br>
      DOB:<?php echo $_SESSION['dob'];?><br>
      STATE:<?php echo $_SESSION['state'];?><br>
      CITY:<?php echo $_SESSION['city'];?><br>
      <br>
        <form action="" method="post" enctype="multipart/form-data">
<input type="file" name="image" id="image" size="40">
<input name="" type="submit" value="upload" />
</form></div>
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
 $email=$_SESSION['email'];
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
    mysql_query("UPDATE loveeconnect SET `image` =('".$newname."') WHERE email='$email'");
  }
  //Display image
  $rs=mysql_query("select image from loveeconnect where email='$email'");
  if($rs)
    while($row=mysql_fetch_array($rs))
    {
     ?>
     <img width="150" src="<?php echo $row['image'];?>"><br>
     <?php 
    }
}
?><form action="logout.php" method="post">
      <div class="card-actions">
      <input type="submit" value="logout"></input>
       <!-- <paper-button>No</paper-button>
        <paper-button>Yes</paper-button>-->
      </div>
      </form>
    
 </paper-card>



 <?php

$option=$_GET['option'];
if($option!=2)
{
$option=1;
?> 
   
     <paper-card id="msge"elevation="3">
 
      <div  class="card-content">
         <br> <div  id="name">
            	<div class="chat_head"> Chat Box</div>
        
    <div class="msg_box" >
	<div class="msg_head"></div>
	
		<div class="msg_body">
			<div class="msg_a"> <div class="message_box"></div>	</div>
			<!--<div class="msg_b"> <div class="message_box"></div></div>-->
			<div class="msg_push"></div>
		</div>
	<div class="user_info">
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" /> 
    </div>
    </div></div></div>
      <div id="msg" class="card-actions">
        <paper-icon-button icon="favorite" title="favorite"></paper-icon-button>
        <paper-icon-button icon="bookmark" title="bookmark"></paper-icon-button>
        <paper-icon-button icon="cloud-upload" title="cloud-upload"></paper-icon-button>
        <paper-tab link ><a href="profile.php?option=2">change Password</a></paper-tab>
      </div>
      </div>
      </div>
    </paper-card>
    <?php
}
?>
<?php
if($option==2)
{
?>
<paper-card id="msge"elevation="3">
      <div  class="card-content">
        <div id="container"> 
  Change Password
        
        <form action="change.php?" method="post">
        <paper-input label="Email" required auto-validate error-message="Invalid input!" name="email" type="email"></paper-input>
        <paper-input label="Old Password" required auto-validate error-message="Invalid input!" name="old" type="password"></paper-input>
        <paper-input label="New Password" required auto-validate error-message="Invalid input!" name="new" type="password"></paper-input>
        <paper-input label="Conform Password" required auto-validate error-message="Invalid input!" name="cnew" type="password"></paper-input>
        
        <div>
        <input type="submit" name="submit" value="CHANGE"/>&nbsp&nbsp
        <input type="reset" name="reset" value="RESET"/>
        </div>
</form>
</div>

      <div id="msg" class="card-actions">
        <paper-icon-button icon="favorite" title="favorite"></paper-icon-button>
        <paper-icon-button icon="bookmark" title="bookmark"></paper-icon-button>
        <paper-icon-button icon="cloud-upload" title="cloud-upload"></paper-icon-button>
        <paper-tab link ><a href="profile.php">chat</a></paper-tab>
   
      </div>
      </div>
      </div>
    </paper-card>

<?php
}
?>



    <paper-card id="online" elevation="3">
      <div  class="card-content">
     <b> Online Friends</b><br><br><br>
       <?php
      include "online.php";
       ?>
       
        
      </div>
      <div id="chat_b" class="card-actions">
        <paper-icon-button icon="favorite" title="favorite"></paper-icon-button>
        <paper-icon-button icon="bookmark" title="bookmark"></paper-icon-button>
        <paper-icon-button icon="cloud-upload" title="cloud-upload"></paper-icon-button>
      </div>
    </paper-card>
 <paper-material id="cont" elevation="5">
  <p>LOVE E CONNECT&copy;2015</p>
</paper-material>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>
  
   <script src="main.js"></script>

</body>
</html>


