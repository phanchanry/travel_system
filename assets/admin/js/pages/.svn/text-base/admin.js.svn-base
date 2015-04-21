var Base_Url = document.location.origin;     
$(document).ready(function () {
	
	$('form#addUserForm').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
        	userName: {
                required: true,
                minlength: 2,
                maxlength: 35
            },
            userEmail: {
                required: true,
                email: true,
                maxlength: 40
            },
            userPassword: {
                required: true,
                minlength: 5
            }
        },

        messages: {
        },


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
	
	$("a#addNewUser").click(function () {
		var tempUrl = Base_Url + "/admin/home/addUser";
		if ($('form#addUserForm').valid()) {
			$('form#addUserForm').attr("action", tempUrl)
			$('form#addUserForm').ajaxForm({
				success: function(data) {
					if (data.result == "success") {
						alert("User added Successfully!");
						$("input[name='userName']").val("");
						$("input[name='userEmail']").val("");
						$("input[name='userPassword']").val("");
					} else if (data.result == "exist") {
						alert("Name or Email address already exist!");
						return;
					}
				}
			}).submit();
		}
	});
	//delete admin 
	$("a#deleteAdmin").click(function () {
		var objList = $("table#example2").find("input:checkbox:checked");
		if( objList.size() == 0 ){alert("Please select Administrator to delete."); return;}
		var strAdminIds = "";
		for( var i = 0 ; i < objList.size(); i ++ ){
			strAdminIds += objList.eq(i).val();
			if( i != objList.size() - 1)
				strAdminIds += ",";
		}
	    $.ajax({
	        url: "/admin/manage_user/deleteAdmin",
	        cache : false,
	        dataType : "json",
	        type : "POST",
	        data : { strAdminIds : strAdminIds },
	        success : function(data){
	            if(data.result == "success"){
	            	alert("Administrator deleted successfully.");
	            	for( var i = 0 ; i < objList.size(); i ++ ){
	            		objList.parents("tr").eq(i).remove();
	            	}
	            }
	        }
	    });		
	 });
	//delete user 
	$("button#deleteUser").click(function () {
		
		var objList = $("table#example1").find("input:checkbox:checked");
		if( objList.size() == 0 ){alert("Please select user to delete."); return;}
		var strUserIds = "";
		for( var i = 0 ; i < objList.size(); i ++ ){
			strUserIds += objList.eq(i).val();
			if( i != objList.size() - 1)
				strUserIds += ",";
		}
	    $.ajax({
	        url: Base_Url + "/admin/home/deleteUser",
	        cache : false,
	        dataType : "json",
	        type : "POST",
	        data : { strUserIds : strUserIds },
	        success : function(data){
	            if(data.result == "success"){
	            	alert("User deleted successfully.");
	            	for( var i = 0 ; i < objList.size(); i ++ ){
	            	objList.parents("tr").eq(i).remove();
	            	}
	            	window.location.reload();
	            }
	        }
	    });		
	 });
	//admin management page password check box change event
	$("input#changePwdCheck").change(function () {
		if ($(this).prop("checked"))
			$(this).parents("div.form-group").eq(0).next().removeClass("hide");
		else $(this).parents("div.form-group").eq(0).next().addClass("hide");
	});
	//admin management page save changed information
	$("a#editUser").click(function () {
		var tempUrl = Base_Url + "/admin/home/editUser";
		$("form#editUserForm").attr("action", tempUrl);
		$("form#editUserForm").ajaxForm({
			success: function (data) {
				if (data.result == "success") {
					alert("Updated Successfully!");
					return;
				} else alert ("Failed");
			}
		}).submit();
	});
});
