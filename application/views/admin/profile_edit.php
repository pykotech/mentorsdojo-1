<?php
$this->load->view('admin_top');
//ASSIGN the same thing to the other
//EXTRACTED ALL VARIABLES!
extract($profiles);
?>
<!-- NicEdit -->
<script type="text/javascript" src="http://mentorsdojo.com/nice/nicEdit.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas({buttonList : ['bold','italic','ol','ul','link','unlink','html']}) });
  //]]>
</script>
<div id="wrapper">
<div id="container">
<?php echo form_open('nobita/update_profile'); ?>
<h3>Profile Update</h3>
<table>
<tbody>
<tr><td colspan="2"><h1>Login information</h1></td></tr>
<tr><td class="reg-label">Username:</td>
	<td>
	  <input type="text" class="input-text" name="username" value="<?=$username?>">
	</td>
</tr>
<tr>
<td class="reg-label"></td>
<td><input type=button name=type id='show' value='Click here to change password' onclick="setVisibility('hide');";></input></td>
</tr>
<tr>
	<td class="reg-label"></td>
	<td id="hide">
	<input name="password" placeholder="password" class="input-text" type="password"></input>
	<input name="password_retype" placeholder="re-type password" class="input-text" type="password"></input>
	</td>
</tr>

<tr><td colspan="2"><h1>Personal Information</h1></td></tr>
<tr>
	<td class="reg-label">Fullname:</td>
	<td>
		<input type="text" class="input-text" name="fullname" value="<?=$fullname?>">
	</td>
</tr>
<tr>
	<td class="reg-label">Email:</td>
	<td><input name="email" class="input-text"  type="text" value="<? echo $email; ?>"></td>
</tr>
<tr>
	<td class="reg-label">About myself:</td>
	<td class="field-container">
		<textarea name="aboutme" style="width: 100%;"><?php echo stripslashes($abt); ?></textarea>
	</td>
</tr>

<tr>
	<td class="reg-label">Expertise:</td>
	<td class="field-container"><?php
		/* <input type="text" class="input-text" name="expertise" /> */

		if(substr($expertise,-1) == ",") {
			$expertise = substr($expertise,0,strlen($expertise) - 1);
		} elseif(substr($expertise,-2) == ", " ) {
			$expertise = substr($expertise,0,strlen($expertise) - 2);
		}

		$expertise_array = explode(',',$expertise);

	//ito yung mga unchecked dapat
	//ben: or pwede ring icheck na lang natin kung expertise ba nya or hindi?
		//foreach($data['expertiseList'] as $expertise => $expertiseval)
		foreach($data['expertiseList'] as $expertise)
		{
					//show only options not checked by the user profile
				//if(!in_array($expertise,$options))
				echo '<input name="expertise[]" value="'.$expertise.'" type="checkbox" ';
				if(in_array($expertise,$expertise_array))
				{
				      //eto lang yung pan check ng checkbox hehe
							echo 'checked';
				}
				echo '> '.$expertise.'<br>'; //checkbox
		}
		?>
	</td>
</tr>

<tr>
	<td class="reg-label">Industries I have experience in:</td>
	<td>
		<input type="text" class="input-text" name="industries"  value="<?php echo  stripslashes($industries); ?>">
	</td>
<tr><td></td></tr>
<tr>
	<tr><td colspan="2"><h1>Contact:</h1></td>
	</tr>
	<tr>
		<td class="reg-label">Facebook Profile:</td>
		<td class="field-container" class="input-text"><?php echo form_input('facebook',$facebook); ?></td>
	</tr>
	<tr>
		<td class="reg-label">Linkedin:</td>
		<td class="field-container" class="input-text"><?php echo form_input('linkedin',$linkedin); ?> </td>
	</tr>

	<tr>
		<td class="reg-label">Twitter:</td>
		<td class="field-container" class="input-text"><?php echo form_input('twitter',$twitter); ?> </td>
	</tr>

<?
	switch($usertype) {
			
			//mentee
			case '1': 
					echo '<tr><td class="reg-label">What do I need help on?</td>';
					echo '<td class="field-container" >
					<textarea name="need_help" rows="10"cols="20">';
					echo stripslashes($need_help);
					echo '</textarea>
					<input type="hidden" name="providing" value="">
					</td></tr>';

			break;

			case '2':

				echo '<tr><td class="reg-label">
				Providing help with:</td>';
				echo '<td class="field-container" >
				<textarea name="providing" rows="10"cols="20">';

				echo stripslashes($providing);
					echo '</textarea>
				<input type="hidden" name="help" value="">
					</td>
				</tr>';
			break;

			default:
				echo 'Mentor/?';
			break;
	}
	?>
<tr>
		<td></td><br />
		<td class="form-submit"><input type="submit" id="form-submit" value="Submit"></td>
		</td>
	</tr>
</tbody>
</table>
<?php echo form_hidden('mid',$mem_id); ?>
</form>
</div>
</div>
 <!-- 2012 MentorsDojo Admin. Developer: J.Palala <deterium73@gmail.com> / B. Sarmiento  -->
