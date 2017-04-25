<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('trainerSubmitedSportsmen'))
{
    function trainerSubmitedSportsmen($model, $trainer_id){
        $users = $_POST['usernames'];           //these are the users, that the coach selected before clicking "submit"
        //print_r($users);
        //print_r($_SESSION['results']["worked"]);
        foreach ($_SESSION['results']["worked"] as $searched) {
            $searchedSportsmanID = $searched[0];
            $alreadySportsman = $searched[2];

            $sportsmanChecked = false;
            foreach ($users as $checkedSportsmanID){
                if ($checkedSportsmanID == $searchedSportsmanID) {
                    $sportsmanChecked = true;
                    break;
                }
            }

            if ($sportsmanChecked and !$alreadySportsman) {
                $model->connect_trainer_and_sportsman($trainer_id, $searchedSportsmanID);
            } else if (!$sportsmanChecked and $alreadySportsman) {
                $model->disconnect_trainer_and_sportsman($trainer_id, $searchedSportsmanID);
            }


            //print_r($searched);
            //echo "-------------";
        }
        unset($_SESSION['results']);
    }
}

if ( ! function_exists('get_trainer_search_data')) {
    function get_trainer_search_data($results)      //returns data array (sportsman id, sportsman username, boolean: if regeistered as trainer sportsman)
    {
        $data['worked'] = array();

        foreach ($results['results'] as $result) {
            $found = false;
            foreach ($results['sportsmen'] as $sportsman) {
                if ($result->id == $sportsman->sportlase_id) {
                    $found = true;
                    break;
                }
            }
            if ($found) {
                array_push($data['worked'], array($result->id, $result->kasutajanimi, 1));
            } else {
                array_push($data['worked'], array($result->id, $result->kasutajanimi, 0));
            }
        }
        $_SESSION['results'] = $data;

        return $data;
    }
}
