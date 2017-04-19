$(document).ready(function() {

    window.add_competition = function () {
        var name = document.getElementById("comp_name").value;
        var date = document.getElementById("comp_date").value;
        var distance = document.getElementById("comp_distance").value;
        var sports = document.getElementById("sports_id").value;
        console.log(sports);

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