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

var BlockAddInfo = function (showBlock) {
	this.block = $('#blockAddDataRegister');
	this.aOpenClose = $('#aAddDataRegister');
	this.checkIsInMClub = $('#isInMClub');
	this.showBlock = showBlock;
	var self = this;
	this.constructor = function () {
		if (!self.showBlock) {
			this.block.hide();
		}
		this.setEvents();
	};
	this.setEvents = function () {
		this.aOpenClose.on('click',this.clickOpenClose);
		this.checkIsInMClub.on("change", this.clickCheckIsInMClub)
	};
	this.clickOpenClose = function(e){
		e.preventDefault();
		self.block.toggle(500);
	};
	this.clickCheckIsInMClub = function(e){
		if (this.checked) {
			self.block.show(500);
		}
	};
	this.constructor();
};