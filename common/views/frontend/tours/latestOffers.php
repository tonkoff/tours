<?php
require_once 'header.php';
?>

<?php

$toursCollection = new ToursCollection();
$tours = $toursCollection->getLast6();


?>
<!--==============================Content=================================-->
<div class="content">
    <div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
    <div class="container_12">
        <div class="banners">
            <?php foreach ($tours as $tour) { ?>


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

        </div>

    </div>
</div>
<!--==============================footer=================================-->
<?php require_once 'footer.php' ?>
