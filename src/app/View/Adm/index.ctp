<div>
	<div>
		<?php echo $this->Html->link("Clients", array('controller' => 'users', 'action' => 'clients_index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Salesmen", array('controller' => 'users', 'action' => 'salesman_index')); ?>
	</div>
	<div>
		<?php echo $this->Html->link("Not active", array('controller' => 'users', 'action' => 'deactivated_index')); ?>
	</div>
</div>
