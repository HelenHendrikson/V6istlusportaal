$(document).ready(function() {
    var url = "/index.php/login/";  // andreasel oli siin /app ka veel ees

    window.log_in = function () {
        var username = document.getElementById("login-username");
        var password = document.getElementById("password");

        $.ajax({
            type: "POST",
            url: url,
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
					//$("#login-toggle").hide();        //kaotab login nupu
                    location.reload();
                }

                puhasta_login_info();

                var heading = document.getElementById("login_heading");
                var info = document.createElement("p");
                info.setAttribute("id", "lisainfo");
                info.innerHTML = message;
                heading.appendChild(info);
                console.log(heading);
            }, error: function (data) {
                console.log("error");
            }
        })
    };

    window.showRegister = function() {
        puhasta_login_info();
        $("#register-panel").show();
        $("#login-panel").hide();
    };
});


function puhasta_login_info() {
    var kuvatud_info = document.getElementById("lisainfo");
    if (kuvatud_info != null) {
        kuvatud_info.remove();
    }

    var registreerimine = document.getElementById("registreerimisinfo");     //puhastan registreeriine õnnestus kirja kui see on olemas
    if (registreerimine != null) {
        registreerimine.remove();
    }
}

