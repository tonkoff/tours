<?php require_once '/../../../../admin/common/header.php'?>
<?php require_once '/../../../../admin/common/sidebar.php'?>
    <!-- start: Content -->
    <div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>
 
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
                <a href="index.php?c=categories&m=insert" class="btn btn-large btn-success pull-right">Create Category</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categories as $category) { ?>
                        <tr>
                            <td><?php echo $category->getId(); ?></td>
                            <td><?php echo $category->getName(); ?></td>
                            <td><?php echo $category->getDescription(); ?></td>
                            <td>

                                <a class="btn btn-info" href="index.php?c=categories&m=update&id=<?php echo $category->getId(); ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="index.php?c=categories&m=delete&id=<?php echo $category->getId(); ?>">
                                    <i class="halflings-icon white trash"></i>
                                </a>



                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php echo $paginator->create(); ?>
            </div>
        </div>
    </div>

    </div><!--/.fluid-container-->

<?php require_once '/../../../../admin/common/footer.php'?>
 