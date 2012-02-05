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
			<?php echo $this->Html->link('Spremeni stanje', array('action' => 'edit', $order['Order']['id'])); ?>
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

