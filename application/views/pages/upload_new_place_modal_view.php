<script src="<?php echo HTTP_JS_PATH; ?>pages/location.js"></script>
<div class="modal fade bs-example-modal-lg" id="new_place_container" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 100%">
            <div class="modal-body" style="width: 100%">
                <div class="new_place_header heading heading-v2 margin-bottom-20">
                    <h2>Upload New Place</h2>
                </div>
                <div class="row" style="width: 100%">
                    <div class="new_place_body col-md-offset-1 col-md-10">
                        <div class="form-body form-horizontal" style="width: 100%;">
                            <form role="form" id="addLocationForm" method="post" novalidate="novalidate" style="width: 100%;">
                                <input type="hidden" name="locationImage">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Location Title<span class="color-red">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" name="locationTitle" placeholder="Enter Location Title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Location Sub Title<span class="color-red">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" name="locationSubTitle" placeholder="Enter Location Title"class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Location Category<span class="color-red">*</span></label>
                                    <div class="col-md-7">
                                        <select name="locationCategory" class="form-control">
                                        <?php
                                            foreach ($categoryList as $key => $value) {
                                                echo "<option value='".$value->category_id."'>".$value->ts_category_title."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Location Address</label>
                                    <div class="col-md-5">
                                        <textarea name="locationAddress" rows="3" placeholder="Location Address" class="form-control"></textarea>
                                    </div>
                                    <a href="#" id="findOnMap" class="btn-u btn-u-aqua btn-u-sm text-center">Find <br>on Map</a>
                                </div>
                                <div class="form-group">
                                    <div id="newPlace_mapCanvas" style="width: 100%; height: 250px; margin: 10px;"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Location Description<span class="color-red">*</span></label>
                                    <div class="col-md-8">
                                        <textarea name="locationDescription" rows="12" placeholder="Location Description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="locationLat" value="53.480759">
                                <input type="hidden" name="locationLon" value="-2.242631">
                            </form>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Location Image<span class="color-red">*</span></label>
                                <div class="col-md-7">
                                    <form id="uploadLocationImageForm" class="attached-form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>places/uploadLocationImage" style="margin: 0" novalidate="novalidate">
                                        <input type="file" class="form-control" name="locationImageUpload" style="height: auto;">
                                    </form>
                                    <br>
                                    <div class="col-md-2" id="location_image_view">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <a href="#" id="saveLocation" class="btn-u btn-u-sea">Save Place</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>