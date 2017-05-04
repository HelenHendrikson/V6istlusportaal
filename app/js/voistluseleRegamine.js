$(document).ready(function() {
    var registered_sportsmen;

    window.regan = function () {
        $("#registerAthlete-modal").modal("show");

        var voistluse_id = window.location.href.split("/").pop();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {"voistlus": voistluse_id},
            url: "/app/index.php/competitions/comp_info_for_trainer",
            success: function (data) {
                registered_sportsmen = data["registered_sportsmen"];
                var trainer_sportsmen = data["trainer_sportsmen"];
                var form = document.getElementById("registrationForm");
                var button = document.getElementsByName("add_athlete");

                var nodeToDelete = document.getElementById("checkBoxNode");
                while (nodeToDelete != null) {
                    nodeToDelete.remove();
                    nodeToDelete = document.getElementById("checkBoxNode");
                }


                for (var i = 0; i < trainer_sportsmen.length; i++) {
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
                        node.innerHTML = '<input name="registereSportsmen[]" type="checkbox"  value="' + trainer_sportsman_id + '" checked>' + trainer_sportsman_firstName + " " + trainer_sportsman_SecondName + '</br>';
                    } else {
                        node.innerHTML = '<input name="registereSportsmen[]" type="checkbox" value="' + trainer_sportsman_id + '">' + trainer_sportsman_firstName + " " + trainer_sportsman_SecondName + '</br>';
                    }

                    form.insertBefore(node, button[0]);
                }

            }, error: function (data) {
                console.log("error");
            }
        });
    };

    $("#registrationForm").submit(function (event) {
        event.preventDefault(); // prevent page refresh)
        var registreerida = [];
        var eemaldada = [];
        var voistluse_id = window.location.href.split("/").pop();

        var cboxes = document.getElementsByName('registereSportsmen[]');
        var len = cboxes.length;
        for (var i = 0; i < len; i++) {
            if (cboxes[i].checked) {
                if (!registreeritud(cboxes[i].value))
                    registreerida.push(cboxes[i].value);
            } else {
                if (registreeritud(cboxes[i].value))
                    eemaldada.push(cboxes[i].value);
            }
        }

        console.log(registreerida);
        console.log(eemaldada);
        console.log(eemaldada[0]);
        if (eemaldada[0] != undefined || registreerida[0] != undefined) {
            console.log(registreerida);
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    "reg": registreerida,
                    "rem": eemaldada,
                    "voistlus" : voistluse_id},
                url: "/app/index.php/competitions/register_sportsmen",
                success: function (data) {
                    $("#registerAthlete-modal").modal('hide');
                    location.reload();
                }
            });

        }
    });

    function registreeritud(id) {
        for (var i = 0; i < registered_sportsmen.length; i++) {
            if (id == registered_sportsmen[i]['id'])
                return true;
        }
        return false;
    }
});