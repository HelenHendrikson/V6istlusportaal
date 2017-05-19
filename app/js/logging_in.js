$(document).ready(function() {
    //var url = "/index.php/login/";  // andreasel oli siin /app ka veel ees
    var url = "/app/index.php/login/";  // andreasel oli siin /app ka veel ees

    var storageUser = sessionStorage.getItem('user');

    if (storageUser != null) {               //if logging in failed due to no internet connection
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "username": storageUser,
                "password": sessionStorage.getItem('pass')
            },
            dataType: 'xml',
            success: function (data) {
                logInResultRecieved(data);
                sessionStorage.removeItem("user");
                sessionStorage.removeItem("pass");
            }
        })
    }

    window.log_in = function () {
        var username = document.getElementById("login-username").value;
        var password = document.getElementById("password").value;

        $.ajax({
            type: "POST",
            url: url,
            data: {"username" : username,
                "password" : password},
            dataType:'xml',
            success: function(data) {
                logInResultRecieved(data);
            }, error: function (data) {
                sessionStorage.setItem('user', username);
                sessionStorage.setItem('pass', password);
            }
        })
    };

    window.showRegister = function() {
        puhasta_login_info();
        $("#register-panel").show();
        $("#login-panel").hide();
    };
});

function logInResultRecieved(data) {
    var language = getLanguage();
    var $xml = $(data);
    var outcome = $xml.find('outcome').text();

    var message;
    if (outcome == "no account") {
        if (language == 'et')
            message = "Palun kontrollige oma kasutajanime";
        else
            message = "Please check your username"
    } else if (outcome == "failure") {
        if (language == 'et')
            message = "Palun kontrollige oma kasutajanime ja parooli";
        else
            message = "Please check your username and password"
    } else if (outcome == "success") {
        $("#login-modal").modal('hide');
        location.reload();
    }

    puhasta_login_info();

    var heading = document.getElementById("login_heading");
    var info = document.createElement("p");
    info.setAttribute("id", "lisainfo");
    info.innerHTML = message;
    heading.appendChild(info);
}

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

function getLanguage() {
    var text = document.getElementById("login-toggle").innerHTML;
    if (text == 'Log in')
        return "en";
    return "et";
}

