$(document).ready(function() {
    $("form").submit(function (event) {
        event.preventDefault(); // prevent page refresh)
        var form = document.getElementById("voistlusSelect");
        var voistluse_id = form.options[form.selectedIndex].value;

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "saa_voistluse_info/" + voistluse_id,
            success: function (data) {
                console.log(data);

                var participants_count = data["count"][0]["arv"];
                var name = data["voistluse_info"][0]["nimi"];
                var distanc = data["voistluse_info"][0]["distants"];
                var date = data["voistluse_info"][0]["kuupäev"];
                var language = getLanguage();

                // Here I change html according to competition data and language
                document.getElementById("nimev2li").innerHTML = name;
                switch (language) {
                    case 'en':
                        document.getElementById("distansiv2li").innerHTML = "Distance: " + distanc;
                        document.getElementById("kuupaevav2li").innerHTML = "Date: " + date;
                        if (participants_count == 1)
                            document.getElementById("osalejateArv").innerHTML = "There is " + participants_count + " people registered to this competition.";
                        else
                            document.getElementById("osalejateArv").innerHTML = "There are " + participants_count + " people registered to this competition.";
                        break;

                    default:
                        document.getElementById("distansiv2li").innerHTML = "Distants: " + distanc;
                        document.getElementById("kuupaevav2li").innerHTML = "Kuupäev: " + date;
                        if (participants_count == 1)
                            document.getElementById("osalejateArv").innerHTML = "Kokku on registreerinud ennast sellele võistlusele " + participants_count + " inimene.";
                        else
                            document.getElementById("osalejateArv").innerHTML = "Kokku on registreerinud ennast sellele võistlusele " + participants_count + " inimest.";
                    break;
            }

            },
            error: function () {
                console.log("error");
            }
        })
    })
});

function getLanguage() {
    var text = document.getElementById("tulevasedVoistlused").innerHTML;
    console.log(text);
    if (text == 'Upcoming competitions:')
        return "en";
    return "et";
}