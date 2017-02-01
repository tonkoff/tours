<?php require_once 'header.php' ?>

   <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo $blog->getName(); ?></h1>

        

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo $blog->getCreatedAt(); ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="admin/uploads/blog/<?php echo $blog->getImage(); ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead" style="text-align: justify">
            <?php echo $blog->getDescription(); ?>
        </p>


        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" action="" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="textarea" id="textarea"></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
            </form>
        </div>
        <?php if (!loggedInClient()) { ?>
            <p style="color: red;">YOU MUST BE LOGGED TO MAKE COMMENTS</p>
        <?php }; ?>
        <hr>

        <div class="clearfix"></div>


        <!-- Comment -->
        <?php foreach ($comments as $comment) : ?>

            <div class="well">
                <div class="media-body">
                    <h4 class="media-heading" id="commentForm">Posted by <?php echo $comment->getName(); ?></h4>
                    <small><?php echo $comment->getCreatedAt(); ?></small>
                    <p><?php echo $comment->getDescription(); ?></p>
                </div>
            </div>
        <?php endforeach; ?>


    </div>

     <div class="clearfix"></div>

    <section class="gallery">
        <h2 id="galleryTitle">Gallery</h2>

        <div id="gallery">
            <?php foreach ($images as $image) : ?>
                <figure>
                    <a href="admin/uploads/blog/<?php echo $image->getImage(); ?>" data-lightbox="image-1">
                        <img src="admin/uploads/blog/<?php echo $image->getImage(); ?>" alt="img 1"/>
                    </a>
                </figure>
            <?php endforeach; ?>
        </div>


    </section>

    <div class="clearfix"></div>


    <script src="../../../../js/lightbox.js"></script>

<?php require_once 'footer.php'; ?>