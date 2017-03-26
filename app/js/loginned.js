if (typeof(Storage) !== "undefined") {
	if(localStorage.getItem("logged")=="true"){
		document.getElementById('logging').style.visibility = 'visible';
		document.getElementById('login-toggle').style.visibility = 'hidden';
	}
	if(localStorage.getItem("logged")=="false"){
		document.getElementById('logging').style.visibility = 'hidden';
		document.getElementById('login-toggle').style.visibility = 'visible';
		
	}
	
	
}