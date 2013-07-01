<!DOCTYPE html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title> Welcome to Mentors Dojo!</title>
 <meta name="description" content="Connect mentor and mentee startups" />

  <link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
  
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
          <a class="brand" href="<?php echo base_url(); ?>"><img src="../images/mentors-dojo-logo.png"></a>

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
<div class="header"><img src="../images/mentors-dojo.png" /></div>
<h3><!--<i class="icon-user	icon-white"></i>-->[BETA] Need help? Ask your mentors!<span class="right"><a href="<?php echo site_url('how_it_works'); ?>">How it works</a></span></h3>
<?php if($this->session->userdata('username')): ?>
<div class="pagination">
<ul class="page-num">
	<li><a href="<?php echo site_url('welcome'); ?>">Mentor List</a></li>
	<li><a href="<?php echo site_url('mentees_list'); ?>">Mentee List</a></li>
</ul>
<?php endif; ?>
</div>

<div id="group-wrapper">
<?php if(isset($profiles))
{
    //print_r($profiles);
    
    foreach($profiles as $info) 
    {
	
       echo '<div class="group-info "><center><a href="'.site_url('profiles/show') . "/" . $info['mem_id'].'"><img class="profile-img" src="'. $info['gravatar']. '"></a></center><h5>';
					echo '<a href="'.site_url('profiles/show') . "/" . $info['mem_id'].'">'.$info['fullname'].'</a>';
				?></h5><p>Can mentor about:<br>
        <?php 
        if(!empty($info['industries'])) echo substr($info['industries'], 0, 50);
        ?><br /><br />
        <?php
        //Freelancing, PHP, JavaScript, jQuery
        if(!empty($info['expertise'])) echo substr($info['expertise'],0,30)."..."; ?></p>
    <div class="show-prof"><a href="<?php echo site_url('profiles/show') . "/" . $info['mem_id']; ?>">Show Profile</a></div></div>
    <?php
      }
}
else{ echo "No such profile found"; }?>
</div>
</div>
