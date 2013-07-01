<h1>Replies</h1>
<a href="<?=base_url('forum/reply');?>">New Reply</a>
<div>
<?php
	/*LOOP THROUGH RESULTS*/
$i=0;
	foreach($row as $result):

		 echo $result['post'] . ' <br><em>' . $result['author'].'</em><br>';
	?>
	<?php 
		$i++; 
	
	endforeach; 

	echo "<br><br><hr>";
	if(isset($page)) {
		echo ($page);
	}
	?>
</div>


