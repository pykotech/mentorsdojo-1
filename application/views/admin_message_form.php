<?php
$this->load->helper('form');
$id = trim($this->uri->segment(3));
echo form_open('nobita/message/'. $id);
if($message_stat == 1) { echo '<script type="text/javascript">alert("Message sent!");window.opener.document.location.reload(true);window.close();</script>'; }
elseif($message_stat == 2) { echo '<script type="text/javascript">alert("Sending failed!");window.close();</script>'; }
?>
<div id="message-container">
<h3>Message your mentors</h3>
<div id="message-form">
<center>
<table>
<tbody>
<tr>
<td><label>To: </label><input class="send-to" type="text" name="to" value="<?php echo $message->to; ?>" disabled="disabled"></td>
</tr>
<tr>
<td><textarea name="message" rows="10" cols="20" value="type your message here" disabled="disabled"><?php echo $message->message; ?></textarea></td>
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

