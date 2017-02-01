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
                <label class="control-label" for="day1">Day One</label>
                <div class="controls">
                    <textarea name="day1" id="day1" cols="30" rows="10" class="input-xlarge span12" ></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="day2">Day Two</label>
                <div class="controls">
                    <textarea name="day2" id="day2" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="day3">Day Tree</label>
                <div class="controls">
                    <textarea name="day3" id="day3" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="day4">Day Four</label>
                <div class="controls">
                    <textarea name="day4" id="day4" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="day5">Day Five</label>
                <div class="controls">
                    <textarea name="day5" id="day5" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="day6">Day Six</label>
                <div class="controls">
                    <textarea name="day6" id="day6" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="priceIncludes">Price Includes</label>
                <div class="controls">
                    <textarea name="priceIncludes" id="priceIncludes" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="priceExcludes">Price Excludes</label>
                <div class="controls">
                    <textarea name="priceExcludes" id="priceExcludes" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="additionalInfo">Additional Info</label>
                <div class="controls">
                    <textarea name="additionalInfo" id="additionalInfo" cols="30" rows="10" class="input-xlarge span12"></textarea>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="price">Price</label>
                <div class="controls">
                    <input type="text" name="price" id="price" />
                    <p class="help-block"></p>
                </div>
            </div>
  
            <div class="form-actions">
                <input type="submit" name="submit" value="Insert Info" />
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>


<?php require_once '/../../../../admin/common/footer.php'?>
