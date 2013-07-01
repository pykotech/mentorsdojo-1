<?php
echo form_open('profile/save');
?>
<table>
	<tr>
		<td colspan="2">
		<h1 style="border:1px #101010 solid; padding:5px 5px 5px 5px">Login information</h1></td>
		
		</tr>

<tr><td>Linked in:</td>
	<td><input name="username" type="text"></td>
</tr>
<tr>
	<td>Facebook:</td>
	<td><input name="password" type="password">	</td>
</tr>
<!--
<tr>
	<td>Twitter</td>
	<td><input name="password" type="password">	</td>
</tr>
-->


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