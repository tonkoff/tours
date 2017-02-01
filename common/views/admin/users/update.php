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




    <form class="form-horizontal" action="" method="post">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" class="span6" id="username" name="username" value="<?php echo $data['username']; ?>" />
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input type="text" class="span6" id="email" name="email" value="<?php echo $data['email']; ?>" />
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $data['description']; ?></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" name="submit" value="Add User" />
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>


</div><!--/.fluid-container-->

<?php require_once '/../../../../admin/common/footer.php'?>
 