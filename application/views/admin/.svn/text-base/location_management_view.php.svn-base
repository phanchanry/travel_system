<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>datatables/dataTables.bootstrap.css">
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.dataTables.js"></script>    
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>dataTables.bootstrap.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>table-managed-tables.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>jquery.validate.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=en&sensor=false&libraries=places"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>pages/location.js"></script>
<style>
pre{
    margin: 0px;
    padding: 0px;
    border-width: 0px;
    background-color: transparent;
}
</style>
<div id="main-content" style="margin-left: 225px;">
    <div id="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Location Management&nbsp;</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Location Management</li>
                </ol>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="portlet portlet-default">
                <div class="portlet-header" style="padding: 7px 10px;">
                    <div class="caption" style="margin: 0;line-height: 26px;">
                        Location Lists
                    </div>
                    <div class="tools">
                        <a href="<?php echo base_url()?>admin/location/add" class="btn btn-info">Add</a>
                        <a href="#" class="btn btn-danger" id="deleteLocation">Delete</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table id="example1" cellpadding="0" cellspacing="0" border="0"
                               class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="3%">#</th>
                                <th width="3%">No</th>
                                <th width="20%">Title</th>
                                <th width="10%">Lat</th>
                                <th width="10%">Lon</th>
                                <th width="8%">Photo</th>
                                <th width="10%">Added Date</th>
                                <th width="9%">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($locationLists != null) {
                                foreach ($locationLists as $k => $v) {
                            ?>
                                <tr class="odd gradeA">
                                    <td><input type="checkbox" value="<?php echo $v->location_id;?>" id="questionId" /></td>
                                    <td><?php echo  $k + 1;?></td>
                                    <td><?php echo $v->ts_location_title;?></td>
                                    <td><?php echo $v->ts_lat;?></td>
                                    <td><?php echo $v->ts_lon;?></td>
                                    <td><img src="<?php echo $v->ts_location_photo;?>" style="width: 50px; height: 50px;"/></td>
                                    <td><pre><?php echo $v->ts_created_time;?></pre></td>
                                    <td><a href="<?php echo base_url();?>admin/location/edit/<?php echo $v->location_id;?>" class="btn btn-tertiary btn-xs" id="editQuestion" style="margin-right: 5px;"><i class="fa fa-edit"></i>Edit</a>
                                </tr>
                           <?php
                               } 
                           }
                           ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">tableManaged.init();</script>