<?php require_once __DIR__.'/../../../../admin/common/header.php'?>
<?php require_once __DIR__.'/../../../../admin/common/sidebar.php'?>


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
                <div class="control-group <?php echo (array_key_exists('username', $errors))? 'error' : ''; ?>">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input type="text" class="span6" id="username" name="username" value="<?php echo $data['username']; ?>" />
                        <p class="help-block">
                            <?php echo (array_key_exists('username', $errors))? $errors['username'] : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="control-group <?php echo (array_key_exists('password', $errors))? 'error' : ''; ?>">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" class="span6" id="password" name="password" value="" />
                        <p class="help-block">
                            <?php echo (array_key_exists('password', $errors))? $errors['password'] : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="control-group <?php echo (array_key_exists('repeatPassword', $errors))? 'error' : ''; ?>">
                    <label class="control-label" for="repeatPassword">Repeat Password</label>
                    <div class="controls">
                        <input type="password" class="span6" id="repeatPassword" name="repeatPassword" value="" />
                        <p class="help-block">
                            <?php echo (array_key_exists('repeatPassword', $errors))? $errors['repeatPassword'] : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="control-group <?php echo (array_key_exists('email', $errors))? 'error' : ''; ?>">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" class="span6" id="email" name="email" value="<?php echo $data['email']; ?>" />
                        <p class="help-block">
                            <?php echo (array_key_exists('email', $errors))? $errors['email'] : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="control-group <?php echo (array_key_exists('description', $errors))? 'error' : ''; ?>">
                    <label class="control-label" for="description">Description</label>
                    <div class="controls">
                        <textarea name="description" id="description" cols="30" rows="10"><?php echo $data['description']; ?></textarea>
                        <p class="help-block">
                            <?php echo (array_key_exists('description', $errors))? $errors['description'] : ''; ?>
                        </p>
                    </div>
                </div>

                <div class="form-actions">
                    <input type="submit" name="submit" value="Add User" />
                    <button type="reset" class="btn">Cancel</button>
                </div>
            </fieldset>
        </form>


    </div><!--/.fluid-container-->

<?php require_once __DIR__.'/../../../../admin/common/footer.php'?>