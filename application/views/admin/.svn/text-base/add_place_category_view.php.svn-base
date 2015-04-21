<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>datatables/dataTables.bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>style.css">
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.dataTables.js"></script>    
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>dataTables.bootstrap.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>table-managed-tables.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.validate.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>pages/place_category.js"></script>
<div id="main-content" style="margin-left: 225px;">
    <div id="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Place Category Management&nbsp;</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a href="/admin">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                        <a href="/admin/home">Place Category Management</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">Add Place Category</li>
                </ol>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="portlet portlet-tertiary">
                <div class="portlet-header" style="padding: 7px 10px;">
                    <div class="caption" style="margin: 0;line-height: 26px;">
                        Add Place Category
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body form-horizontal">
                        <form role="form" id="addPlaceCategoryForm" method="post">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Title<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="categoryTitle"/>
                                </div>
                            </div>
                            <input type="hidden" name="categoryImagePath" />
                            <input type="hidden" name="markerImagePath" />
                         </form>   
                         <div class="form-group">
                            <label class="col-md-3 control-label">Category Image</label>
                            <div class="col-md-4">
                               <form id="uploadCategoryImageForm" class="attached-form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/place_category/uploadCategoryImage" style="margin: 0">
                                    <input type="file" class="form-control" name="categoryImage" style="height: auto;">                        
								</form>
                            </div>
                            <div class="col-md-2" id="category_image_view" >
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label">Marker Image<span class="required">*</span></label>
                            <div class="col-md-4">
                               <form id="uploadMarkerImageForm" class="attached-form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/place_category/uploadMarkerImage/" style="margin: 0">
                                    <input type="file" class="form-control" name="markerImage" id="fileUpload" style="height: auto;">                        
							   </form>
                            </div>
                            <div class="col-md-2" id="marker_image_view">
                                
                            </div>
                         </div>
                     </div>
                    <div class="form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="#" id="addPlaceCategory" class="btn btn-primary">Save</a>
                            &nbsp;
                            <a href="<?php echo base_url();?>admin/place_category" class="btn btn-danger">List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">tableManaged.init();</script>