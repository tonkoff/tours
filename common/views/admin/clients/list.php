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
                <?php
                if (isset($_SESSION['flashMessage'])) {
                    echo $_SESSION['flashMessage'];
                    unset($_SESSION['flashMessage']);
                }
                ?>

                
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($clients as $client): ?>
                        <tr>
                            <td><?php echo $client->getUsername(); ?></td>
                            <td class="center"><?php echo $client->getEmail(); ?></td>
                            <td class="center"><?php echo $client->getDescription(); ?></td>
                            <td class="center">

                                <a class="btn btn-info" href="index.php?c=clients&m=update&id=<?php echo $client->getId(); ?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="index.php?c=clients&m=delete&id=<?php echo $client->getId(); ?>">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $paginator->create(); ?>

            </div>
        </div><!--/span-->
    </div><!--/row-->




</div><!--/.fluid-container-->
 
<?php require_once '/../../../../admin/common/footer.php'?>
