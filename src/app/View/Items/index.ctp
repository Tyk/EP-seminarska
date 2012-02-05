<div>
	<div>
		<?php 
			echo $this->Form->create("Item",array('action' => 'index'));
			echo $this->Form->input("q", array('label' => 'Search cakes:'));
			echo $this->Form->end("Search");
		?> 
	</div>
	<div>
		<?php 
			if(AuthComponent::user('role') == 'salesman') echo $this->Html->link("new", array('controller' => 'items', 'action' => 'add'));
		?> 
	</div>
	<div>
		<?php 
			echo " Order by: ";
			echo $this->Paginator->sort('name', 'Name');
			echo " | ";				
			echo $this->Paginator->sort('price', 'Price');				
			foreach ($items as $item):
		?>		
		<div>			
			<?php
				$item_image_url = "/img/no-image.gif";
				if(isset($item['Image'][0]['image_url'])) $item_image_url = $item['Image'][0]['image_url'];
			?>
			<img width="20px" height="20px" src="<?php echo $item_image_url; ?>"/>
            <?php 
				echo $this->Html->link($item['Item']['name'], array('controller' => 'items', 'action' => 'view',$item['Item']['id'])); 
				echo " | ";				
				echo $item['Item']['price'];
				if(AuthComponent::user('role') == 'client')				
				{	
					echo " | ";				
					echo $this->Form->postLink("buy", array('controller' => 'cart', 'action' => 'add', $item['Item']['id'], 1));
				}
				if(AuthComponent::user('role') == 'salesman')				
				{	
					echo " | ";				
					echo $this->Html->link("edit", array('controller' => 'items', 'action' => 'edit', $item['Item']['id']));
					echo " | ";				
					echo $this->Form->postLink("delete", array('controller' => 'items', 'action' => 'delete', $item['Item']['id']),
					array(),"Are you sure you wish to delete this item?");
				}
			?>
		</div>			
		<?php 
			endforeach; 
		?>
		<div>
			<?php 
				echo $this->Paginator->numbers();
				echo ' | ';
				echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled'));
				echo ' | ';
				echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled'));
				echo ' | ';
				echo $this->Paginator->counter(); 
			?>
		</div>
	</div>
</div>
