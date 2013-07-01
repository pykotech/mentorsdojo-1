<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <title> <?php 
  if(isset($fullname)) { echo $fullname; }
	 
  ?> | Mentors Dojo</title>
<meta name="description" content="Connect mentor and mentee startups" />
<link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/style.css" media="screen" rel="stylesheet" type="text/css" /> 
<script src="js/jquery.js" type="text/javascript"></script>
 <!-- put ga tracking here-->

</head>
<body>
 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url();?>"><img src="/images/mentors-dojo-logo.png" /></a>

          <div class="nav-collapse">
          	<?php 
          	$this->load->view('nav');
          	?>
          </div><!--/.nav-collapse -->
        
        </div>
      </div>
</div>

<div id="wrapper">
<div id="container">
<h3><i class="icon-user	icon-white"></i>Profiles</h3>
	  <div class="main-prof">
		<div class="img-profile">
		 <img src="<?php echo  $profiles['gravatar'] ?>" />
		<center>
		<?php if($this->session->userdata('username')): ?>
		<button class="message-button" onclick="window.open('<?php echo site_url('messaging/message/'.$uname.'/'.$profiles['username']) ?>', '', 'width=550,height=500;resizable=no')"><i class="icon-envelope icon-white"></i>Get Intro</button><br/>
		<button class="message-button" onclick="window.open('<?php echo site_url('messaging/mailsensei/'.$uname.'/'.$profiles['username']) ?>', '', 'width=550,height=500;resizable=no')"><i class="icon-envelope icon-white"></i>Message</button>
		<?php endif; ?>
		</center>
		<div class="clear"></div>
		</div><!-- end of img-profile -->
		  <h1 class="profile-title"><?php echo $profiles['fullname']; ?></h1>
		  <?php if ($profiles['username'] == $this->session->userdata('userid')): ?>
		  <h4><a href="<?php echo site_url('editor/profile').'/'.$profiles['mem_id']; ?>">Edit Your Profile</a></h4>
		  <?php endif; ?>
		  <br />

		   <h4>About Me:</h4><p><?php echo $profiles['abt']; ?></p><br />
		   </div>
		   </div>
		   <div class="wrapper-inner">
	<div class="inner-profile-1">
		   <h4>Expertise:</h4><p><?php echo $profiles['expertise']; ?></p><br/>
	<h4>Industries:</h4>
<p><?php echo $profiles['industries']; ?></p>
	
	
<?php 
  if($profiles['need_help'] != ''&& !is_null($profiles['need_help'])) {

      echo '<h4>Need help in:</h4>';
      echo '  <p>' .  $profiles['need_help'] ;
  } 
 //$profiles['providing'] != '' && !is_null($profiles['providing']))

 if(!empty($profiles['providing']))
  {
    echo '<h4>How Can I Help?</h4>';
    echo '  <p>' . $profiles['providing'];
  }
  ?>
</div>
<br />
	
	<?php if($this->session->userdata('username')): ?>
<div>
<?php if($profiles['facebook']): ?>
	<a href="
	<?php echo (strpos($profiles['facebook'],'facebook.com') !== false) ? 		$profiles['facebook'] : 'http://facebook.com/'.$profiles['facebook']; ?>">
	<img src="http://mentorsdojo.com/images/facebook.png" title="View my 			Facebook profile" class="alignleft"/></a>
<?php endif; ?>
<?php if($profiles['linkedin']): ?>
	<a href="
	<?php echo (strpos($profiles['linkedin'],'linkedin.com') !== false) ? 		$profiles['linkedin'] : 'http://linkedin.com/in/'.$profiles['linkedin']; ?>">
	<img src="http://mentorsdojo.com/images/linkedin.png" title="View my LinkedIn 		Profile" class="alignleft"/></a>
<?php endif; ?>
<?php if($profiles['twitter']): ?>
	<a href="
	<?php echo (strpos($profiles['twitter'],'twitter.com') !== false) ? 		$profiles['twitter'] : 'http://twitter.com/'.$profiles['twitter']; ?>">
	<img src="http://mentorsdojo.com/images/twitter.png" title="View my Twitter Profile" class="alignleft"/></a>
<?php endif; ?>
</div>
<?php endif; ?>
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html>
