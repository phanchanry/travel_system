$(document).ready(function () {
    //check user login or not 
	  $.ajax({
		  url: Base_Url + "/home/checkUserLogIn",
		  dataType : "json",
		  type : "POST",
		  data : { },
		  success : function(data){
	      if (data.result == "success") {
	      	IsLogin = data.isLogin;
	      }
	  }
	});	
    /* trip menu on left menu toggle show hidden   */
    $("div#trips_toggle").click(function (e) {
        if ($("div.custom-container").hasClass("draw-open") && $(this).hasClass("active")) {
            $("div.custom-container").removeClass("draw-open");
            $(this).parent().find("div[role='button']").removeAttr("class");
            return;
        } else {
            $("div.custom-container").addClass("draw-open");
        }
        if (!$(this).hasClass("active")) {
            $("div#place_view").hide();
            $("div#trips_view").show();
            $("div#trip_save_view").addClass("hide");
            $(this).attr("class", "active");
            $(this).closest("div#drawer_toggles").find("div#places_toggle").attr("class", "deactive");
        }
    });

     /* place menu on left menu toggle show hidden   */
    $("div#places_toggle").click( function () {
        
        if ($("div.custom-container").hasClass("draw-open") && $(this).hasClass("active")) {
            $("div.custom-container").removeClass("draw-open");
            $(this).parent().find("div[role='button']").removeAttr("class");
            return;
        } else {
            $("div.custom-container").addClass("draw-open");    
        }
        
        if (!$(this).hasClass("active")) {
        	$("div#trip_save_view").addClass("hide");
        	$("div#place_view").show();
        	$("div#trips_view").hide();
            $(this).attr("class", "active");
            $(this).closest("div#drawer_toggles").find("div#trips_toggle").attr("class", "deactive");
        }
    });
     //login modal load
    $("button#logIn").click(function () {
        var tempUrl = Base_Url + '/user/load_login_modal';
        $("div#ts_model").load(tempUrl, function () {
            $("div#loginModal").modal('show');
        });
    });
     //sign Up modal load
    $("button#signUp").click(function () {
        var tempUrl = Base_Url + '/user/load_signup_modal';
        $("div#ts_model").load(tempUrl, function () {
            $("div#loginModal").modal('show');
        });
    });
    infowindow = new google.maps.InfoWindow({ content: "" });	

	

	geocoder = new google.maps.Geocoder();
    //google map initialize
    //function initialize() {
	  var mapOptions = {
	    zoom: 8,
	    center: new google.maps.LatLng(53.4807593, -2.2426305)
	  };
	  map = new google.maps.Map(document.getElementById('mapCanvas'),
	      mapOptions);
	//}
   // google.maps.event.addDomListener(window, 'load', initialize);

    infobox = new InfoBox({

        content: document.getElementById("infobox"),
        disableAutoPan: false,
        maxWidth: 150,
        pixelOffset: new google.maps.Size(-120, 0),
        zIndex: null,
        boxStyle: {
            opacity: 1,
            width: "252px"
        },
        closeBoxMargin: "0px 0px 0px 0px",
        closeBoxURL: Base_Url + "/assets/img/infoBoxClose.png",
        infoBoxClearance: new google.maps.Size(1, 1)

    });



    google.maps.event.addListener(map, "click", function(){
        IsOpenInfobox = 0;
        infobox.close();
    });
    /* quick search function */
    $("div#quick_search").find("input").autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: Base_Url + "/home/searchLocation",
                dataType: "json",
                data: {
                    maxRows: 12,
                    keyword: request.term,
                    searchAll : true
                },
                type : "POST",
                success: function( data ) {
                    if( data.location != null ){
                        response( $.map( data.location, function( item ) {
                            return {
                                locationList : data.location,
                                location: item.ts_location,
                                title: item.ts_location_title,
                                lat : item.ts_lat,
                                lon : item.ts_lon,
                                value: item.ts_location_title
                            }
                        }));
                    }
                }
            });
        },
        minLength: 2,
        select: function( event, ui ) {
            if( ui.item.lat == 0 && ui.item.lon == 0 ){
                for( var i = 0 ; i < MarkerSearch.length; i ++ ){
                    MarkerSearch[i].setMap( null );
                }
                MarkerSearch = [];

                for( var i = 1 ; i < ui.item.locationList.length; i ++ ){
                    var lat = ui.item.locationList[i].ua_location_lat;
                    var lon = ui.item.locationList[i].ua_location_lon;
                    var locationId = ui.item.locationList[i].ua_location;

                    fnAddMarkerSearch( lat, lon, locationId );

                }
            }else{
                // if searched, set marker and move focus
                var lat = ui.item.lat;
                var lon = ui.item.lon;
                var locationId = ui.item.location;

                for( var i = 0 ; i < MarkerSearch.length; i ++ ){
                    MarkerSearch[i].setMap( null );
                }

                MarkerSearch = [];
                fnAddMarkerSearch( lat, lon, locationId );
            }

        },

        open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            $(this).autocomplete('widget').css('z-index', 300);
        },

        close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }

    });
    $("button#search_remove").click(function () {
        $("div#quick_search").find("input").val( "" );
    });

    $("a#get_my_gps").click(function () {
        var thisObj = $(this);
        if (thisObj.find("i").hasClass("icon-color-dark")) {
            thisObj.find("i").removeClass("icon-color-dark");
            thisObj.find("i").addClass("icon-color-blue");
            thisObj.find("span").addClass("color-blue");
            fnHighlightCurrentLocation( );
            nIntervalId = setInterval( function(){
                fnHighlightCurrentLocation( );
            }, 30000);
        } else {
            thisObj.find("i").removeClass("icon-color-blue");
            thisObj.find("i").addClass("icon-color-dark");
            thisObj.find("span").removeClass("color-blue");
            clearInterval( nIntervalId );
            markerCurrentLocation.setMap( null );

        }
    });
});

