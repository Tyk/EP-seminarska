<?php echo $this->Html->script('sortable'); ?>
<?php echo $this->Html->css('sortable'); ?>
<?php echo $this->Html->css('orders'); ?>
<h3>Naročila:</h3>
<table class="sortable" id="orders_table" cellpadding="0" cellspacing="0">
	<tr>
		<th>ID</th>
		<th>Stranka</th>
		<th>Datum</th>
		<th>Število artiklov</th>
		<th>Stanje</th>
		<th>Actions</th>
	</tr>


	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo $order['Order']['id']; ?></td>
		<td><?php echo ($order['User']['first_name'] . " " . $order['User']['last_name']) ?></td>
		<td><?php echo $order['Order']['date']; ?></td>
		<?php $quant=0;
			foreach ($order['Item'] as $item):
				$quant += $item['ItemsOrder']['quantity'];
			endforeach; 
		?>
		<td><?php echo $quant; ?></td>				
		<td><?php echo $order['Order']['state']; ?></td>
		<td>
			<?php echo $this->Html->link('Podrobnosti', array('action' => 'index', $order['Order']['id'])); ?> |
			<?php
				if(AuthComponent::user('role') == "salesman"){
					if ($order['Order']['state'] == "ODDANO") {
						echo $this->Form->postLink('ZAVRNI', array('action' => 'changeState', $order['Order']['id'], 'ZAVRNI'));
						echo "/";
						echo $this->Form->postLink('V OBDELAVI', array('action' => 'changeState', $order['Order']['id'], 'V OBDELAVI'));
					}
					if ($order['Order']['state'] == "PREKLICANO") {
						echo $this->Form->postLink('ZBRISI', array('action' => 'changeState', $order['Order']['id'], 'ZBRISI'));
					}
					if ($order['Order']['state'] == "V OBDELAVI") {
						echo $this->Form->postLink('POSLANO', array('action' => 'changeState', $order['Order']['id'], 'POSLANO'));
					}
					if ($order['Order']['state'] == "POSLANO") {
						echo $this->Form->postLink('ZAPISI', array('action' => 'changeState', $order['Order']['id'], 'ZAPISI'));
					}
					if ($order['Order']['state'] == "ZAVRNJENO") {
						echo $this->Form->postLink('ZBRISI', array('action' => 'changeState', $order['Order']['id'], 'ZBRISI'));
					}
				}
				else if(AuthComponent::user('role') == "client") {
					if ($order['Order']['state'] == "ODDANO") {
						echo $this->Form->postLink('PREKLICI', array('action' => 'changeState', $order['Order']['id'], 'PREKLICI'));
					}
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>


<?php if($show_details) { ?>
	<h3>Artikli naročila <?php echo $id ?></h3>

	<table class="sortable" id="items_table" cellpadding="0" cellspacing="0">
		<tr>
			<th>Naziv</th>
			<th>Število artiklov</th>
			<th>Cena</th>
		</tr>

		<?php foreach ($selected_order['Item'] as $item): ?>
		
		<tr>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['ItemsOrder']['quantity'] ?></td>
			<td><?php echo ($item['ItemsOrder']['quantity']*$item['price']); ?></td>
		</tr>
		<?php endforeach; ?>	
	</table>
<?php } ?>

