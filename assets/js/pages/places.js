$(document).ready(function () {
	History = window.History;
    var categoryCnt = $("div#place_category_view").find("div.place_category").length;
    for( var i = 0; i < categoryCnt; i ++){
        MarkerFindPlaceList[i] = [];

    }


    $("div.place_category").find("div.category_title").click(function () {
    	var categoryObj = $(this).closest("div.place_category");
        if (!categoryObj.hasClass('loaded'))
            categoryObj.addClass('loaded');
        else categoryObj.removeClass('loaded');
        var categoryName = $(this).justtext();
        var index = $("div#place_category_view").find("div.place_category").index($(this).closest("div.place_category"));
        $.ajax({
            url: Base_Url + "/trips/get_location_by_category_name",
            dataType: "json",
            type: "post",
            cache: false,
            data: { categoryName: categoryName},
            success: function (data) {
                if (data.result == "success") {
                	//categoryObj.find("div#location_cnt").text(data.tripLocationInfo.length);
                	var categoryInfo = data.categoryInfo; 
                    var locationNumbers = data.tripLocationInfo.length;
                	
                	var myLatlng;
                    var lat, lon, locationId;
                    var cntPlace = 0;

                    for (var i = 0; i < locationNumbers ; i++) {
          	      		  lat = data.tripLocationInfo[i].ts_lat;
          	    		  lon = data.tripLocationInfo[i].ts_lon;
          	    		  locationId = data.tripLocationInfo[i].location_id;
          	    		  myLatlng = new google.maps.LatLng(lat, lon);
       	   	    	  var imageUrl;
       	   	    	  
   	   	    		  imageUrl = categoryInfo[0]['ts_category_marker'];
       	   	    	  var image = {
           			  	url: imageUrl,
           			    size: new google.maps.Size(29, 40),
           			    origin: new google.maps.Point(0,0),
           			    anchor: new google.maps.Point(15, 37)
           	  			};
       	   	    	  var pos = i;
                        if (categoryObj.hasClass('loaded')) {
                            MarkerFindPlaceList[index][pos] = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                icon: image,
                                locationId: locationId
                            });
                            //var selectedRegionId = $("#regionList").val();
                        } else {
                          MarkerFindPlaceList[index][pos].setMap(null);
                        }
          	    		  //} else {
          	    			//  cntPlace ++;
          	    		  //}
          	    		  fnAddMarker( MarkerFindPlaceList[index][pos], "NORMAL" );
       	   	    	}
                    /*if (data.tripLocationInfo.length != 0) {
                        fnLoadPlacesOnMap( obj, placeCategory, placeSubCategory, findPlacesUaBucketId, Number( cntLoaded ) + Number( data.locationInfo.length ) );
                    }*/
                    /*else{
                        $("#panelFindPlacesListOverlay").hide();
                    }*/
                    	//cntPlace = Number( $(obj).find("div#findCountPlaces").eq(0).text() ) + cntPlace;
                    if (categoryObj.hasClass('loaded')) {
                        categoryObj.find("div#location_cnt").removeClass("hide");
                        categoryObj.find("div#location_cnt").text(data.tripLocationInfo.length);
                    } else {
                        categoryObj.find("div#location_cnt").text("");
                        categoryObj.find("div#location_cnt").addClass("hide");
                    }

                }
            }
        });
    });
    /* upload new place modal load*/
    $("div#upload_new_place").click(function () {
        var tempUrl = Base_Url + '/places/load_UNP_modal';
        $("div#ts_model").load(tempUrl, function () {
            //$("div#new_place_container").modal('show');
            $("div#new_place_container").on('show.bs.modal', function() {
                //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
                resizeMap();
            })
            $("div#new_place_container").modal('show');
        });
    })
});
function fnAddMarker( marker, type ){
    google.maps.event.addListener(marker, 'click', function() {
        fnGetLocationInfo( this.locationId, this, 1, type );
        IsOpenInfobox = 1;
    });

    google.maps.event.addListener(marker, 'mouseover', function() {
        if( IsOpenInfobox == 0 )
            fnGetLocationInfo( this.locationId, this, 0, type );
    });
    google.maps.event.addListener(marker, 'mouseout', function() {
        if( IsOpenInfobox == 0 )
            infobox.close();
    });
    google.maps.event.addListener( infobox,'closeclick',function(){
        IsOpenInfobox = 0;
    });
}
function fnGetLocationInfo( locationId, obj, option, type ){
    $.ajax({
        url: Base_Url + "/places/GetLocationDetail",
        dataType : "json",
        type : "POST",
        data : { locationId : locationId, detail : '0' },
        success : function(data){
            if (data.result == "success") {
                var uaLocationPhoto = data.location.ts_location_photo;

                var objInfobox;
                if( $("#infobox").find("div#infoboxLocationTitle").text( "" ) ){
                    objInfobox = $("#cloneInfobox").clone();
                    objInfobox.attr("id","infobox");
                    infobox.setContent( $(objInfobox).get(0) );
                }else{
                    objInfobox = $("#infobox");
                }
                var url;

                //if( type == "TRIP01" || type == "NORMAL" || type == "TRIP04" || type == "TRIP05"){
                    var arr = uaLocationPhoto.split("/");
                    var len = arr.length;
                    arr[ len ] = arr[ len - 1 ];
                    arr[ len - 1 ] = "small";
                    uaLocationPhoto = arr.join( "/" );

                    $(objInfobox).find("div#infoboxLocationTitle").text( data.location.ts_location_title );
                    /*if( type == "TRIP04" || type == "TRIP05"){ */
                    $(objInfobox).find("div#infoboxLocationSubTitle").text(data.location.ts_location_subtitle);
                   /* }else{
                        $(objInfobox).find("div#infoboxLocationSubTitle").show();
                        $(objInfobox).find("div#infoboxLocationSubTitle").text( data.location.ua_location_subtitle );
                    }*/
                    $(objInfobox).find("div#infoboxContainer").attr( 'location-id', data.location.location_id );
                    $(objInfobox).find("img#infoboxPhoto").attr("src", uaLocationPhoto );

                    var prefix = "";
                    if( type == "NORMAL" )
                        prefix = "locations";
                    /*url = data.location.ts_location_title.split(" ").join("-");
                    url = "/" + prefix + "/" + url + "/" + base64_encode(data.location.location_id);
                    $(objInfobox).find("a#infoboxBodyAreaOverlay").attr("href", url );*/

                    $(objInfobox).find("a#infoboxBodyAreaOverlay").click(function (event){
                        event.preventDefault();
                       //$("div#ts_model").html("");
                        var locationId = $(this).closest('div#infoboxContainer').attr('location-id');
                        var tempUrl = Base_Url + '/places/load_popup_container/' + locationId;
                        $("div#ts_model").load(tempUrl, function () {
                            $("div#popup_container").modal('show');
                        });
                    });
                }else{
                    $(objInfobox).find("a#infoboxBodyAreaOverlay").hide();
                }
            if ( type == "NORMAL" ) {
                $(objInfobox).find("#btnRemoveToTrip").hide();
                $(objInfobox).find("#btnAddToTrip").show();

                if ( option == 0 ) {
                    $(objInfobox).find("#infoboxBtnArea").removeClass("action");
                } else {
                    $(objInfobox).find("#infoboxBtnArea").addClass("action");
                }
                infobox.open(map, obj);

            }
        }
    });
}

function infoboxOverlay () {
    $("a#infoboxBodyAreaOverlay").click (function (e) {
        //$("div#ts_model").html("");
        var locationId = $(this).closest('div#infoboxContainer').attr('location-id');
        e.preventDefault();
        var tempUrl = Base_Url + '/places/load_popup_container/' + locationId;
        $("div#ts_model").load(tempUrl, function () {
            $("div#popup_container").modal('show');
        });
    });
}