function fnAddMarkerSearch( lat, lon, locationId ){
    var pos = MarkerSearch.length;
    var myLatlng = new google.maps.LatLng( lat, lon);

    var image = {
        url: Base_Url + '/assets/img/markerSearch.png',
        size: new google.maps.Size(29, 40),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point(15, 37)
    };
    MarkerSearch[pos] = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: image,
        locationId : locationId
    });

    map.setCenter(new google.maps.LatLng( lat, lon ) );
    map.setZoom( 16 );
    fnAddMarker( MarkerSearch[pos], "NORMAL" );
}
/* get location */
var nIntervalId;
function fnHighlightCurrentLocation( ){
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var image = {
                url:  Base_Url + '/assets/img/markerCurrent.png',
                size: new google.maps.Size(29, 40),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(15, 37) };
            if( markerCurrentLocation != null )
                markerCurrentLocation.setMap( null );

            markerCurrentLocation = new google.maps.Marker({
                position: pos,
                map: map,
                icon: image
            });
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': pos}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        google.maps.event.addListener(markerCurrentLocation, 'click', function() {
                            var strContent = "";
                            strContent += "<p>";
                            strContent += results[1].formatted_address;
                            strContent += "</p>";
                            strContent += "<div style='text-align:center;'>";
                            strContent += "<button class='btn btn-rectangle btn-success btn-mini' onclick='onAddToTripCurrentLocation(" + pos.lat() + "," + pos.lng() + ",\"" + results[1].formatted_address + "\")'>" + _lang("ADD TO TRIP") + "</button>";
                            strContent += "</div>";

                            infowindow.setContent( strContent );
                            infowindow.open( map, markerCurrentLocation );
                        });
                    }
                } else {
                    // alert("Can't get the current location.");
                }
            });
            map.setCenter(pos);
        }, function() {
            alert(_lang("Can't get the current location."));
            clearInterval( nIntervalId );
            return;
        });
    }else {
        alert(_lang("Can't get the current location."));
        clearInterval( nIntervalId );
        return;
    }
}
