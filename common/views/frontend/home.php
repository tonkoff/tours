<?php
require_once 'header.php';
?>

<div class="content">
    <div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
    <div class="container_12">
        <?php foreach ($toursRand as $tour) { ?>


            <div class="grid_4">
                <div class="banner">
                    <img src="admin/uploads/<?php echo $tour->getImage(); ?>" alt="" class="img_inner1"/>
                    <div class="label">
                        <div class="title"><?php echo $tour->getName(); ?></div>

                        <div class="price">FROM<span><?php echo $tour->getTourPrice(); ?>ЛВ</span></div>

                        <a href="singleTour.php?id=<?php echo $tour->getId(); ?>">LEARN MORE</a>
                    </div>
                </div>
            </div>

        <?php } ?>


        <div class="grid_8">
            <h2>Welcome</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem dolorum eos, fuga in
                laudantium natus necessitatibus? Accusantium eaque iste necessitatibus nostrum porro reiciendis unde.
                Ducimus omnis quae quia ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam cum
                fuga id illum, ipsum magnam neque perferendis perspiciatis quidem totam unde voluptatem? Aliquid
                consectetur ea id mollitia optio unde voluptate. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Aperiam dolorem dolorum eos, fuga in laudantium natus necessitatibus? Accusantium eaque iste
                necessitatibus nostrum porro reiciendis unde. Ducimus omnis quae quia ullam. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Aperiam cum fuga id illum, ipsum magnam neque perferendis perspiciatis
                quidem totam unde voluptatem? Aliquid consectetur ea id mollitia optio unde voluptate. Lorem ipsum dolor
                sit amet, consectetur adipisicing elit. Aperiam dolorem dolorum eos, fuga in laudantium natus
                necessitatibus? Accusantium eaque iste necessitatibus nostrum porro reiciendis unde. Ducimus omnis quae
                quia ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam cum fuga id illum, ipsum
                magnam neque perferendis perspiciatis quidem totam unde voluptatem? Aliquid consectetur ea id mollitia
                optio unde voluptate.
            </p>
        </div>


        <!-- -------------------blog----------------------- -->
        <div class="clear"></div>

        <h3>Latest Blog News</h3>
        <?php foreach ($blogResults as $value) { ?>
            <div class="grid_8">


                <img class="img-rounded" src="admin/uploads/blog/<?php echo $value->getImage(); ?>" alt="">
                <div class="label">
                    <div class="title"></div>
                    <h4><?php echo $value->getName(); ?></h4>
                    <a href="#" class="homeButton">LEARN MORE</a>
                </div>

                <br/>
            </div>
        <?php } ?>
        <div class="clear"></div>

        <?php foreach ($categories as $category) : ?>
            <div class="indexImg">
                <a href="tours.php?category=<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?>
                    <img src="admin/uploads/category/<?php echo $category->getImage(); ?>" alt="">
                </a>
            </div>
        <?php endforeach; ?>


    </div>
</div>

<?php require_once 'footer.php'?>