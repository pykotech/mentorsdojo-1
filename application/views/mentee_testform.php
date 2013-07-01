<div id="container">
<?php echo form_open('register/mentee'); ?>
<h1>Mentee Registration</h1>
<table>
<tr>
	<td>Mentee's name:</td>
	<td>
		<input type="text" name="mentee_name">
	</td>
</tr>

<tr>
	<td><label for="email">Email:</label></td>
	<td><input name="email" type="text"></td>
</tr>
<tr>
	<td colspan="2" align="center"><span style="padding: 5px auto; border: 1px #000 solid;">About myself</span></td>
	</tr>
<tr>	
	<td colspan="2" align="center">
		<textarea name="aboutme" rows="10" cols="20">
		</textarea>
	</td>
	
	</tr>
<tr>
	<td colspan="2"><h2 style="padding: 5px auto; border: 1px #000 solid;">Expertise</h2></td>
</tr>

<tr>
	<td>
		Industries I have experience in
	</td>
	<td>
		<input type="text" name="industries">
	</td>
<tr>
	<td>Startup name or startup idea</td>
	<td><input name="startup_idea"  type="text" >
<tr>
	<td>
		<label for="about">What's it about (for mentees)</label>
	</td>
</tr>
<tr>
	<td colspan="2">
		<textarea rows="10" cols="20" name="startup_description"></textarea>
	</td>
</tr>

<tr>
	<td>What do you need help on ?</td>
	<td>
		<textarea name="help" rows="10"cols="20"></textarea>
	</td>
</tr>
<tr>
<td colspan="2"><h2 style="border:1px #101010 solid; padding:5px 5px 5px 5px">Login information</h2></td></tr>

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
	<td colspan="2">
		<input type="submit" class="button" value="submit">
	</td>
</tr>
</table>
</form>
</div>