<!doctype html>
<html>
<head>
<link href="<?php echo base_url(); ?>favicon.ico" rel="icon" type="image/icon" />">
<link href="<?php echo base_url(); ?>favicon.ico" rel="icon" type="image/x-icon" />">
<title>Mentors Dojo</title>
<!-- <script type="javascript" src="jquery-1.7.2.min.js"></script> not yet needed-->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> 

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
<!-- below is actually boostrap-->
<link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
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
          <a class="brand" href="#">Mentors Dojo</a>

          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
              <li><a href="<?php echo site_url('sign_up'); ?>">Sign Up</a></li>
              <li><a  href="about.php">About</a></li>
            </ul>
  
          </div><!--/.nav-collapse -->
        
        </div>
      </div>
    </div>