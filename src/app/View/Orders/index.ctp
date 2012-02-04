<h1>Naročila</h1>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Stranka</th>
		<th>Datum</th>
		<th>Število artiklov</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>


	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo $order['Order']['id']; ?></td>
		<td><?php echo ($order['User']['first_name'] . " " . $order['User']['last_name']) ?></td>
		<td><?php echo $order['Order']['date']; ?></td>
		<td>1</td>
		<td><?php echo $order['Order']['state']; ?></td>
		<td>
			<?php echo $this->Html->link('Details', array('action' => 'view', $order['Order']['id']));?> |
		</td>
	</tr>
	<?php endforeach; ?>
</table>
