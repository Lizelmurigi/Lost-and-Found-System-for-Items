<div class="col-lg-6 col-lg-offset-2">
    <h2>Edit Item</h2>
    <h5>Hello <span><?php error_reporting(0); echo $first_name; ?></span>.</h5>
    <?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'lost/changeitem', $fattr); ?>


    <div class="form-group">
        <?php echo form_input(array('name'=>'name', 'id'=> 'name', 'placeholder'=>'Name', 'class'=>'form-control', 'value' => set_value('name', $groups->name))); ?>
        <?php echo form_error('name');?>
    </div>

    <div class="form-group">
        <?php echo form_input(array('name'=>'place', 'id'=> 'place', 'placeholder'=>'Place', 'class'=>'form-control', 'value'=> set_value('place'))); ?>
        <?php echo form_error('place');?>
    </div>


    <div class="form-group">
        <?php echo form_input(array('name'=>'place_details', 'id'=> 'place_details', 'placeholder'=>'Place Details', 'class'=>'form-control', 'value'=> set_value('place_details', $groups->place_details))); ?>
        <?php echo form_error('place_details');?>
    </div>



    <!---get image upload here---->

    <div class="form-group">
        <label for="uploads">Upload Item Photo</label>
        <input name="image" id="image" type="file" multiple="true">
    </div>
    <!--- end of image upload-->
    <div class="form-group">
        <?php echo form_input(array('name'=>'item_details', 'id'=> 'item_details', 'placeholder'=>'Item Details', 'class'=>'form-control', 'value'=> set_value('item_details', $groups->item_details))); ?>
        <?php echo form_error('item_details');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'lost_date', 'id'=> 'lost_date', 'placeholder'=>'Lost Date', 'class'=>'form-control', 'value'=> set_value('lost_date', $groups->lost_date))); ?>
        <?php echo form_error('lost_date');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'contact', 'id'=> 'contact', 'placeholder'=>'contact', 'class'=>'form-control', 'value'=> set_value('contact', $groups->contact))); ?>
        <?php echo form_error('contact');?>
    </div>

    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $groups->id;?>">
        <?php echo form_error('id') ?>
    </div>

    <?php echo form_submit(array('value'=>'Update', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>public/js/dropdown.js"></script>-->