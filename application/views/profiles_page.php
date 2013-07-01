<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title> Welcome to Mentors Dojo! | Mentors Dojo</title>
 <meta name="description" content="Connect mentor and mentee startups" />

  <link href="http://mentorsdojo.com/stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="http://mentorsdojo.com/css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="http://mentorsdojo.com/js/jquery.js" type="text/javascript"></script>
 <!-- put ga tracking here-->

 <style type="text/css">
</style>
</head>
<body>
<div id="container">
<h3><i class="icon-user	icon-white"></i>Mentors List</h3>
<?php

if(isset($profiles))

{
		
		//print_r($profiles);
		
		foreach($profiles as $info) 
		{
		
				echo "<a href=\"#\">";
				//echo '<img alt="profile image"all" src="'..'"/>';
				echo "</a>";  
		
				echo '<div class="group-info" onclick="location.href='.site_url('profiles/show') . "/" . $info['mem_id'].'" style="cursor: pointer;">';
				
				echo '<div class="profile-img"><center><img src="'. $info['gravatar'] .'"></center></div><h4>';
					echo $info['fullname'];
				?>
				</h4>
				<p>Worked with (industries):
				<?php 
						
				 echo $info['industries'];
				?>
				</p>
				<p>
				<?php
				//Freelancing, PHP, JavaScript, jQuery
				echo $info['expertise'];
				?>
		  </p>
		<p>
			<a href="<?php echo site_url('profiles/show') . "/" . $info['mem_id']; ?>">Show Profile
			</a>
		</p>
		</div>
		<?php
}
}
else{ echo "prob"; }
?>
</div>
</body>
</html>

	
