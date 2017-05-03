$(document).ready(function() {
    var check_competition = true;
    $(function () {
        $("#competitionForm button").click(function (ev) {      //jõuan siia ainult siis, kui vajutataks eeemalda nupp
            event.preventDefault(); // prevent page refresh)
            var form = document.getElementById("voistlusSelect");
            var voistluse_id = form.options[form.selectedIndex].value;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/app/index.php/competitions/eemalda_voistlus/" + voistluse_id,
                success: function (data) {
                    location.reload();
                }
            });
            check_competition = false;
        });

        var interval;
        $("#competitionForm").submit(function (event) {
            if (check_competition) {
                event.preventDefault(); // prevent page refresh)
                var form = document.getElementById("voistlusSelect");
                var voistluse_id = form.options[form.selectedIndex].value;

                var currentURL = window.location.href;
                var currentURLending = currentURL.split("/").pop();
                console.log(currentURL);
                var url;
                if (isNaN(currentURLending)) {
                    //url last element isn't number
                    url = currentURL;
                } else {
                    var nrIndex = currentURL.lastIndexOf("/");
                    url = currentURL.substring(0, nrIndex);
                }

                // changing the url
                window.history.pushState(null, "", url + "/" + voistluse_id);

                // user goes back/forward
                $(window).on("popstate", function () {
                    var currentURL = window.location.href;
                    var voistluse_id = currentURL.split("/").pop();
                    var nrIndex = currentURL.lastIndexOf(voistluse_id);
                    var url = currentURL.substring(0, nrIndex);
                    fetchAndInsert(voistluse_id, url);
                });

                clearInterval(interval);
                fetchAndInsert(voistluse_id, url);
                interval = setInterval(function () {
                    fetchAndInsert(voistluse_id, url)
                }, 10000);
            }});
         })
    });


function getLanguage() {
    var text = document.getElementById("tulevasedVoistlused").innerHTML;
    if (text == 'Upcoming competitions:')
        return "en";
    return "et";
}

function fetchAndInsert(voistluse_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/app/index.php/sports/saa_voistluse_info/" + voistluse_id,
        success: function (data) {
            //making important data variables
            var participants_count = data["count"][0]["arv"];
            var name = data["voistluse_info"][0]["nimi"];
            var distance = data["voistluse_info"][0]["distants"];
            var date = data["voistluse_info"][0]["kuupäev"];
            var language = getLanguage();

            // Here I change html according to competition data and language
            document.getElementById("nimev2li").innerHTML = name;
            switch (language) {
                case 'en':
                    document.getElementById("distansiv2li").innerHTML = "Distance: " + distance;
                    document.getElementById("kuupaevav2li").innerHTML = "Date: " + date;

                    if (participants_count == 1)
                        document.getElementById("osalejateArv").innerHTML = "There is " + participants_count + " people registered to this competition:";
                    else
                        document.getElementById("osalejateArv").innerHTML = "There are " + participants_count + " people registered to this competition:";
                    break;

                default:
                    document.getElementById("distansiv2li").innerHTML = "Distants: " + distance;
                    document.getElementById("kuupaevav2li").innerHTML = "Kuupäev: " + date;
                    if (participants_count == 1)
                        document.getElementById("osalejateArv").innerHTML = "Kokku on registreerinud ennast sellele võistlusele " + participants_count + " inimene:";
                    else
                        document.getElementById("osalejateArv").innerHTML = "Kokku on registreerinud ennast sellele võistlusele " + participants_count + " inimest:";
                    break;
            }

            // First I remove old sportsmen list, because I don't want them to stack
            var selectBox = document.getElementById("sportsmen");
            if (selectBox != null)
                selectBox.remove();

            // Here I add select box for showing competitors
            var myDiv = document.getElementById("rightPart");
            var selectList = document.createElement("select");
            selectList.id = "sportsmen";
            selectList.size = 18;
            selectList.className = "form-control";
            myDiv.appendChild(selectList);

            //here I add options
            var competitors = data["võistlejad"];
            for (var i = 0; i < competitors.length; i++){
                var opt = document.createElement('option');
                opt.innerHTML = competitors[i]["eesnimi"] + " " + competitors[i]["perenimi"];
                selectList.appendChild(opt);
            }

            var registerbtn = document.getElementById("registerSportsmenButton");
            if (registerbtn != null)
                registerbtn.remove();

            if (data["alatreener"]) {                   //it shows register button for trainers
                var btn = document.createElement("BUTTON");        // Create a <button> element
                var t = document.createTextNode("Registreeri sportlane");       // Create a text node
                btn.appendChild(t);                                // Append the text to <button>
                btn.id = "registerSportsmenButton";
                btn.className = "btn btn-default btn-special btn2";
                btn.type = "button";
                btn.onclick = regan;
                myDiv.appendChild(btn);
            }
        },
        error: function () {
            console.log("error");
        }
    })
}
