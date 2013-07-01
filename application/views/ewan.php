<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <title>Mentors Dojo</title>
  <meta name="keywords" content="mentor,entrepreneur,startup,seattle,bellevue,kirkland,redmond,bothell,tacoma" />

    <meta name="description" content="Effective way to connect mentor and mentee through expertise." />

  <link href="<?php echo base_url(); ?>stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
  
<!-- ga.js )google analyrics( -->

</head>
<body>
  <div id="main">
    <div id="header">
      <div id="header-upper" class="container">  
  <div id="logo">
   Profiles
   </div>

  <div id="user-navigation">
    <ul>
      <li><a href='/users/sign_in'>Login</a></li>
      <li><a href='/users/sign_up'>Sign Up</a></li>
    </ul>
  </div>

  <div id="search-box">
    
    <form method="get" action="<?php echo base_url(); ?>users/search">
      
      <input class="searchInput" id="user_search" style="color: gray" name="q" type="text" value="Mark ZUckerberg" onfocus="if (this.style.color == 'gray' && this.value == 'Expertise or name...') {this.value = '';this.style.color='black'}" onblur="if (this.value == '') {this.value = 'Expertise or name...';this.style.color='gray'}" onload="if (this.value != '') {this.style.color='gray'};" />
      
      <input class="search-button" type="submit" value="Search" />
    
    </form>
  
  </div>
</div>

<div id="header-lower">
  
  <div id="site-navigation" class="container">
    <ul>
      <li><a  href="<?php echo base_url(); ?>">Home</a></li>
      <li>
        <a  class="topmenu" href="<?php echo site_url('welcome'); ?>">Welcome</a>
       </li>
	  
	  <li><a href="<?php echo site_url('signup'); ?>">Sign up</a></li>
    </ul>
  </div>
  
</div>

    </div>
    <div id="content" class="container">
      <!-- <?php
	  // <h1 class="page-title">Search Result </h1>
	  ?> -->

<?php
//shadow-box group-card
?>
  <div class="profilecard">
    <?php
	if(isset($names)){
		
		
		
		foreach($names as $info) 
		{
		
				echo "<a href=\"#\">";
				echo '<img alt="profile image"all" src="'..'"/>';
				echo "</a>";  
		
				echo '<div class="group-info">';
				
				echo '<p><b>';
					echo $info['name'];
				?>
				</b>
				</p>
				<p>Worked with (industries):
				<?php 
						
				 echo $info['industries'];
				?>
				</p>
				<p>
				<?php
				//Freelancing, PHP, JavaScript, jQuery
				echo $info['interests'];
				?>
		  </p>
		  <br/>
		<p>
			<a href="<?php echo site_url('users/profile') . "/" . $info['id']; ?>">	Show Profile
			</a>
		</p>
		</div>
		<?php
			}
		}
	else
	{
				
				echo "No \$names found"; 
	}
	?>
	
	
	
  </div>


  

<div class="clear"></div>

    </div>
  </div>
  <div id="footer">
     <div class="container">
  <div id="mini-logo" >
    <h4>Mentors Dojo</h4>
     <p id="mini-slogan">Mentoring Network</p>
  </div>

  <div id="footer-navigation">
    <a href="<?php echo base_url(); ?>">Home</a>
     <a href="<?php echo base_url(); ?>/welcome">Welcome</a> 
    <a href="<?php echo base_url(); ?>policy">Policy</a> 
    <a href="<?php echo base_url(); ?>/about">About</a> 
  </div>
  
  <div id="follow-us" >
    <a href="http://twitter.com/#!/1001mentors" class="twitter"></a>
    <a href="http://www.facebook.com/pages/1001-Mentors/278940378804357" class="facebook"></a>
  </div>
</div>

  </div>
</body>
</html>
