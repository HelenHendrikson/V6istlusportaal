$(document).ready(function() {

    window.add_competition = function () {
        var name = document.getElementById("comp_name").value;
        var date = document.getElementById("comp_date").value;
        var distance = document.getElementById("comp_distance").value;
        var sports = document.getElementById("sports_id").value;
        console.log(sports);

        $.ajax({
            type: "POST",
            url: "/app/index.php/competitions/new_comp/",
            data: {"name" : name,
                "date" : date,
                "sports_id" : sports,
                "distance" : distance},
            success: function(data) {
                console.log("asi ok")
            }
        })
    }
});