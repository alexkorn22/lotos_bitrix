$(function(){
	var $registerForm = $(".bx-register-form");

	var authFormSubmit = function(event){
		var $formFields = $registerForm.find("input").removeClass("error");
		var emptyFields = false;
		var fieldMClub = $('input[name=UF_NUMBER_MCLUB]');
		var fieldPhone = $('input[name=UF_TMP_PHONE]');
		fieldMClub.val(fieldMClub.val().trim());
		if (fieldMClub.val() != '') {
			fieldPhone.data('required', 'required');
		} else {
			fieldPhone.data('required', 'not_required');
		}
		setLogin();
		var $userPersonalInfoReg = $registerForm.find("#userPersonalInfoReg");
		if(!$userPersonalInfoReg.prop("checked")){
			$userPersonalInfoReg.addClass("error");
			emptyFields = true;
		}

		$formFields.each(function(i, nextElement){
			var $nextElement = $(nextElement);
			if($nextElement.data("required") == "required"){
				if($nextElement.val() == ""){
					$nextElement.addClass("error");
					emptyFields = true;
				}
			}
		});

		if(emptyFields){
			return event.preventDefault();
		}

	};

	setLogin = function () {
		var email = $('input[name=USER_EMAIL]');
		var login = $('input[name=USER_LOGIN]');
		login.val(email.val().trim());
	}

	$registerForm.on("submit", authFormSubmit);

});