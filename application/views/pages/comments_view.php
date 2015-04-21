<div class="container content">
    <div class="row margin-bottom-30">
        <!-- Bordered Funny Boxes -->
        <div class="col-md-12">
            <div class="funny-boxes funny-boxes-default">
                <div class="row">
                    <div class="col-md-4 funny-boxes-img">
                        <img alt="" src="assets/img/img10.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-8">
                        <h2><a href="#">Application1</a></h2>
                        <ul class="list-unstyled funny-boxes-rating">
                           <li><i class="fa fa-star"></i></li>
                           <li><i class="fa fa-star"></i></li>
                           <li><i class="fa fa-star"></i></li>
                           <li><i class="fa fa-star"></i></li>
                           <li><i class="fa fa-star"></i></li>
                        </ul>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum.</p>
                    </div>
                </div>                            
            </div>
        </div>
     </div>    
     <div class="col-md-12 text-right">
         <a href="#" id="addComment" class="btn-u btn-u-blue" >Add Comment</a>
     </div>
    <!-- End Bordered Funny Boxes -->
    <div class="table-search-v2 margin-bottom-20 funny-boxes" style="background: initial;">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>
                            <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                        </td>
                        <td class="td-width">
                            <h3><a href="#">Sed nec elit arcu</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                            <small class="hex">Joined February 28, 2014</small>
                        </td>
                        <td>
                           <ul class="list-unstyled funny-boxes-rating">
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                        </td>
                        <td>
                            <h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
                            <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                            <small class="hex">Joined March 2, 2014</small>
                        </td>
                        <td>
                            <ul class="list-unstyled funny-boxes-rating">
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                        </td>
                        <td>
                            <h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                            <small class="hex">Joined March 3, 2014</small>
                        </td>
                        <td>
                            <ul class="list-unstyled funny-boxes-rating">
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                        </td>
                        <td>
                            <h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                            <small class="hex">Joined March 4, 2014</small>
                        </td>
                        <td>
                            <ul class="list-unstyled funny-boxes-rating">
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
    <!--End Colored Funny Boxes -->
     <div class="modal fade" id="logInModal">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    				<h4 class="modal-title">Add Comment</h4>
    			</div>
    			<div class="modal-body">
    			    <div class="form-horizontal">
        				<div class="form-group">
        				    <div class="col-md-12">
        				        <textarea placeholder="Description" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-group-sm margin-bottom-0">
    		        		<div class="col-sm-6">
    		          			<form id="fileUploadForm" class="attached-form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/devices/uploadImage/" style="margin: 0">
                                    <input type="file" class="form-control" name="fileUpload" id="fileUpload" style="height: auto;">                        
                                    <input type="hidden" name="uploadDescription" id="uploadDescription" value="">
    							</form>
    		        		</div>
    		        		<div class="col-sm-3">
    		        		</div>
    		      		</div>      
		      		</div>           
    			</div>
    			<div class="modal-footer">
    				<a href="#" class="btn-u btn-u-blue">Add</a>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<script>
$(document).ready(function () {
	$("a#addComment").click(function () {
	    $("div#logInModal").modal('show');
	});
});
</script>