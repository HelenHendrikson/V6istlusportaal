$(document).ready(function(){

	$("input[data-toggle=\"tooltip\"]").tooltip();   
	$("#register-panel").hide();

	window.showRegister = function() {
		$("#register-panel").show();
		$("#login-panel").hide();
	}

	window.showLogin = function() {
		$("#register-panel").hide();
		$("#login-panel").show();
	}
	
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

		if ((username.value).length < 3 || (username.value).length > 30) {
            messages.push("Sisesta palun 3-30 täheline kasutajanimi");
            valid = false;
        }
		
		if ((name.value).length < 2 || (name.value).length > 30) {
			messages.push("Eeldatatud nime pikkus on 2-30 tähemärki");
			valid = false;
		}

        if ((lastname.value).length < 2 || (lastname.value).length > 30) {
            messages.push("Eeldatatud perekonnanime pikkus on 2-30 tähemärki");
            valid = false;
        }

        if ((meil.value).length > 100) {
            messages.push("Lubatud meili pikkus on kuni 100 tähemärki");
            valid = false;
        } else if (! validateEmail(meil.value)) {
			messages.push("mittesobiv email");
			valid = false;
		}


		if(password.value.length < 6 || password.value.length > 256){
			messages.push("paaroli pikkus peab olema 5-256 tähemärki");
			valid = false;
		}
		
		if(password.value != passwordRepeat.value){
			messages.push("paroolid ei kattu");
			valid = false;
		}
		if (valid) {
            $.ajax({
                type: "POST",
                url: "/index.php/login/registration",  // andreasel oli siin /app ka veel ees
                data: {"username" : username.value,
                		"firstname" : name.value,
						"lastname" : lastname.value,
                		"meil" : meil.value,
						"password" : password.value},
                dataType:'xml',
                success: function(data) {
                    console.log("info saadetud");
                    console.log(data);
                    var $xml = $(data);
                    var outcome = $xml.find('outcome');
                    outcome = outcome.text();
                    console.log(outcome);
                    if (outcome == "success") messages.push("Registreerimine õnnestus");
                    else if (outcome == "failed") messages.push("Server ei aktsepteerinud teie sisestatud andmeid");
                    else if (outcome == "username in use") messages.push("Kasutajanimi on juba kasutuses");
                    else messages.push("Te ei läbinud xss tõrjet");
                    console.log(messages);
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
    var kuvatud_info = document.getElementById("lisainfo");
    while (kuvatud_info != null) {
        kuvatud_info.remove();
        kuvatud_info = document.getElementById("lisainfo");
    }
    for (var i = 0; i < messages.length; i++) {
        var info = document.createElement("p");
        info.setAttribute("id", "lisainfo");
        info.innerHTML = messages[i];
        heading.appendChild(info);
    }
}


		
			
			
		
