<style>
.posts {
		border-top: 1px #000 solid;
		padding-left: 20px;
}
	.coool {
		background: #efefef;
	}
	.cool  {
		background: #ddd;
	}
	#container {
		color:#103267;
	}
</style>
<a href="<?=base_url('forum/post');?>">New Post</a>
<div id="container">
<?php
	/*LOOP THROUGH RESULTS*/
$i=0;
	foreach($row as $result):

		if($i%2 == 1) {
			$zebra = 'coool';
		} else {
			$zebra  = 'cool';
		}

		 echo '<div class="'.$zebra.' posts"><strong><h4>' . $result['post'] . '</h4></strong><span class="details" style="top:-15px; position:relative">Replies:' .  $result['num_replies'] .' ' . $result['author']. ' on ' . $result['posted']  . ' </span></div>';
		
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


