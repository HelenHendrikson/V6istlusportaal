$(document).ready(function(){

	$("input[data-toggle=\"tooltip\"]").tooltip();   
	$("#register-panel").hide();

	window.showLogin = function() {
		puhasta_registreerimise_info();
		$("#register-panel").hide();
		$("#login-panel").show();
	};
	
	window.validate = function() {
		var heading = document.getElementById("heading");
  		var username = document.getElementById("register-username");
		var name = document.getElementById("register-name");
		var lastname = document.getElementById("register-last-name"); 
		var meil = document.getElementById("register-mail"); 
		var password = document.getElementById("register-password");
		var passwordRepeat = document.getElementById("register-password-repeat");

		var messages = [];
		var valid = true;

		var language = getLanguage();
		console.log(language);

		if ((username.value).length < 3 || (username.value).length > 30) {
			if (language == 'et')
            	messages.push("Sisesta palun 3-30 täheline kasutajanimi");
			else
				messages.push("Username length must be between 3-30 symbols");
            valid = false;
        }
		
		if ((name.value).length < 2 || (name.value).length > 30) {
			if (language == 'et')
				messages.push("Eeldatatud nime pikkus on 2-30 tähemärki");
            else
                messages.push("Name length must be between 2-30 symbols");
			valid = false;
		}

        if ((lastname.value).length < 2 || (lastname.value).length > 30) {
			if (language == 'et')
            	messages.push("Eeldatatud perekonnanime pikkus on 2-30 tähemärki");
            else
                messages.push("Second name length must be between 2-30 symbols");
            valid = false;
        }

        if ((meil.value).length > 100) {
			if (language == 'et')
            	messages.push("Lubatud meili pikkus on kuni 100 tähemärki");
			else
                messages.push("E-mail length must be less than 100 symbols");
            valid = false;
        } else if (! validateEmail(meil.value)) {
			if (language == 'et')
				messages.push("mittesobiv email");
            else
                messages.push("Your email address is not acceptable");
			valid = false;
		}


		if(password.value.length < 6 || password.value.length > 256){
			if (language == 'et')
				messages.push("parooli pikkus peab olema 6-256 tähemärki");
            else
                messages.push("Password length must be between 6-256 symbols");
			valid = false;
		}
		
		if(password.value != passwordRepeat.value){
			if (language == 'et')
				messages.push("paroolid ei kattu");
            else
                messages.push("Passwords don't match");
			valid = false;
		}
		if (valid) {
            $.ajax({
                type: "POST",
                url: "/app/index.php/login/registration",  // andreasel oli siin /app ka veel ees
                data: {"username" : username.value,
                		"firstname" : name.value,
						"lastname" : lastname.value,
                		"meil" : meil.value,
						"password" : password.value},
                dataType:'xml',
                success: function(data) {
                    var $xml = $(data);
                    var outcome = $xml.find('outcome');
                    outcome = outcome.text();
                    if (outcome == "success") {
                    	showLogin();
                    	showSuccessfulRegistrationInfo()
                    }
                    else if (outcome == "failed") {
                    	if (language == 'et')
                    		messages.push("Server ei aktsepteerinud teie sisestatud andmeid");
                    	else
                    		messages.push("Server didn't accept your given data");
                    }
                    else if (outcome == "username in use") {
                    	if (language == 'et')
                    		messages.push("Kasutajanimi on juba kasutuses");
                        else
                            messages.push("Username already in use");
                    }
                    else {
                    	if (language == 'et')
                    		messages.push("Te ei läbinud xss tõrjet");
                        else
                            messages.push("You didn't pass xss protection");
                    }
                    showMessages(messages, heading);
                }, error: function (data) {
					console.log("error");
                }
			})
		}
		showMessages(messages, heading);
	}	

});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function showMessages(messages, heading) {
	puhasta_registreerimise_info();
    for (var i = 0; i < messages.length; i++) {
        var info = document.createElement("p");
        info.setAttribute("id", "lisainfo");
        info.innerHTML = messages[i];
        heading.appendChild(info);
    }
}

function showSuccessfulRegistrationInfo() {
	var heading = document.getElementById("login_heading");
	var info = document.createElement("p");
	var language = getLanguage();
	if (language == 'et')
		info.innerHTML = "Registreerimine õnnestus";
	else
        info.innerHTML = "Registration was successful";
    info.id = "registreerimisinfo";
	heading.appendChild(info);
}

function puhasta_registreerimise_info() {
    var kuvatud_info = document.getElementById("lisainfo");
    while (kuvatud_info != null) {
        kuvatud_info.remove();
        kuvatud_info = document.getElementById("lisainfo");
    }
}


		
			
