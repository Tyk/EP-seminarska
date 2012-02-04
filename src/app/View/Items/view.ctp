<div>
<?php echo $this->Html->link("Back", array('controller' => 'items', 'action' => 'index'));
?> 
</div>
<?php
	$item_image_url = "/img/no-image.gif";
	if(isset($item['Image'][0]['image_url'])){
	$item_image_url = $item['Image'][0]['image_url'];
	}
?>
<img width="200px" height="200px" src="<?php echo $item_image_url; ?>"/>
<h1><?php echo $item['Item']['name']?></h1>
<h2><?php echo $item['Item']['description']?></h2>
<h3><?php echo $item['Item']['price']?></h3>
<?php
if(AuthComponent::user('role') == 'client')
{	
	echo $this->Html->link("buy", array('controller' => 'cart', 'action' => 'addto', $item['Item']['id']));
}
?>
