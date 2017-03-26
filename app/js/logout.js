
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
	  
	 
	  var win = window.open("https://mail.google.com/mail/u/0/?logout&hl=en", '_blank');
	  
	  localStorage.setItem("logged", "false");
	  location.reload();
    });
  }