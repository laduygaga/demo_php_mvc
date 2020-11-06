<div class="topnav">
  <a class="active" href="index.php?controller=posts&action=index">Back to allposts</a>
</div>
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">
                <?php echo $post->title; ?>
            </h1>

            <hr>

            <!-- Preview Image -->
            <img style="max-height:100%; max-width:100%" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>">


            <hr>

            <!-- Description Post -->
            <p style="text-align: justify">Description:
                <?php echo $post->description; ?>
            </p>

            <hr>

        </div>
    </div>
</div>
