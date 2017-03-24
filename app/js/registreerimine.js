

$(document).ready(function(){

	$("#contact-submit").click(function(e){
		var sisu = document.getElementById("login-panel");
		$("#login-panel").remove();
		
		//Heading


		
		
		var heading = document.createElement('div');
		heading.setAttribute('id',"head");
		heading.className="panel-heading";
		var h2 = document.createElement("h2");
		h2.className="modal-title";
		h2.setAttribute('id','modal-title');	
		var t = document.createTextNode("Registreerimine"); 
		h2.appendChild(t);
		heading.appendChild(h2);
		
		var backbutton = document.createElement('button');
		var e = document.createTextNode("Tagasi");
		backbutton.appendChild(e);
		backbutton.addEventListener('click',goback);
		heading.appendChild(backbutton);
		
		
		document.getElementById("login-container").append(heading);
		
		
		//Form
		
		var form = document.createElement("form");
        form.setAttribute('class',"form control");
		form.setAttribute('id',"reg-form");


        var username = document.createElement("input");
		username.setAttribute('type',"text");
		username.setAttribute('placeholder','kasutajanimi');
		username.setAttribute('id','username');
		username.setAttribute('data-toggle','tooltip');
		username.setAttribute('data-original-title','sisesta kasutajanimi');
		username.setAttribute('data-placement','right');
		

		var name = document.createElement("input"); 
		name.setAttribute('type',"text");
		name.setAttribute('placeholder','nimi');
		name.setAttribute('data-toggle','tooltip');
		name.setAttribute('data-original-title','Sisesta eesnimi');
		name.setAttribute('data-placement','right');
		
		
		var lastname = document.createElement("input"); 
		lastname.setAttribute('type',"text");
		lastname.setAttribute('placeholder','perenimi');
		lastname.setAttribute('data-toggle','tooltip');
		lastname.setAttribute('data-original-title','Sisesta perekonnanimi');
		lastname.setAttribute('data-placement','right');
		
		var meil = document.createElement("input"); 
		meil.setAttribute('type',"text");
		meil.setAttribute('placeholder','meiliaadress');
		meil.setAttribute('data-toggle','tooltip');
		meil.setAttribute('data-original-title','Sisesta meiliaadress');
		meil.setAttribute('data-placement','right');
		
		var password = document.createElement("input");
		password.setAttribute('type','password');
		password.setAttribute('placeholder','parool');
		password.setAttribute('data-toggle','tooltip');
		password.setAttribute('data-original-title','Sisesta vähemalt 6-täheline parool');
		password.setAttribute('data-placement','right');
		
		var passwordRepeat = document.createElement("input");
		passwordRepeat.setAttribute('type','password');
		passwordRepeat.setAttribute('placeholder','parooli kinnitus');
		passwordRepeat.setAttribute('data-toggle','tooltip');
		passwordRepeat.setAttribute('data-original-title','Sisesta parool uuesti');
		passwordRepeat.setAttribute('data-placement','right');
		
		var registerbutton = document.createElement("button");
		registerbutton.setAttribute('type','button');
		registerbutton.setAttribute('id','register');
		registerbutton.addEventListener('click', validate);
		registerbutton.innerHTML = "Registreeru";
		
		form.appendChild(username);
		form.appendChild(name);
		form.appendChild(lastname);
		form.appendChild(meil);
		form.appendChild(password);
		form.appendChild(passwordRepeat);
		form.appendChild(registerbutton);
	
		document.getElementById("login-container").append(form);
		
		
		$("input").tooltip();   
		
		
		
		function goback(){
			document.getElementById("reg-form").remove();
			document.getElementById("head").remove();
			document.getElementById("login-container").append(sisu);
			
			
		};
		
		
		function validate(){
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
                    url: "/app/index.php/login/registration",
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
                        else if (outcome == "failed") messages.pseudo("Server ei aktsepteerinud teie sisestatud andmeid");
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


		
			
			
		
