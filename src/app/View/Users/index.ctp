<h1>Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Role</th>
    </tr>
    <?php foreach ($users as $user): 
		$user_id =  $user['User']['id'];
		$user_role =  $user['User']['role'];
	?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $user['User']['username'], array('controller' => 'users', 'action' => 'edit',$user_id); ?>
        </td>
        <td><?php echo $user_role; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
