<div class="topnav">
  <a class="active" href="index.php?controller=posts&action=index">Back to allposts</a>
</div>

<div class="container">
    <h1>Edit Post <?php echo $post->id; ?></h1>
    <form action="<?php echo constant('URL'); ?>index.php?controller=posts&action=edit" method="POST" enctype="multipart/form-data" id="updateForm">
        <input type="hidden" name="id" value="<?php echo $post->id; ?>" readonly>
        <div class="form-group">
            <label for="exampleInput">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post->title;?>">
        </div>
<hr>
        <div class="form-group">
            <label for="exampleInput">Status:</label>
            <select class="form-control" name="status" >
                  <option value="1">Enabled</option>
                  <option value="0">Disabled</option>
            </select>

        </div>
<hr>

        <div class="form-group">
            <label for="exampleInput">Description:</label>
            <textarea name="description" class="form-control" form="updateForm" rows="10"> <?php echo $post->description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Image:</label>
            <div class="col-auto">
                <img src='<?php echo constant('URL')."uploads/".$post->image; ?>' style='max-width:100px; max-height:100px'/>
            </div>
            <div class="col-auto">
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>

        </div>
    <input type="submit" value="Update" class="btn btn-dark"></input>
</form>
<hr>
</div>
