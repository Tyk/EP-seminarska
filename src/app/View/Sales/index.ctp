<div>
	<div>
		<?php echo $this->Html->link("Orders", array('controller' => 'orders', 'action' => 'index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Clients", array('controller' => 'users', 'action' => 'clients_index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Not active", array('controller' => 'users', 'action' => 'deactivated_index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Items", array('controller' => 'items', 'action' => 'index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Unpublished items", array('controller' => 'items', 'action' => 'unpublished_index')); ?>
	</div>
</div>
