<?php echo $this->Html->css('messages'); ?>
<div>
	<div class="errormsg">
		<h1> Oprostite prišlo je do napake </h1>
		<?php echo $this->Html->link("Home", array('controller' => 'home', 'action' => 'index')); ?>	
	</div>
</div>
