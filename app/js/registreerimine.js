

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
		form.setAttribute('method',"post");
		form.setAttribute('action',"index.php/ajutine/data_submitted");
		
		
		var username = document.createElement("input"); 
		username.setAttribute('type',"text");
		username.setAttribute('class',"form control");
		username.setAttribute('placeholder','kasutajanimi');
		username.setAttribute('id','username');
		

		var name = document.createElement("input"); 
		name.setAttribute('type',"text");
		name.setAttribute('class',"form control");
		name.setAttribute('placeholder','nimi');
		
		
		var lastname = document.createElement("input"); 
		lastname.setAttribute('type',"text");
		lastname.setAttribute('class',"form control");
		lastname.setAttribute('placeholder','perenimi');
		
		var meil = document.createElement("input"); 
		meil.setAttribute('type',"text");
		meil.setAttribute('class',"form control");
		meil.setAttribute('placeholder','meiliaadress');
		
		
		var password = document.createElement("input");
		password.setAttribute('type','text');
		password.setAttribute('class','from-control');
		password.setAttribute('placeholder','parool');
		
		
		var passwordRepeat = document.createElement("input");
		passwordRepeat.setAttribute('type','text');
		passwordRepeat.setAttribute('class','from-control');
		passwordRepeat.setAttribute('placeholder','parooli kinnitus');
		
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
		
		function validate(){
			var text;
			a = true;
			
			if ((username.value).length > 3 && (username.value).length < 30) {
				
				
			}else {
				text = "Sisesta palun 3-30 täheline kasutajanimi";
				a = false;
				document.write(a);
				document.write(username.value);
			}
			
			if((name.value.length > 3 && ((name.value).length < 20)) || (lastname.value.length > 3 && (lastname.value.length < 20))) {
				
			
			}else {
				text = "Nimi on liiga pikk";
			}
			
			if(password.value.length > 7 && password.value.length < 40){
				
			} else {
				text = "Siesta palun vähemalt 7 täheline parool";
			}
			
			if(password.value == passwordRepeat.value){
				
			} else {
				text = "paroolid ei ole samad";
			}
			
			
			if(meil.value.length != 0){
				
			} else{
				text = "Sisesta palun meiliaadress";
			}	
				
		}
	
		
		
				
	});
	
	
			
		
		
});


		
			
			
		
