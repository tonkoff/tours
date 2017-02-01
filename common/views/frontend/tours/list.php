<?php
require_once 'header.php';
?>
<div class="box-content">
    <div class="form-style-6">
        <form action="" method="get">
            <input type="hidden" name="c" value="toursf">
            <label for="perPage">Results pre Page</label>
            <select name="perPage" id="perPage">

                <option value="5" <?php echo ($pageResults == 5) ? 'selected' : ''; ?>>5</option>
                <option value="100" <?php echo ($pageResults == 100) ? 'selected' : ''; ?>>All</option>
            </select>


            <div class="control-group">
                <label class="control-label" for="category">Select Category</label>
                <div class="controls ">
                    <select name="category" id="category">
                        <option value="">SELECT CATEGORY</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category->getId(); ?>">
                                <?php echo $category->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <label for="orderBy">Order By</label>
            <select name="orderBy" id="orderBy">
                <option value="0" <?php echo ($orderBy == 0) ? 'selected' : ''; ?>>--SELECT ORDER--</option>
                <option value="1" <?php echo ($orderBy == 1) ? 'selected' : ''; ?>>Name ASC</option>
                <option value="2" <?php echo ($orderBy == 2) ? 'selected' : ''; ?>>Name DESC</option>
                <option value="3" <?php echo ($orderBy == 3) ? 'selected' : ''; ?> >Category ASC</option>
                <option value="4" <?php echo ($orderBy == 4) ? 'selected' : ''; ?> >Category DESC</option>
            </select>

            <input type="text" name="search" value="<?php echo $search; ?>" placeholder="SEARCH BY NAME"/>
            <input type="submit" value="Search"/>
        </form>
    </div>


    <!--==============================Content=================================-->
    <div class="content">
        <div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
        <div class="container_12">


            <h3>TOURS</h3>
            <?php foreach ($tours as $tour) { ?>
                <div class="grid_8">
                    <div class="block2">
                        <img src="admin/uploads/<?php echo $tour->getImage(); ?>" alt=""
                             class="img_inner1 fleft img-rounded">
                        <div class="extra_wrapper">
                            <div class="text1 col1"><a
                                    href="index.php?c=toursf&m=singleTour&id=<?php echo $tour->getId(); ?>"><?php echo $tour->getName(); ?></a>
                            </div>
                            <p><?php echo $tour->getDescription(); ?></p>
                            <br>
                            <a href="index.php?c=toursf&m=singleTour&id=<?php echo $tour->getId(); ?>" class="link11">LEARN MORE</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="clearfix11">
                <?php echo $paginator->create(); ?>
            </div>

        </div>

    </div>


</div>
<!--==============================footer=================================-->
<?php require_once 'footer.php' ?>