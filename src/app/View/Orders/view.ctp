<h3>Naročila:</h3>
<table border="1">
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
			<?php echo $this->Html->link('Podrobnosti', array('action' => 'view', $order['Order']['id'])); ?> |
			<?php
				if(AuthComponent::user('role') == "salesman"){
					if ($order['Order']['state'] == "ODDANO") {
						echo $this->Html->link('ZAVRNI', array('action' => 'changeState', $order['Order']['id'], 'ZAVRNI'));
						echo "/";
						echo $this->Html->link('V OBDELAVI', array('action' => 'changeState', $order['Order']['id'], 'V OBDELAVI'));
					}
					if ($order['Order']['state'] == "PREKLICANO") {
						echo $this->Html->link('ZBRISI', array('action' => 'changeState', $order['Order']['id'], 'ZBRISI'));
					}
					if ($order['Order']['state'] == "V OBDELAVI") {
						echo $this->Html->link('POSLANO', array('action' => 'changeState', $order['Order']['id'], $order['Order']['state']));
					}
					if ($order['Order']['state'] == "POSLANO") {
						echo $this->Html->link('ZAPISI', array('action' => 'changeState', $order['Order']['id'], $order['Order']['state']));
					}
					if ($order['Order']['state'] == "ZAVRNJENO") {
						echo $this->Html->link('ZBRISI', array('action' => 'changeState', $order['Order']['id'], $order['Order']['state']));
					}
				}
				else if(AuthComponent::user('role') == "client") {
					if ($order['Order']['state'] == "ODDANO") {
						echo "PREKLICI";
					}
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>


<?php if($show_details) { ?>
	<h3>Artikli naročila <?php echo $id ?></h3>

	<table border="1">
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

