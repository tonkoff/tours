<?php require_once 'header.php'; ?>
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
    <div class="container_12">
        <h3>Recent Posts</h3>

        <?php foreach ($blogResults as $blogResult) { ?>
            <div class="grid_8">
                <div class="blog">
                    <time><?php echo  $blogResult->getCreatedAt(); ?></time>
                    <div class="extra_wrapper">
                        <div class="text1 col1">
                            <a href="#"><?php echo $blogResult->getName(); ?></a>
                        </div>


                    </div>
                    <div class="clear"></div>
                    <img src="admin/uploads/blog/<?php echo $blogResult->getImage(); ?>" alt="" class="img_inner">
                    <p><?php echo mb_substr($blogResult->getDescription(), 0, 150) ; ?></p>
                    <br>
                    <a href="index.php?c=blogf&m=singleBlog&id=<?php echo $blogResult->getId(); ?>" class="link1">LEARN MORE</a>
                </div>
            </div>
        <?php } ?>

        <div class="clearfix11">
            <?php echo $paginator->create(); ?>
        </div>

    </div>
    <!--==============================footer=================================-->
    <?php require_once 'footer.php' ?>
