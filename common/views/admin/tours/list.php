<?php require_once '/../../../../admin/common/header.php'?>
<?php require_once '/../../../../admin/common/sidebar.php'?>
    <!-- start: Content -->
    <div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

    <?php

    ?>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header">
                <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Striped Table</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="" method="get">
                    <input type="hidden" name="c" value="tours">
                    <label for="perPage">Results pre Page</label>
                    <select name="perPage" id="perPage">
                        <option value="1" <?php echo ($pageResults ==1)? 'selected' : ''; ?>>1</option>
                        <option value="5" <?php echo ($pageResults == 5)? 'selected': ''; ?>>5</option>
                        <option value="10" <?php echo ($pageResults == 10)? 'selected': ''; ?>>10</option>
                    </select>


                    <div class="control-group">
                        <label class="control-label" for="category">Select Category</label>
                        <div class="controls ">
                            <select name="category" id="category">
                                <option value="">SELECT  COUNTRY</option>
                                <?php foreach($categories as $category) { ?>
                                    <option value="<?php echo  $category->getId(); ?>">
                                        <?php echo $category->getName(); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <label for="orderBy">Order By</label>
                    <select name="orderBy" id="orderBy">
                        <option value="0" <?php echo ($orderBy == 0)? 'selected' : '';?>>--SELECT ORDER--</option>
                        <option value="1" <?php echo ($orderBy == 1)? 'selected' :''; ?>>Name ASC</option>
                        <option value="2" <?php echo ($orderBy == 2)? 'selected' : '';?>>Name DESC</option>
                        <option value="3" <?php echo ($orderBy == 3)? 'selected' : ''; ?> >Category ASC</option>
                        <option value="4" <?php echo ($orderBy == 4)? 'selected' : ''; ?> >Category DESC</option>
                    </select>

                    <input type="text" name="search" value="<?php echo $search; ?>" placeholder="SEARCH BY NAME" />
                    <input type="submit" value="Search" />
                </form>

                <a href="index.php?c=tours&m=insert" class="btn btn-large btn-success pull-right">Create Tour</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tours as $tour) { ?>
                        <tr>
                            <td><?php echo $tour->getName(); ?></td>
                            <td><?php echo $tour->getDescription(); ?></td>
                            <td>
                                <img src="uploads/<?php echo $tour->getImage(); ?>" alt="" style="width:50px; height:80px;">

                            </td>
                            <td><?php echo $tour->getCategoryName(); ?></td>
                            <td>
                                <a href="index.php?c=tours&m=tourImages&id=<?php echo $tour->getId();?>">Images</a> |
                                <a href="editTour.php?id=<?php echo $tour->getId();?>">Edit</a> |
                                <a href="index.php?c=tours&m=delete&id=<?php echo $tour->getId(); ?>">DELETE</a> |
                                <a href="index.php?c=tours&m=insertInfo&id=<?php echo $tour->getId();?>">Insert Info</a>
                            </td>
                        </tr>
                    <?php }  ?>

                    </tbody>
                </table>
                <?php echo $paginator->create(); ?>

            </div>
        </div>
    </div>

    </div><!--/.fluid-container-->

<?php require_once '/../../../../admin/common/footer.php'?>
