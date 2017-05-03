$(document).ready(function() {

    window.add_competition = function () {
        var name = document.getElementById("comp_name").value;
        var date = document.getElementById("comp_date").value;
        var distance = document.getElementById("comp_distance").value;
        var sports = document.getElementById("sports_id").value;
        if (sports == 9) {
            var currentURL = window.location.href;
            if (currentURL.indexOf("archery") != -1) {
                sports = 1;
            } else if (currentURL.indexOf("swimming") != -1) {
                sports = 2
            } else if (currentURL.indexOf("tennis") != -1) {
                sports = 3
            } else if (currentURL.indexOf("weightlifting") != -1) {
                sports = 4
            } else if (currentURL.indexOf("fencing") != -1) {
                sports = 5
            } else if (currentURL.indexOf("rhythmic_gymnastics") != -1) {
                sports = 6
            } else if (currentURL.indexOf("sport_of_athletics") != -1) {
                sports = 7
            } else if (currentURL.indexOf("cycling") != -1) {
                sports = 8
            }
        }

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/app/index.php/competitions/new_comp/",
            data: {"name" : name,
                "date" : date,
                "sports_id" : sports,
                "distance" : distance},
            success: function(data) {
                if (data == "ok") {
                    $("#addComp-modal").modal('hide');
                    location.reload();
                } else {
                    var kuvatud_info = document.getElementById("lisainfo");    //eemaldan vana kirja kui see on olemas
                    if (kuvatud_info != null) {
                        kuvatud_info.remove();
                    }

                    var heading = document.getElementById("comp_heading");
                    var info = document.createElement("p");
                    info.setAttribute("id", "lisainfo");
                    info.innerHTML = "Palun kontrollida sisendeid";
                    heading.appendChild(info);
                }
            }
        })
    }
});