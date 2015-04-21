
<div class="wrapper">
	<div class="container custom-container ">          
		<div id="mainDrawer">                         
            <div id="drawer_toggles">
                <div id="trips_toggle" role="button">
                    <i class="fa fa-car"></i>
                    <span>Trips</span>
                </div>
                <div id="places_toggle" role="button">
                    <i class="fa  fa-stumbleupon"></i>
                    <span>Places</span>
                </div>
            </div>
            <div id="drawer">
                <div id="drawer_header" style="height: 45px;">
                    <h3 style="padding: 0px 15px;">Travel System</h3>
                </div>
                <div id="trips_view">
                    <div id="trips_view_detail" class="margin-bottom-20">
                    	<div id="trips_view">
                    		<div id="trips_image"></div>
                    	</div>
                    	<div id="trips_action">
                    		<div class="col-md-5" id="saved_trips_view">
                    			 <i class="fa fa-tags"></i> Saved Trips
                    		</div>
                    		<div class="col-md-4" id="trips_share">
                    			<i class="fa fa-share-square-o"></i> Share
                    		</div>
                    		<button class="btn-u btn-u-sea rounded btn-u-sm" id="save_trips_popup">Save</button>
                    	</div>
                    </div>
                    <div id="ways_wrap">
                    	<div class="dashed-line"></div>
                        <?php if (isset($userTripKey)) {
                            foreach ($tripLocation as $k => $locVal) {
                                ?>
                                <div id="way_view">
                                    <div class="way-point">
                                        <div class="way-index">
                                            <div id="index"><span><?php echo ($k + 1);?></span></div>
                                        </div>
                                        <div class="way-input">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <p class='form-control input-lg' name='tripLocationText' disabled>
                                                       <?php echo $locVal->ts_location_title;?></p>
                                                    <span class="input-group-addon"><i class="icon-2x fa fa-globe"></i></span>

                                                    <div id="trips_remove"><i class="fa fa-trash-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="way-detail row">
                                        <input type="hidden" id="tripItemDistanceValue"/>
                                        <input type="hidden" id="tripItemTimeValue"/>
                                        <input type="hidden" id="locationId"/>

                                        <div class="col-md-12" style="padding-left: 10px;">
                                            <div class="col-md-1" id="insert_way_point_toggle">
                                                <i class="icon-sm fa fa-plus-circle" id='way_point_add'
                                                   onclick="onClickTripItemAdd(this, true );"></i>
                                            </div>
                                            <div id="way_distance" class="col-md-5">
                                                <i class="icon-sm fa fa-car"></i>
                                                <span></span>
                                            </div>
                                            <div id="way_time">
                                                <i class="icon-sm fa fa-history"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                        ?>
                        <div id="way_view">
                            <div class="way-point">
                                <div class="way-index">
                                    <div id="index"><span>1</span></div>
                                </div>
                                <div class="way-input">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-lg" name="tripLocationText">
                                            <span class="input-group-addon"><i class="icon-2x fa fa-globe"></i></span>
                                            <div id="trips_remove"><i class="fa fa-trash-o"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="way-detail row">
                                <input type="hidden" id="tripItemDistanceValue" />
                                <input type="hidden" id="tripItemTimeValue" />
                                <input type="hidden" id="locationId" />
                                <div class="col-md-12" style="padding-left: 10px;">
                                    <div class="col-md-1" id="insert_way_point_toggle">
                                        <i class="icon-sm fa fa-plus-circle" id='way_point_add' onclick="onClickTripItemAdd(this, true );"></i>
                                    </div>
                                    <div id="way_distance" class="col-md-5">
                                        <i class="icon-sm fa fa-car"></i>
                                        <span></span>
                                    </div>
                                    <div id="way_time">
                                        <i class="icon-sm fa fa-history"></i>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
	            	</div>        
                </div>
                <div id="place_view">
                    <div class="tag-box tag-box-v4 text-center" id="upload_new_place">
                        <i class="icon-custom icon-color-grey rounded-x fa fa-plus"></i>
                        <span style="margin-left: 6px; line-height: 40px;font-size: 19px;font-weight: bold;color: #95a5a6;">Upload New Place</span>
                    </div>
                    <div id="place_category_view">
                        <?php foreach ($categoryLists as $key => $v) {?>
                        <div class="tag-box tag-box-v3 place_category row" style="padding: 0px; margin: 20px 15px;">
                            <div class="col-md-9 col-xs-9" style="line-height: 50px; padding-right: 0;">
                                <div class="category_title col-md-10">
                                    <i class="icon-color-grey fa fa-angle-left" style="margin-right: 10px;"></i><?php echo $v->ts_category_title;?>
                                </div>
                                <div id="location_cnt" class="hide">
                                    
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px;"><img class="pull-right" src="<?php echo $v->ts_category_image;?>" style="border-left: 1px solid #eee; width: 50px; height: 50px;" /></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="trip_save_view" class="hide">
	            	<div id="settings">
                    	<div id="trips_setting_image" class="margin-bottom-20">
                    	</div>
	            		<form id="tripsSaveForm" method="post">
	            			<div class="form-group">
	            				<label>Trip Title</label>
	            				<input type="text" class="form-control" name="trips_name" />
	            			</div>
	            			<div class="form-group">
	            				<label>Trip Description</label>
	            				<textarea rows="9" class="form-control" name="trips_description" ></textarea>
	            			</div>
	            			<input type="hidden" name="trips_page_title" value="" />
	            		</form>
	            		<div class="text-center margin-bottom-10">
	            			<a href="#" id="trip_save" class="btn-u btn-u-sea btn-u-sm rounded">Save</a>
	            			<a href="#" id="trip_save_cancel" class="btn-u btn-u-default btn-u-sm rounded col-md-offset-2">Cancel</a>
	            		</div>
	            	</div>
	            </div>
            </div>
		</div>
        <div id="top_menu_view">
            <div id="top_menu" class="row no-margin">
                <div  class="col-md-3 col-sm-3 no-padding">
                    <h3 style="padding: 0px 15px;">Travel System</h3>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-8">
                    <div class="input-group" id="quick_search" style="margin: 5px 5px 0 0;">
                        <input type="text" class="form-control" placeholder="Search Location...">
                        <span class="input-group-btn">
                            <button class="btn-u btn-u-sea" type="button" id="search_remove"><i class="fa  fa-times"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4">
                    <a href="#" id="get_my_gps">
                        <p class="no-bottom-space"><i class="fa fa-map-marker icon-custom icon-sm no-border margin-top-5 icon-color-dark"></i><span>GPS</span></p>
                    </a>
                </div>
                <?php if (!$this->session->userdata('IS_FRONT_LOGIN')) {?>
                <div class="pull-right" id="login_view">
                    <button class="btn-u btn-u-yellow rounded" type="button" id="signUp">Sign Up</button>
                    <button class="btn-u btn-u-default rounded" type="button" id="logIn">Log In</button>
                </div>
                <?php } else {?>
                <div id="account_view">
		            <div id="user_view" class='dropdown'>
			            <a href="#" class="dropdown-toggle" id="accountdropdown" data-toggle="dropdown">
			                <i class="rounded-x fa fa-user icon-2x rounded-x" style="vertical-align: middle;"></i>
			            </a>
			            <ul class="dropdown-menu" role="menu" aria-labelledby="accountdropdown">
			              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()?>user/logout">Log Out</a></li>
			            </ul>
		            </div>
		        </div>
                <?php }?>
            </div>
        </div>
        <div id="map_view">
            <div id="mapCanvas"></div>
        </div>
        <div id="ts_model"></div>
	</div>
</div>
<?php $this->load->view('pages/clone_view');?>
<script>
    $(document).ready(function () {
        <?php
        if (isset($userTripKey)) { ?>
            $("div#trips_toggle").click();
            fnDrawPlanTrip();
        <?PHP } else { ?>
            onClickTripItemAdd(null, true);
        <?php } ?>
    });
</script>