<!-- plan trip one trip tag clone div-->
<div id="clone_way_view" class="hide">
	<div class="way-point">
		<div class="way-index">
			<div id="index"><span></span></div>
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
				<i class="icon-sm fa fa-plus-circle" id='way_point_add' onclick="onClickTripItemAdd(this, true);"></i>
			</div>
			<div id="way_distance" class="col-md-5">
				<i class="icon-sm fa  fa-car"></i>
				<span></span>
			</div>
			<div id="way_time">
				<i class="icon-sm fa fa-history"></i>
				<span></span>
			</div>
		</div>
	</div>  
</div>

<!--places location infobox  clone div-->
<div id="infobox"></div>
<div class="infobox-wrapper">
    <div id="cloneInfobox">
        <div id="infoboxContainer">
            <div class="infobox-content">
                <div class="pull-left marginRight10">
                    <img src="" id="infoboxPhoto"/>
                </div>
                <div class="pull-left infobox-title">
                    <div id="infoboxLocationTitle">Location Title</div>
                    <div id="infoboxLocationSubTitle">Location SubTitle</div>
                </div>
            </div>
            <div class="clearboth"></div>
            <a id="infoboxBodyAreaOverlay" class="js-link" href="#"></a>
            <div id="infoboxBtnArea">
                <div style="width: 100%; border-radius: 4px !important; font-weight:bold;" id="btnRemoveToTrip" class="btn btn-danger btn-rectangle hide pull-left" onclick="onClickRemoveToTrip(this)"><i class="icon-remove icon-white"></i>&nbsp;REMOVE TO TRIP</div>
                <div style="width: 100%; border-radius: 4px !important; font-weight:bold;" id="btnAddToTrip" class="btn btn-success btn-rectangle btnAddToTrip pull-left" onclick="onClickAddToTrip(this)"><i class="icon-plus icon-white"></i>&nbsp;ADD TO TRIP</div>
                <div class="clearboth"></div>
            </div>
        </div>
    </div>
</div>