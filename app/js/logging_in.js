$(document).ready(function() {

    window.log_in = function () {
        var username = document.getElementById("login-username");
        var password = document.getElementById("password");

        $.ajax({
            type: "POST",
            url: "/app/index.php/login/",  // andreasel oli siin /app ka veel ees
            data: {"username" : username.value,
                "password" : password.value},
            dataType:'xml',
            success: function(data) {
                var $xml = $(data);
                var outcome = $xml.find('outcome').text();

                var message;
                if (outcome == "no account") {
                    message = "Palun kontrollige oma kasutajanime";
                } else if (outcome == "failure") {
                    message = "palun kontrollige oma kasutajanime ja parooli";
                } else if (outcome == "success") {            
					$("#login-modal").modal('hide');
					$("#login-toggle").hide();
					//document.getElementById("login-toggle").innerHTML="Logi välja"; peab vist ikka uue buttoni tegema välja logimiseks
					
					
                }

                var kuvatud_info = document.getElementById("lisainfo");
                if (kuvatud_info != null) {
                    kuvatud_info.remove();
                }
                var heading = document.getElementById("login_heading");
                var info = document.createElement("p");
                info.setAttribute("id", "lisainfo");
                info.innerHTML = message;
                heading.appendChild(info);
            }, error: function (data) {
                console.log("error");
            }
        })
    }
});
