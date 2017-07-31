$(function(){
	var $registerForm = $(".bx-register-form");

	var authFormSubmit = function(event){
		console.log('wtrer');
		var $formFields = $registerForm.find("input").removeClass("error");
		var emptyFields = false;
		// var fieldMClub = $('input[name=UF_NUMBER_MCLUB]');
		// var fieldPhone = $('input[name=PERSONAL_MOBILE]');
		// fieldMClub.val(fieldMClub.val().trim());
		// if (fieldMClub.val() != '') {
		// 	fieldPhone.data('required', 'required');
		// } else {
		// 	fieldPhone.data('required', 'not_required');
		// }

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

	$registerForm.on("submit", authFormSubmit);
});