<h1>Salesman</h1>
<?php echo $this->Html->link("new", array('controller' => 'users', 'action' => 'add_salesman')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Role</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['role']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
