$(document).ready(function () {
	$('form#loginForm').validate({
        errorElement: 'em', //default input error message container
        errorClass: 'invalid', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            email: {
                required: true
            },
            password: {
                required: true,
            },
        },

        messages: {
        	email: {
        		required: "Name or Email is required"
        	},
        	password: {
        		required: "Password is required"
        	}
        },


        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('label.input').addClass('state-error'); // set error class to the control group
        },

        success: function (label) {
            label.closest('label.input').removeClass('state-error');
            label.remove();
        },

        errorPlacement: function (error, element) {
            error.appendTo(element.closest('section'));
        },

//        submitHandler: function (form) {
//        	
//        }
    });
	
	$("button#login").click(function () {
		if ($('form#loginForm').valid()) {
			$('form#loginForm').attr("method", "post");
			$('form#loginForm').attr("action", Base_Url + "/user/loginSubmit")
			$('form#loginForm').ajaxForm({
                success: function (data) {
                    if (data.result == 'success')
                        window.location.reload();
                    else if (data.result == 'failed') {
                        var tempHtml = "<div class='alert alert-danger'>This Info is wrong. Please try again.</div>";
                        $("div.alert-box").html(tempHtml);
                    }

                }
            }).submit();
		}
        //<div class="alert alert-danger">This Info is wrong. Please try again.</div>
	});

    $("a#go_signup").click(function () {
        $("div#loginModal").modal('hide');
        $("div.modal-backdrop").remove();
        $("button#signUp").click();
    });
});