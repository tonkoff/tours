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

    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="category">Select Category</label>
                <div class="controls ">
                    <select name="category" id="category">
                        <?php foreach($categories as $category) { ?>
                            <option value="<?php echo  $category->getId(); ?>">
                                <?php echo $category->getName(); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="image">Image</label>
                <div class="controls ">
                    <input type="file" class="span6" id="image" name="image" />
                </div>
            </div>


            <div class="control-group <?php echo (array_key_exists('name', $errors))? 'error' : ''; ?>">
                <label class="control-label" for="name">Name</label>
                <div class="controls ">
                    <input type="text" class="span6" id="name" name="name" value="<?php echo $data['name']; ?>" />
                    <p class="help-block"><?php echo (array_key_exists('name', $errors))? $errors['name'] : ''; ?></p>
                </div>
            </div>
            <div class="control-group <?php echo (array_key_exists('description', $errors))? 'error' : ''; ?> ">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $data['description']; ?></textarea>
                    <p class="help-block"><?php echo (array_key_exists('description', $errors))? $errors['description'] : ''; ?></p>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" name="submit" value="Add Tour" />
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>



</div>

<?php require_once '/../../../../admin/common/footer.php'?>
