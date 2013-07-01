<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <title> <?php 
  if(isset($fullname)):
	echo $fullname;
  endif;
  ?> 
  | Mentors Dojo</title>
  <meta name="keywords" content="mentor,entrepreneur,startup,seattle,bellevue,kirkland,redmond,bothell,tacoma" />

    <meta name="description" content="Effective way to connect mentor and mentee through expertise." />

  <link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />

  
  <script src="js/jquery.js" type="text/javascript"></script>
 <!-- put ga tracking here-->

</head>
<body>
  <div id="main">
    <div id="header">
      <div id="header-upper" class="container">  
  <div id="logo">
   Mentors Dojo - <p id="slogan">Mentors Network</p>
  </div>

  <div id="user-navigation">
    <ul>
      <li><a href="<?php echo site_url('users/sign_in'); ?>">Login</a></li>
      <li><a href="<?php echo site_url('users/sign_up'); ?>">Sign Up</a></li>
    </ul>
  </div>

 </div>
  
  <div id="site-navigation" class="container">
    <ul>
      <li>
		<a  href="<?php echo base_url(); ?>">SIGN UP</a>
	  </li>
      
	  <li>
        <a  class="topmenu" href="<?php echo site_url('about'); ?>">ABOUT</a>
      </li>
    </ul>
  </div>
  
</div>

    </div>
    <div id="content" class="container">
       <h1 class="page-title">Search Result
</h1>

  <div class="shadow-box group-card">
  
    <div class="group-info">
   <?php 
     echo $profiles['fullname']; 
   ?>
      <p><h4>Expertise:</h4>
	  <?php 
     echo $profiles['expertise']; 
	  
	  ?></b>
	  <br />
	  <img src="<?php echo  $profiles['gravatar'] ?>" /> 
	  </p>


      <p><h4>About:</h4>
<?php
	echo $profiles['abt'];
?>     
 </p>

<p><h4>Industries</h4>
<?php 
  echo $profiles['industries'];
?>
  </p>
  <p><?php 
  if($profiles['need_help'] != ''&& !is_null($profiles['need_help'])) {

      echo '<h4>Need help in:</h4>';
      echo  $profiles['need_help'] ;
  } 
  elseif($profiles['providing'] != '' && !is_null($profiles['providing']))
  {
    echo '<h4>Providing</h4>';
    echo $profiles['providing'];
  }
  
  ?></p>

   </div>
	
  </div>


  

<div class="clear"></div>

    </div>
  </div>
  <div id="footer">
     <div class="container">
  <div id="mini-logo" >
    <!--
    <a href="http://www.1001mentors.com"><img alt="1001 Mentors" src="/assets/logo_bw-c9535a9f69245e2b6edbc40f3fa4fccc.png" width="160" /></a>
     <p id="mini-slogan">Social Knowledge Network</p>
   -->
  </div>

  <div id="footer-navigation">
    <a href="#">Home</a>
 
  </div>
  
  <div id="follow-us" ><!-- put out links here -->
  </div>
</div>

  </div>
</body>
</html>
