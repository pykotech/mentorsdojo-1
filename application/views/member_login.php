<!DOCTYPE html>
<!--
 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <title>Mentors Dojo Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>box.css">


<script type="text/javascript">

/*  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24827085-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/
</script>

</head>
  
<body style=" text-align:center;">
    <div align="center">
    <table id="loginpanel" cellspacing="0" cellpadding="0">
    <tr>
        <td class="logintitle" align="center">Mentors Dojo</td>
    </tr>
    <tr>
        <td class="login" style="color:darkgreen">Member Login</td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        
        <?php
		
			//<form id="loginform" method="post" action="chekr.php">
			echo form_open('users/auth');
		?>
        <table>
        <tr>
            <td>Username:</td>
            <td><?php echo form_input( 'username', array('tabindex' => '1')); ?></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><?php echo form_password( 'pwd', array('tabindex' => '2') ); ?></td>
        </tr>
        <tr>
            <td align="center" colspan="2"> 
	    <input class="submit" type="submit" value="Login" tabindex="3" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="forgotmysht.php" tabindex="4"  style="color:blue">Forgot your password?</a></td>
        </tr>
		   <!-- <tr>             </tr>  -->
        </table>
        </form>
          
        </td>
        </tr>
        </table>
    </div>