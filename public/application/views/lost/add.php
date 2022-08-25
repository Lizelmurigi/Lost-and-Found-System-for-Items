<div class="col-lg-4 col-lg-offset-4">
    <h2>Hello <?php echo $first_name; ?>,</h2>
    <h5>Please enter the required information below.</h5>
    <?php 
        $fattr = array('class' => 'form-signin');
        echo form_open('/lost/add', $fattr);
    ?>
    <div class="form-group">
        <?php echo form_input(array('name'=>'name', 'id'=> 'name', 'placeholder'=>'Item Name', 'class'=>'form-control', 'value' => set_value('name'))); ?>
        <?php echo form_error('name');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'place', 'id'=> 'place', 'placeholder'=>'Place Name', 'class'=>'form-control', 'value'=> set_value('place'))); ?>
        <?php echo form_error('place');?>
    </div>




    <!----testing image upload-->
    <div class="form-group">
        <label for="uploads">Upload Item's Photo</label>
        <input name="image" id="image" type="file" multiple="true">
    </div>

    <div class="form-group">
        <?php echo form_input(array('name'=>'place_details', 'id'=> 'place_details', 'placeholder'=>'Place Details', 'class'=>'form-control', 'value' => set_value('place_details'))); ?>
        <?php echo form_error('place_details') ?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'item_details', 'id'=> 'item_details', 'placeholder'=>'Item Description', 'class'=>'form-control', 'value' => set_value('item_details'))); ?>
        <?php echo form_error('item_details') ?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'contact', 'id'=> 'contact', 'placeholder'=>'Contact', 'class'=>'form-control', 'value' => set_value('contact'))); ?>
        <?php echo form_error('contact') ?>
    </div>
    <div class="form-group">
        <input type="date" name="lost_date" class="form-control" id="lost_date"
            value="<?php echo set_value('lost_date')?>">
        <?php echo form_error('lost_date') ?>
    </div>
    <?php echo form_submit(array('value'=>'Add', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>