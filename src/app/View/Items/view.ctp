<div class='item_view'>
	<div class='actions'>
	<?php 
		echo $this->Html->link("Back", array('controller' => 'items', 'action' => 'index'), array('class' =>'btn_back'));
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
			echo $this->Form->postLink("buy", array('controller' => 'cart', 'action' => 'add', $item['Item']['id'], 1));
		}
	?>
</div>
