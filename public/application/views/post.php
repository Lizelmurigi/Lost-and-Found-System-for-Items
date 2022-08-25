<?php 
        $fattr = array('class' => 'form-signin');
        echo form_open('/data/post', $fattr);
    ?>
<div class="container" style="margin: 2em auto">
    <div class="row-fluid" style="min-height: 420px">
        <?php echo form_open_multipart('post', array('class' => 'form-horizontal', 'id' => 'post_new_item')) ?>

        <?php echo $antibot; ?>
        <div class="control-group">
            <label class="control-label">Category：</label>
            <div class="controls">
                <div class="btn-group" id="info_type">
                    <button class="btn active" value="1">Found</button>
                    <button class="btn" value="2">Lost</button>
                </div>
                <input type="hidden" name="info_type" value="<?php echo set_value('info_type', '1'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Item Name：</label>
            <div class="controls">
                <input class="span4" type="text" name="item_name" value="<?php echo set_value('item_name'); ?>">
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Detail Description：</label>
            <div class="controls">
                <input class="span4" type="text" name="item_detail" value="<?php echo set_value('item_detail'); ?>">
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Place：</label>
            <div class="controls">
                <select class="span4" name="place">
                    <option value="1" <?php echo set_select('place', '1'); ?>>School Area</option>
                    <option value="2" <?php echo set_select('place', '2'); ?>>Nairobi West</option>
                    <option value="3" <?php echo set_select('place', '3'); ?>>Nairobi CBD</option>
                    <option value="4" <?php echo set_select('place', '4'); ?>>Outside Nairobi</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Place Details：</label>
            <div class="controls">
                <input class="span4" type="text" name="place_detail" value="<?php echo set_value('place_detail'); ?>">
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Contact：</label>
            <div class="controls">
                <input class="span4" type="text" name="contact" value="<?php echo set_value('contact'); ?>">
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Image：</label>
            <div class="controls">
                <input class="span4" type="file" name="item_pic">
                <span class="help-inline">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" type="submit">Submit</button>
                <?php
                        $v_err = validation_errors();
                        if (empty($v_err)) $v_err = 'hide';
                    ?>
                <span class="help-inline <?php echo $v_err ?>" style="color: #922"> </span>
            </div>
        </div>
        </form>
    </div>
</div>