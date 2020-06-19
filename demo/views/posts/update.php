<div class="topnav">
  <a href="http://localhost:8000/index.php?controller=posts&action=index">BACK TO POSTS MANAGER</a>
</div>

<div class="container">
    <h1>Edit Post <?php echo $post->id; ?></h1>
    <form action="<?php echo constant('URL'); ?>index.php?controller=posts&action=edit" method="POST" enctype="multipart/form-data" id="updateForm">
        <input type="hidden" name="id" value="<?php echo $post->id; ?>" readonly>
        <div class="form-group">
            <label for="exampleInput">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post->title;?>">
        </div>

        <div class="form-group">
            <label for="exampleInput">Description:</label>
            <textarea name="description" class="form-control" form="updateForm" rows="10"> <?php echo $post->description; ?></textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="exampleInput">Status:</label>
            <input type="text" class="form-control" name="status" value="<?php echo $post->status;?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Image:</label>
            <div class="col-auto">
                <img src='<?php echo constant('URL')."uploads/".$post->image; ?>' style='max-width:200px; max-height:200px'/>
            </div>
        <hr>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        <input type="submit" value="Update" class="btn btn-dark"></input>
        <hr>
            <div class="col-auto">
 
</form>
<hr>
</div>
