<style type="text/css">
a {
    padding-left: 5px;
    padding-right: 5px;
    margin-left: 5px;
    margin-right: 5px;
}
</style>
<div class="container">
    <h2>Lost Items</h2>
    <br />
    &nbsp <a href="<?php base_url() ?>../lost/add" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i>Add
        Found item</a>
    <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <button class="btn btn-danger" onclick="bulk_delete()"><i class="glyphicon glyphicon-trash"></i> Bulk Delete</button> -->
    <br />
    <!-- Search form (start) -->
    <div>
        <form method='post' action="<?= base_url() ?>/lost/lists">
            <input type='text' name='search' placeholder="Please Enter name or place and search" class="form-control"
                value='<?= $search ?>'><input type='submit' class="btn btn-clear" name='submit' value='Search'>
        </form>
    </div>
    <table id="Table1" class="table table-hover table-bordered dataTable js-exportable">

        <tr>
            <th>
                #
            </th>

            <th>
                Item Name
            </th>
            <th>
                Place Details
            </th>
            <th>
                Item Description
            </th>
            <th>
                Photo
            </th>

            <th>
                Contacts
            </th>

            <th colspan="2">
                Edit
            </th>
        </tr>

        <?php
                $sno = $row+1;
                    foreach($groups as $row)
                    { 
                    
                    
                    echo '<tr>';
                    echo '<td>'.$sno.'</td>';
                    //echo '<td>'.$row->student_id.'</td>';
                    echo '<td>'.$row->name.'</td>';
                    echo '<td>'.$row->place.'</td>';
                    echo '<td>'.$row->item_details.'</td>';
                    echo '<td>'.$row->image.'</td>';
                    echo '<td>'.$row->contact.'</td>';
                    //echo '<td>'.$row->image.'</td>';
                    echo '<td><a href="'.site_url().'lost/changeitem/'.$row->id.'"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i></button></a>
                     <a href="'.site_url().'lost/deleteitem/'.$row->id.'"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove-sign" aria-hidden="true"></i></button></a></td>';
                    //echo '<td></td>';
                    echo '</tr>';
                    $sno++;
                    }
                ?>
    </table>
    <div style='margin-top: 10px;'>
        <?= $pagination; ?>
    </div>
</div>