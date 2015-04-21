<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>datatables/dataTables.bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>style.css">
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.dataTables.js"></script>    
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>dataTables.bootstrap.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>table-managed-tables.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>jquery.validate.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>pages/admin.js"></script>
<div id="main-content" style="margin-left: 225px;">
    <div id="page-header">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">User Management&nbsp;</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a href="/admin">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                        <a href="/admin/home">User Management</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            <div class="portlet portlet-tertiary">
                <div class="portlet-header" style="padding: 7px 10px;">
                    <div class="caption" style="margin: 0;line-height: 26px;">
                        Edit User
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" id="editUserForm" method="post">
                    <?php foreach ($userInfo as $k=>$v) {?>
                        <div class="form-body">
                            <input type="hidden" name="userId" value="<?php echo $v->user_id;?>" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">User Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="userName" value="<?php echo $v->ts_name; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">User Email</label>
                                <div class="col-md-4">
                                    <input type="text" name="userEmail" value="<?php echo $v->ts_email; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-4">
                                    <input type="password" name="userPassword" placeholder="Password" class="form-control">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-3 control-label">Set User Role</label>
                                 <div class="col-md-4">
                                 <?php 
                                     if ($v->ts_is_admin == "Y") {
                                        $checked = "checked";
                                     } else $checked = "";  
                                 ?>
                                    <input type="checkbox" name="userType" id="userType" <?php echo $checked; ?>> <span>Administrator(Full Account Access)</span>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <div class="form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="#" id="editUser" class="btn btn-primary">Save</a>
                                &nbsp;
                                <a href="/admin/home" class="btn btn-danger">List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">tableManaged.init();</script>