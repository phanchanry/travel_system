var Base_Url = document.location.origin;    
$(document).ready(function () {
	//user management page add function 
	$("#example1").dataTable();
	
	$('form#addPlaceCategoryForm').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
        	categoryTitle: {
                required: true,
                minlength: 2
            },
            categoryImage: {
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
            error.appendTo(element.closest('.form-group'));
        },

//        submitHandler: function (form) {
//        	
//        }
    });
	$('form#uploadMarkerImageForm').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            markerImage: {
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
	
	//place category image upload
	 $("input[name='categoryImage']").change(function(){
     	
 		$(this).closest("form").ajaxForm({
 			 success: function(data) {
 				if (data.result == "success") {
 					$("div#category_image_view").html(data.image);
 					//spinner.stop();
 				} else if(data.result == 'not_allowed') {
     				alert("This file Type not Allowed");
 				} else if (data.result == "max_exceed")
 					alert ("file size is over Maximum");
 			 } 
 		}).submit();
     });
	 //place  category marker image upload
	 $("input[name='markerImage']").change(function(){
	 		$(this).closest("form").ajaxForm({
	 			 success: function(data) {
	 				if (data.result == "success") {
	 					$("div#marker_image_view").html(data.image);
	 					//spinner.stop();
	 				} else if(data.result == 'not_allowed') {
	     				alert("This file Type not Allowed");
	 				} else if (data.result == "max_exceed")
	 					alert ("file size is over Maximum");
	 			 } 
	 		}).submit();
	     });
	//add place category on add place category page	
		$("a#addPlaceCategory").click(function () {
			if ($("input[name='categoryId']").length) {
				if ($('form#addPlaceCategoryForm').valid())
					placeCategorySubmit ();
			} else if ($('form#addPlaceCategoryForm').valid() && $('form#uploadMarkerImageForm').valid()) {
				placeCategorySubmit ();
			}
		});
	//delete place category event
	$("button#deleteCategory").click(function () {
		var tempUrl = Base_Url + "/admin/place_category/removeCategory"
		var objList = $("table#example1").find("input:checkbox:checked");
		if( objList.size() == 0 ){alert("Please select Place Category to delete."); return;}
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

function placeCategorySubmit () {
	var tempUrl = Base_Url + "/admin/place_category/addPlaceCategory";
	var imagePath1 = $("div#category_image_view").find("img").attr("src");
	$('form#addPlaceCategoryForm').find("input[name='categoryImagePath']").val(imagePath1);
	var imagePath2 = $("div#marker_image_view").find("img").attr("src");
	$('form#addPlaceCategoryForm').find("input[name='markerImagePath']").val(imagePath2);
	
	$('form#addPlaceCategoryForm').attr("action", tempUrl)
	$('form#addPlaceCategoryForm').ajaxForm({
		success: function(data) {
			if (data.result == "success") {
				if ($("input[name='categoryId']").length){
					alert("Updated Successfully!");
					return;
				}
				alert("Category added Successfully!");
				$("input[name='categoryTitle']").val("");
				$("input[name='categoryImage']").val("");
				$("input[name='markerImage']").val("");
				$("div#category_image_view").html("");
				$("div#marker_image_view").html("");
			} else if (data.result == 'exist') {
				alert("Category Name already exist.");
			}		
		}
	}).submit();
}