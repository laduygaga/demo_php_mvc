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
                <td><?php echo $post->image; ?></td>
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
<ul class="pagination">Pages: 
  <li><a href="index.php?controller=posts&action=page&offset=0">1</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=5">2</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=10">3</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=15">4</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=20">5</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=25">6</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=30">7</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=35">8</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=40">9</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=45">10</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=50">11</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=55">12</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=60">13</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=65">14</a>_</li>
  <li><a href="index.php?controller=posts&action=page&offset=70">15</a></li>
</ul>
</div>

</div>
<hr>
