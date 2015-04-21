<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>datatables/dataTables.bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>style.css">
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.dataTables.js"></script>    
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>dataTables.bootstrap.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>table-managed-tables.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>jquery.validate.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>pages/place_category.js"></script>
<div id="main-content" style="margin-left: 225px;">
    <div id="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Place Category Management&nbsp;</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Place Category Management</li>
                </ol>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="portlet portlet-default">
                <div class="portlet-header" style="padding: 7px 10px;">
                    <div class="caption" style="margin: 0;line-height: 26px;">
                      Category Lists
                    </div>
                    <div class="tools">
                        <a href="<?php echo base_url();?>admin/place_category/add" class="btn btn-info" id="addUser">Add</a>
                        <button type="button" class="btn btn-danger" id="deleteCategory">Remove</button>
                    </div>
                </div>
                <div class="portlet-body">
                   <div class="table-responsive">
                        <table id="example1" cellpadding="0" cellspacing="0" border="0"
                               class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Category Title</th>
                                <th>Category Image</th>
                                <th>Marker Image</th>
                                <th>Added Date</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ($categoryList == null)
                                    return;
                                foreach ($categoryList as $key => $v) {
                            ?>
                                <tr class="odd gradeA">
                                    <td><input type="checkbox" value="<?php echo $v->category_id;?>" id="categoryId" /></td>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $v->ts_category_title; ?></td>
                                    <td><img src="<?php echo $v->ts_category_image;?>" style="width: 50px; height: 50px;"/></td>
                                    <td><img src="<?php echo $v->ts_category_marker;?>" style="width: 50px; height: 50px;"/></td>
                                    <td><?php echo $v->ts_updated_time;?></td>
                                    <td style="text-align: right;"><a href="<?php echo base_url();?>admin/place_category/edit/<?php echo $v->category_id;?>" class="btn btn-secondary btn-xs" id="assignPages">Edit</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">tableManaged.init();</script>