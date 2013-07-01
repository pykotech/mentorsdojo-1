<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mentors Dojo</title>
 <meta name="description" content="Connect mentor and mentee startups" />

  <link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
 <!-- put ga tracking here-->

<style type="text/css">
#hide {
display: none;
cursor: pointer;
position: relative;
}
</style>


<script language="JavaScript">
function setVisibility(id) {
if(document.getElementById('show').value=='Click to hide password'){
document.getElementById('show').value = 'Click here to change password';
document.getElementById(id).style.display = 'none';
}else{
document.getElementById('show').value = 'Click to hide password';
document.getElementById(id).style.display = 'block';
}
}

</script>
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
          <a class="brand" href="<?php echo base_url(); ?>"><img src="../../images/mentors-dojo-logo.png"></a>

          <div class="nav-collapse">
          	<?php 
          	$this->load->view('nav');
          	?>
          </div><!--/.nav-collapse -->
        
        </div>
      </div>
    </div>
