<?php require_once '/../../../../admin/common/header.php'?>
<?php require_once '/../../../../admin/common/sidebar.php'?>
    <div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>


    <form action="" method="get">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="SEARCH BY STATUS" />
        <input type="submit" value="Search" />
    </form>

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

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($contacts as $contact) { ?>
                        <tr>
                            <td>
                                <?php echo $contact->getName(); ?>
                            </td>
                            <td>
                                <?php echo $contact->getEmail(); ?>
                            </td>
                            <td>
                                <?php echo $contact->getPhone(); ?>
                            </td>
                            <td>
                                <?php echo $contact->getMessage();?>
                            </td>
                            <td>
                                <?php echo $contact->getStatus();?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="index.php?c=form&m=starus&id=<?php echo $contact->getId(); ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="index.php?c=form&m=delete&id=<?php echo $contact->getId(); ?>">
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


    </div><!--/.fluid-container-->

<?php require_once '/../../../../admin/common/footer.php'?>
 