<?php
$this->load->view('top');
//ASSIGN the same thing to the other
//EXTRACTED ALL VARIABLES!
extract($profiles);
?>

<div id="wrapper">
<div id="container">
<div class="header"></div>
<?php echo form_open_multipart('nobita/profile_update'); ?>
<center>
<h3>Profile Update</h3>
<table>
<tbody>
<tr><td colspan="2"><h1>Login information</h1></td></tr>
<tr><td class="reg-label">Username:</td>
	<td><?=$username?><?=form_hidden('username',$username)?></td>
</tr>
<tr><td colspan="2"><h1>Personal Information</h1></td></tr>
<tr>
	<td class="reg-label">Fullname:</td>
	<td>
		<input type="text" class="input-text" name="mentee_name" value="<?=$fullname?>">
	</td>
</tr>
<tr>
	<td class="reg-label">Email:</td>
	<td><input name="email" class="input-text"  type="text" value="<?=$email?>"></td>
</tr>
<tr>
	<td class="reg-label">About myself:</td>
	<td class="field-container">
		<textarea name="aboutme" rows="2" cols="22"><?=$abt?></textarea>
	</td>
</tr>

<tr>
	<td class="reg-label">Expertise:</td>
	<td class="field-container"><?php
		/* <input type="text" class="input-text" name="expertise" /> */
		$expertise_array = explode(',',$expertise);
		if(count($expertise_array) && is_array($expertise_array)) 
		{ 
			$i =0;
			
			//echo '<select name="expertise">';
			$options = array();
			foreach($expertise_array as $key => $val)
			{
				$id =$key;
				$exp = $val;

				//echo '<option value="' . $exp_id . '">' . $exp. '</option>'; //dropdown
				echo '<input checked="checked" name="expertise[]" value="'.$val.'" type="checkbox"> '.$val.'<br>'; //checkbox

				$options[] = $val;
				$i++;
			}

			//yung mga unchecked dapat
			
		foreach($data[expertiseList] as $expertise => $expertiseval)
		{
					//show only options not checked by the user profile
				if(!in_array($expertise,$options))
				{
							echo '<input name="expertise[]" value="'.$expertiseval.'"';
							echo ' type="checkbox"> '.$expertiseval.'<br>'; //checkbox

				}
		}
			//echo '</select>';
}//end t_else
		?>
	</td>
</tr>

<tr>
	<td class="reg-label">Industries I have experience in:</td>
	<td>
		<input type="text" class="input-text" name="industries" value="<? echo  (count($industries))  ? $industries : "" ?>>
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

