<?php echo $this->Html->link("Back", array('controller' => 'home', 'action' => 'index'));?> 
<h1><?php echo $item['Item']['name']?></h1>
<h2><?php echo $item['Item']['description']?></h2>
<h3><?php echo $item['Item']['price']?></h3>
<?php
if(AuthComponent::user('role') == 'client')
{	
	echo $this->Html->link("buy", array('controller' => 'cart', 'action' => 'addto', $item['Item']['id']));
}
?>
