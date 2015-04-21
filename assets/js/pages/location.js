var marker1;
var map1;
var addedSubCategoryId;
var addedName = [];
function initialize() {
    var tempLat = $("input[name='locationLat']").val();
    var tempLon = $("input[name='locationLon']").val();
    if (tempLat == "" & tempLon == ""){
        tempLat = "53.4807593";
        tempLon = "-2.2426305";
    }

    var myLatlng = new google.maps.LatLng( Math.round(tempLat*100000)/100000, Math.round(tempLon*100000)/100000);
    var mapOptions = {
        zoom: 8,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map1 = new google.maps.Map(document.getElementById('newPlace_mapCanvas'), mapOptions);

    marker1 = new google.maps.Marker({
        position: myLatlng,
        map: map1
    });

    var geocoder = new google.maps.Geocoder();

    google.maps.event.addListener(map1, 'click', function(e) {
        geocoder.geocode(
            {'latLng': e.latLng},
            function(results , status ) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        if (marker1) {
                            marker1.setMap(map1);
                            marker1.setPosition(e.latLng);
                            $("input[name='locationLat']").val(Math.round(results[0].geometry.location.lat()*100000)/100000);
                            $("input[name='locationLon']").val(Math.round(results[0].geometry.location.lng()*100000)/100000)
                        } else {
                            marker1 = new google.maps.Marker({
                                position: e.latLng,
                                map: map1});
                        }
                    } else {
                        alert( 'No results found');
                        return;
                    }
                } else {
                    alert('Geocoder failed due to: ' + status );
                    return;
                }
            });
    });
}

google.maps.event.addDomListener(window, "resize", resizingMap());
function resizeMap() {
    if(typeof map1 =="undefined") return;
    setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
    if(typeof map1 =="undefined") return;
    var center = map1.getCenter();
    google.maps.event.trigger(map1, "resize");
    map1.setCenter(center);
}
//google.maps.event.addDomListener(window, 'load', initialize);

function placeLocationSubmit () {
    var tempUrl = Base_Url + "/admin/location/saveLocation";
    var imagePath1 = $("div#location_image_view").find("img").attr("src");
    $('form#addLocationForm').find("input[name='locationImage']").val(imagePath1);

    $('form#addLocationForm').attr("action", tempUrl);
    $('form#addLocationForm').ajaxForm({
        success: function(data) {
            if (data.result == "success") {
                if ($("input[name='locationId']").length){
                    alert("Updated Successfully!");
                    return;
                }
                alert("location added Successfully!");
                $("input[name='locationTitle']").val("");
                $("input[name='locationSubTitle']").val("");
                $("textarea[name='locationAddress']").val("");
                $("input[name='locationImageUpload']").val("");
                $("textarea[name='locationDescription']").val("");
                $("div#location_image_view").html("");
            } else if (data.result == 'exist') {
                alert("Location Name already exist.");
            }
        }
    }).submit();
}
$(document).ready(function () {
    $('div#newPlace_mapCanvas').attr("style", "");
    initialize();
    $('form#addLocationForm').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            locationTitle: {
                required: true,
                minlength: 2
            },
            locationSubTitle: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            locationDescription: {
                required: true,
                minlength: 10
            }
        },

//        messages: {
//        },


        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
            label.remove();
        },

        errorPlacement: function (error, element) {
            error.appendTo(element.closest('div'));
        },

//        submitHandler: function (form) {
//
//        }
    });
    $('form#uploadLocationImageForm').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            locationImageUpload: {
                required: true
            }
        },

//        messages: {
//        },


        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
            label.remove();
        },

        errorPlacement: function (error, element) {
            error.appendTo(element.closest('form'));
        },

//        submitHandler: function (form) {
//
//        }
    });


    //find map click function
    $("a#findOnMap").click(function () {
        var tempUrl = Base_Url + "/admin/location/getLocationInfoFromAddress";
        var address = $("textarea[name='locationAddress']").val();
        $.ajax({
            url: tempUrl,
            cache : false,
            dataType : "json",
            type : "POST",
            data : { address : address },
            success : function(data){
                if( data.result == "success" ){
                    var lat = data.location[0].geometry.location.lat;
                    var lng = data.location[0].geometry.location.lng;
                    $("input[name='locationLat']").val( lat );
                    $("input[name='locationLon']").val( lng );
                    marker1.setMap( null );

                    marker1 = new google.maps.Marker({
                        position: new google.maps.LatLng( lat, lng ),
                        map: map1
                    });
                    map1.setCenter(new google.maps.LatLng( lat, lng ) );
                }else{
                    alert("There is no location with this address.");
                    return;
                }

            }
        });
    });
    //upload location image
    $("input[name='locationImageUpload']").change(function(){

        $(this).closest("form").ajaxForm({
            success: function(data) {
                if (data.result == "success") {
                    $("div#location_image_view").html(data.image);
                    //spinner.stop();
                } else if(data.result == 'not_allowed') {
                    alert("This file Type not Allowed");
                } else if (data.result == "max_exceed")
                    alert ("file size is over Maximum");
                else if (data.result == 'login_failed') {
                    alert("Please Login First!");
                }
            }
        }).submit();
    });

    //save location on add place category page
    $("a#saveLocation").click(function () {
        if ($("input[name='locationId']").length) {
            if ($('form#addLocationForm').valid())
                placeLocationSubmit ();
        } else if ($('form#addLocationForm').valid() && $('form#uploadLocationImageForm').valid()) {
            placeLocationSubmit ();
        }
    });
    //delete location event
    $("a#deleteLocation").click(function () {
        var tempUrl = Base_Url + "/admin/location/removeLocation"
        var objList = $("table#example1").find("input:checkbox:checked");
        if( objList.size() == 0 ){alert("Please select Location to delete."); return;}
        if (!confirm("Are you Sure?")) return;
        var strIds = "";
        for( var i = 0 ; i < objList.size(); i ++ ){
            strIds += objList.eq(i).val();
            if( i != objList.size() - 1)
                strIds += ",";
        }
        $.ajax({
            url: tempUrl,
            cache : false,
            dataType : "json",
            type : "POST",
            data : { strIds : strIds },
            success : function(data){
                if(data.result == "success"){
                    alert("Place Category deleted successfully.");
                    for( var i = 0 ; i < objList.size(); i ++ ){
                        objList.parents("tr").eq(i).remove();
                    }
                    window.location.reload();
                }
            }
        });
    });
});