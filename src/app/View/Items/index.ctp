<div>
	<div>
		<?php 
			echo " Order by: ";
			echo $this->Paginator->sort('name', 'Name');
			echo " | ";				
			echo $this->Paginator->sort('price', 'Price');				
			echo " | ";				
			echo $this->Paginator->sort('id', 'Rating');
			foreach ($items as $item):
		?>		
		<div>
            <?php 
				echo $this->Html->link($item['Item']['name'], array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); 
				echo " | ";				
				echo $item['Item']['price'];
				if(AuthComponent::user('role') == 'client')				
				{	
					echo " | ";				
					echo $this->Html->link("buy", array('controller' => 'cart', 'action' => 'addto', $item['Item']['id']));
				}
			?>

		</div>			
		<?php endforeach; ?>
		<div>
			<?php echo $this->Paginator->numbers(); ?>
			<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
			<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
			<?php echo $this->Paginator->counter(); ?>
		</div>
	</div>
</div>



