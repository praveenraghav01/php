<!doctype html>

<html>
<head>
  <title>love-e-connect</title>

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
</head>
<body unresolved>
 <!--Header Image-->
      <paper-progress></paper-progress>

   <div id="img_header_location">
  <!--<a href="#"><img src="images/5.png" alt="Love E Connect" id="img_size"></a>
   --><iron-icon icon="favorite" height=></iron-icon><h style="font-family: Roboto, sans-serif;font-size:30px;"><b>LOVE E CONECT</b></h>
   </div>
   <!------------------------------------------------------------------------->
   
   <!--Tab Menu-->
<!--   <paper-tabs selected="0">-->
<!--  <paper-tab>Home</paper-tab>-->
<!--  <paper-tab>Developer</paper-tab>-->
<!--  <paper-tab>Books</paper-tab>-->
<!--  <paper-tab>About Us</paper-tab>-->
<!--  <paper-tab href="signup.html">Sign Out</paper-tab>-->
<!--</paper-tabs>-->


<paper-tabs selected="1">
  <paper-tab link>
    <iron-icon icon="home"></iron-icon>
    <a href="index.php" class="horizontal center-center layout">Home</a>
  </paper-tab>
  <paper-tab link>
    <iron-icon icon="face"></iron-icon>
    <a href="team.php" class="horizontal center-center layout">About Us</a>
  </paper-tab>
  <paper-tab link>
  <iron-icon icon="account-circle"></iron-icon>
    <a href="signup.php" class="horizontal center-center layout">Sign Up</a>
  </paper-tab>
  
</paper-tabs>




 <paper-material id="cont" elevation="5">
  <p>LOVE E CONNECT&copy;2015</p>
</paper-material>



  <script src="main.js"></script>

</body>
</html>

