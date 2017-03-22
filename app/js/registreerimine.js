

$(document).ready(function(){

	$("#contact-submit").click(function(e){
		$("#login-panel").remove();
		
		//Heading
		var panel = document.createElement('div');
		panel.className="panel panel-default";
		var heading = document.createElement('div');
		heading.className="panel-heading";
		var	h2 = document.createElement("h1");
		h2.className="panel-title";
		h2.setAttribute('id','panel-title');
		var t = document.createTextNode("Registreerimine"); 
		h2.appendChild(t);
		heading.appendChild(h2);
		
		document.getElementById("login-container").append(heading);
		
		
		//Form
		
		var form = document.createElement("form");
		//form.setAttribute('method',"post");
		//form.setAttribute('action',"index.php/ajutine/data_submitted");
        form.setAttribute('class',"form control");


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
		name.setAttribute('data-original-title','Sisesta vähemalt 2-täheline nimi');
		name.setAttribute('data-placement','right');
		
		
		var lastname = document.createElement("input"); 
		lastname.setAttribute('type',"text");
		lastname.setAttribute('placeholder','perenimi');
		lastname.setAttribute('data-toggle','tooltip');
		lastname.setAttribute('data-original-title','Sisesta vähemalt 3-täheline nimi');
		lastname.setAttribute('data-placement','right');
		
		var meil = document.createElement("input"); 
		meil.setAttribute('type',"text");
		meil.setAttribute('placeholder','meiliaadress');
		meil.setAttribute('data-toggle','tooltip');
		meil.setAttribute('data-original-title','Sisesta meiliaadress');
		meil.setAttribute('data-placement','right');
		
		var password = document.createElement("input");
		password.setAttribute('type','text');
		password.setAttribute('placeholder','parool');
		password.setAttribute('data-toggle','tooltip');
		password.setAttribute('data-original-title','Sisesta vähemalt 7-täheline parool');
		password.setAttribute('data-placement','right');
		
		
		var passwordRepeat = document.createElement("input");
		passwordRepeat.setAttribute('type','text');
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
		
		$(document).ready(function(){
			$("input").tooltip();   
		});
		
		function validate(){
			var message;
			var valid = true;

			if ((username.value).length < 3 || (username.value).length > 30) {
                message = "Sisesta palun 3-30 täheline kasutajanimi";
                valid = false;
                console.log(message);
            }
			
			if ((name.value).length < 1 || (name.value).length > 30) {
				valid = false;
			}

            if ((lastname.value).length < 1 || (lastname.value).length > 30) {
                valid = false;
            }

            if ((meil.value).length > 100) {
                message = "Lubatud meili pikkus on kuni 100 tähemärki";
                valid = false;
            } else if (! validateEmail(meil.value)) {
				message = "mittesobiv email";
				valid = false;
			}


			if(password.value.length < 6 || password.value.length > 256){
				valid = false;
			}
			
			if(password.value != passwordRepeat.value){
				valid = false;
			}
			
			if (valid) {
				console.log("sobib");

				//making xml data
                var xmlText = "<acc>" +
                    "<username>" + username.value + "</username>" +
					"</acc>";
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(xmlText,"text/xml");


                $.ajax({
                    type: "POST",
                    url: "/app/index.php/welcome/sendRegistrationDataToDatabase",
                    data: xmlText,
                    dataType:'xml',
                    success: function(data){
                    	console.log("info saadetud");
                    	console.log(data);
                    },
                    error: function (data) {
						console.log("error");
						console.log(data);
                    }
				})
			} else {
                var info = document.createElement("p");
                info.innerHTML = message;
                heading.appendChild(info);
            }
				
		}
	

				
	});


		
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


		
			
			
		
