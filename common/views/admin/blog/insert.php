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


    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="image">Image</label>
                <div class="controls ">
                    <input type="file" class="span6" id="image" name="image" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                    <textarea name="description" id="description" cols="30" rows="10" class="input-xlarge span6"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">
                    <input type="text" class="span6" id="email" name="name"  />
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" name="submit" value="Add Blog" />
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>


</div><!--/.fluid-container-->


<?php require_once '/../../../../admin/common/footer.php'?>
