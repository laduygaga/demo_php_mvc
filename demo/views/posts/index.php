<div class="container">
<h1>Manage <a href='<?php echo constant('URL'); ?>index.php?controller=posts&action=add' class="btn btn-dark" role="button">New Post</a>
</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($posts as $post) {?>
            <tr>
                <td><?php echo $post->id; ?></td>
                <td> <img style="max-height:100px; max-width:100px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>"> </td>
                <td><?php echo $post->title; ?></td>
                <td><?php echo $post->status; ?></td>
                <td>
                    <a href='<?php echo constant('URL'); ?>index.php?controller=posts&action=show&id=<?php echo $post->id; ?>' class="btn btn-secondary" role="button">Show</a>
                    <a href='<?php echo constant('URL'); ?>index.php?controller=posts&action=edit&id=<?php echo $post->id; ?>' class="btn btn-warning" role="button">Edit</a>
                    <a href='<?php echo constant('URL'); ?>index.php?controller=posts&action=_delete&id=<?php echo $post->id; ?>' class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<hr>
