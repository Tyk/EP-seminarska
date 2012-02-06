<div class='item_view'>
	<div class='action_back'>
	<?php 
		echo $this->Html->link("Back", array('controller' => 'items', 'action' => 'index'));
	?> 
	</div>
	<?php
		$item_image_url = "/img/no-image.gif";
		if(isset($item['Image'][0]['image_url']))
		{
			$item_image_url = $item['Image'][0]['image_url'];
		}
	?>
	<img width="200px" height="200px" src="<?php echo $item_image_url; ?>"/>
	<h4><?php echo $item['Item']['name']?></h4>
	<p><?php echo $item['Item']['description']?></p>
	<p><?php echo $item['Item']['price']?></p>
	<?php
		if(AuthComponent::user('role') == 'client')
		{	
			echo $this->Html->link("buy", array('controller' => 'cart', 'action' => 'addto', $item['Item']['id']));
		}
	?>
</div>
