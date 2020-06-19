<div class="container">
    <h1>New Post</h1>
    <form action="<?php echo constant('URL'); ?>index.php?controller=posts&action=add" method="POST" enctype="multipart/form-data" id="insertForm">

        <div class="form-group">
            <label for="exampleInput">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Enter title">
        </div>

        <label for="status">Status:</label>
        <select  class="form-control" name="status">
          <option value="1">Enabled</option>
          <option value="0">Disabled</option>
        </select>

        <div class="form-group">
            <label for="exampleInput">Description:</label>
            <textarea name="description" class="form-control" form="insertForm" rows="10" placeholder="Enter Description"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Image:</label>
            <input type="file" name="image" class="form-control-file">


        </div>
        <input type="submit" class="btn btn-dark" value="Create"></input>
    </form>
    <hr>
</div>
