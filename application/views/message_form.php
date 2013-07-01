<?php
$this->load->helper('form');
$to = trim($this->uri->segment(4));
$from = trim($this->uri->segment(3));
echo form_open('messaging/message'. '/'. $from . '/' . $to );
if($message_stat) { echo '<script type="text/javascript">alert("Message sent!");window.close();</script>'; }
?>

<!-- NicEdit -->
<script type="text/javascript" src="http://mentorsdojo.com/nice/nicEdit.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas({buttonList : ['bold','italic','ol','ul','link','unlink','html']}) });
  //]]>
</script>

<div id="message-container">
<h3>Message your mentors</h3>
<div id="message-form">
<center>
<table>
<tbody>
<tr>
<td><label>To: </label><input class="send-to" type="text" name="to" value="<?php echo $profiles['fullname']; ?>" disabled="disabled"></td>
</tr>
<tr>
<td>
<p><span style="color:#666"><em>Introduce yourself, share your goals and suggest a place and time to meet. You'll get a copy in your inbox of the message, as well.</span></em></p>
<textarea name="message" rows="10" cols="20" value="" onfocus="if (this.value == 'type your message here') {this.value = '';}" onblur="if (this.value == '') {this.value = 'type your message here';}">
</textarea></td>
</tr>
<tr>
<td><input type="submit" value="Send" name="submit"></input><input type="button" value="Cancel" name="cancel" onclick="window.close()"></input></td>
</tr>
</tbody>
</table>
</center>
</div>
</div>
<?php echo form_close(); ?>

