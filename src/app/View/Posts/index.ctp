<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Number</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['name'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['number']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
