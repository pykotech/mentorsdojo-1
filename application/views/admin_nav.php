
<ul class="nav">
<?php if(!$this->session->userdata('username')): ?>
	<li><a href="<?php echo site_url('about'); ?>">About Us</a></li>
	<li><a href="<?php echo site_url('registration/mentor'); ?>">Mentor Register</a></li>
	<li><a href="<?php echo site_url('registration/mentee'); ?>">Mentee Register</a></li>
	<li><a href="<?php echo site_url('login'); ?>">Login</a></li>
<?php else: ?>
	<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
<?php endif; ?>
</ul>
