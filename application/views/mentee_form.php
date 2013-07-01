<?php
$this->load->view('top');
?>
<div id="wrapper">
<div id="container">
<div class="header"><img src="../images/mentors-dojo.png" /></div>
<?php echo form_open('register/mentee'); ?>
<center>
<h3>Mentee Registration</h3>
<table>
<tbody>
<tr><td colspan="2"><h1>Login information</h1></td></tr>
<tr><td class="reg-label">Username:</td>
	<td><input name="username" required class="input-text" type="text"></td>
</tr>
<tr>
	<td class="reg-label">Password:</td>
	<td><input name="password" class="input-text" type="password" oninput="password_retype.setCustomValidity(password_retype.value != password.value ? 'Passwords do not match.' : '')">	</td>
</tr>
<tr>
	<td class="reg-label">Retype Password:</td>
	<td><input name="password_retype" class="input-text" type="password">	</td>
</tr>
<tr><td colspan="2"><h1>Personal Information</h1></td></tr>
<tr>
	<td class="reg-label">Full Name:</td>
	<td>
		<input type="text" class="input-text" name="mentee_name">
	</td>
</tr>
<tr>
	<td class="reg-label">Email:</td>
	<td><input name="email" required class="input-text"  type="text"></td>
</tr>
<tr>
	<td class="reg-label">About myself:</td>
	<td class="field-container">
		<textarea name="aboutme" rows="2" cols="22"></textarea>
	</td>
</tr>

<tr>
	<td class="reg-label">Expertise:</td>
	<td class="field-container"><?php
		/* <input type="text" class="input-text" name="expertise" /> */
		
		if(count($expertises) > 0) { 
			$i =0;
			
			//echo '<select name="expertise">';
			
			foreach($expertises as $expertisekey => $expertise)
			{
				$exp_id =$expertisekey;
				$exp = $expertise;

				//echo '<option value="' . $exp_id . '">' . $exp. '</option>'; //dropdown
				echo '<input name="expertise[]" value="'.$exp.'" type="checkbox"> '.$exp.'<br>'; //checkbox

				$i++;
			}
			
			//echo '</select>';
		}
		?>
	</td>
</tr>

<tr>
	<td class="reg-label">Industries I have experience in:</td>
	<td>
		<input type="text" class="input-text" name="industries">
	</td>
<tr>
	<td class="reg-label">Startup name or startup idea:</td>
	<td><input name="startup_idea" class="input-text"  type="text" >
<tr>
	<td class="reg-label">What's your startup about?:</td>
	<td>
		<textarea rows="10" cols="20" name="startup_description"></textarea>
	</td>
</tr>
<tr><td></td></tr>
<tr>
	<tr><td colspan="2"><h1>Contact:</h1></td>
	</tr>
	<tr>
		<td class="reg-label">Facebook Profile:</td>
		<td class="field-container"><?php echo form_input('facebook'); ?></td>
	</tr>
	<tr>
		<td class="reg-label">Linkedin:</td>
		<td class="field-container"><?php echo form_input('linkedin'); ?> </td>
	</tr>
	<tr>
		<td class="reg-label">Twitter:</td>
		<td class="field-container"><?php echo form_input('twitter'); ?> </td>
	</tr>




<tr><td>
&nbsp;</td></tr>

<tr>
	<td class="reg-label">What do I need help on?</td>
	<td>
		<textarea name="help" rows="10"cols="20"></textarea>
	</td>
</tr>
<tr>
		<td></td><br />
		<td class="form-submit"><input type="submit" id="form-submit" value="Submit"></td>
		</td>
	</tr>
</tbody>
</table>
</center>
</form>
</div>
</div>

