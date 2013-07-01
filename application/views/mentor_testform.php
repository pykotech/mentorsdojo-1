<div id="container">

<h1 class="head">Mentor Registration</h1>

<?php echo form_open('register/mentor');  ?>

<table>
<tr>
	<td><label for="mentee">Mentee's name:</label></td>
	<td>
		<input type="text" name="mentee_name">
	</td>
</tr>
<tr>
	<td><label for="email">Email:</label></td>
	<td><input name="email" type="text"></td>
</tr>

<tr>
	<td colspan="2"><strong><span class="heading"><span style="padding: 5px auto; border: 1px #000 solid;">About myself</span></td>
	</tr>
<tr>	
	<td colspan="2">
		<textarea name="aboutme" rows="10" cols="20"></textarea>
	</td>
	
	</tr>
<tr>
	<td colspan="2">
	<strong>
		<h3 class="heading"><span style="padding: 5px auto; border: 1px #000 solid;">Expertise</span></h3>
	</strong></td>
</tr>

<tr>
	<td>Industries I have experience in:</td>
	<td><?php echo form_input('industries'); ?></td>
</tr>

<tr>
	-<td colspan="2">Contact:</td>
	</tr>
	<tr>
		<td>Facebook Profile:</td>
		<td><?php echo form_input('facebook'); ?></td>
	</tr>
	<tr>
		<td>Linkedin:</td>
		<td><?php echo form_input('linkedin'); ?> </td>
	</tr>
	<tr>
		<td>Twitter:</td>
		<td><?php echo form_input('twitter'); ?> </td>
	</tr>


	<tr>
		<td>Show my email? <input type="checkbox" value="yes" name="publish_email">	</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><span style="border:1px #101010 solid; padding:5px 5px 5px 5px">Login information</span></td>
	</tr>

	<tr><td>Username:</td>
		<td><input name="username" type="text"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input name="password" type="password">	</td>
	</tr>
	<tr>
		<td>Retype Password:</td>
		<td><input name="password_retype" type="password">	</td>
	</tr>


	<tr>
		<td colspan="2" align="center">
		<input type="submit" name="submit" value="Register">
		</td>
	</tr>
		
	</table>
	
	</div>
	
	
</form>
