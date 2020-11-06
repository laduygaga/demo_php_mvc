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
                <td> <img style="max-height:200px; max-width:200px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>"> </td>
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
<hr>
        <div class="form-group">
            <label for="exampleInput">Pages:</label>
            <select name="forma" onchange="location = this.value;">
             <option value="index.php?controller=posts&action=page&offset=0">1</option>
             <option value="index.php?controller=posts&action=page&offset=0">1</option>
             <option value="index.php?controller=posts&action=page&offset=5">2</option>
             <option value="index.php?controller=posts&action=page&offset=10">3</option>
             <option value="index.php?controller=posts&action=page&offset=15">4</option>
             <option value="index.php?controller=posts&action=page&offset=20">5</option>
             <option value="index.php?controller=posts&action=page&offset=25">6</option>
             <option value="index.php?controller=posts&action=page&offset=30">7</option>
             <option value="index.php?controller=posts&action=page&offset=35">8</option>
             <option value="index.php?controller=posts&action=page&offset=40">9</option>
            </select>
        </div>
</div>
<hr>
