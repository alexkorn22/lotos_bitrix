$(function(){
	var $registerForm = $(".bx-register-form");

	var authFormSubmit = function(event){
		console.log('wtrer');
		var $formFields = $registerForm.find("input").removeClass("error");
		var emptyFields = false;
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
		var email = $('input[name=EMAIL]');
		var login = $('input[name=LOGIN]');
		login.val(email.val().trim());
	}

	$registerForm.on("submit", authFormSubmit);
	$('#isInMClub').on("change", changeIsInMClub)

});

changeIsInMClub = function (event) {
	var checked = false;
	console.log(event);
	if (event) {
		checked = this.checked;
		$('.MClub').toggle(500);
	} else {
		checked = $('#isInMClub').checked;
	}

	var fieldMClub = $('input[name=UF_NUMBER_MCLUB]');
	var fieldPhone = $('input[name=PERSONAL_MOBILE]');
	var fieldFio = $('input[name=FIO]');
	var elements = [fieldMClub, fieldPhone, fieldFio];
	var valueReq = 'not_required';
	if (this.checked) {
		valueReq = 'required';
	} else {
		fieldMClub.val('');
	}

	var count = elements.length;
	for (var i = 0; i < count; i++) {
		elements[i].data('required',valueReq);
	}

};