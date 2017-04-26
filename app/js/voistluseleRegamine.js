
window.regan = function () {
    $("#registerAthlete-modal").modal("show");

    var voistluse_id = window.location.href.split("/").pop();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {"voistlus" : voistluse_id},
        url: "/app/index.php/competitions/comp_info_for_trainer",
        success: function (data) {
            var registered_sportsmen = data["registered_sportsmen"];
            var trainer_sportsmen = data["trainer_sportsmen"];
            var form = document.getElementById("registrationForm");
            var button = document.getElementsByName("add_athlete");

            var nodeToDelete = document.getElementById("checkBoxNode");
            while (nodeToDelete != null) {
                nodeToDelete.remove();
                nodeToDelete = document.getElementById("checkBoxNode");
            }


            for (i = 0; i < trainer_sportsmen.length; i++) {
                var trainer_sportsman_id = trainer_sportsmen[i]['id'];
                var trainer_sportsman_firstName = trainer_sportsmen[i]['eesnimi'];
                var trainer_sportsman_SecondName = trainer_sportsmen[i]['perenimi'];

                var registered = false;
                for (j = 0; j < registered_sportsmen.length; j++) {
                    var registered_sportsman_id = registered_sportsmen[j]['id'];
                    if (registered_sportsman_id == trainer_sportsman_id) {
                        registered = true;
                    }
                }

                var node = document.createElement("p");
                node.id = "checkBoxNode";
                if (registered) {
                    node.innerHTML = '<input type="checkbox" checked>  ' + trainer_sportsman_firstName + " " + trainer_sportsman_SecondName + '</br>';
                } else {
                    node.innerHTML = '<input type="checkbox">  ' + trainer_sportsman_firstName + " " + trainer_sportsman_SecondName + '</br>';
                }

                form.insertBefore(node, button[0]);
            }

        }, error: function (data) {
            console.log("error");
        }
    });

    //console.log(form);
};
