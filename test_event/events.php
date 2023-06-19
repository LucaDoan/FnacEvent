<h2>Gestion des evenements</h2>
<div style="display: flex; align-items: center; justify-content: center;">
  <div>
    <img src="images/events.png" alt="Logo" height ="150" witdh ="150">
    </div>
</div>
<?php

/**********************************************Admin************************************************ */
$lesEventsUsers=null;
if ($_SESSION['role'] == 'Admin') {
    $lesCategories = $unControleur->selectAllCategories();
    $lesLieux = $unControleur->selectAllLieux();

    require_once("vue/vue_insert_event.php");


    if (isset($_POST['Valider'])) {
        $unControleur->insertEvent($_POST);
    }

    $lesEvents = $unControleur->selectAllEvents();


    require_once("vue/vue_les_events.php");


    if (isset($_GET['id_event']) && isset($_GET['action'])) {
        $id_event = $_GET['id_event'];
        $action = $_GET['action'];
        switch ($action) {
            case 'participer':
                require_once("vue/vue_inscription.php");
                if (isset($_POST['Participer'])) {
                    $unControleur->insertParticiper($_POST);
                    /*header('Location: vue/vue_confirmation.php');
                    exit(); */
                }
                break;
        }
    }
}
/**************************************************Abonne********************************************************* */

if ($_SESSION['role'] == 'Abonne') {

    $lesEvents = $unControleur->selectAllEvents();
    require_once("vue/vue_les_events.php");

    if (isset($_GET['id_event']) && isset($_GET['action'])) {
        $id_event = $_GET['id_event'];
        $action = $_GET['action'];
        switch ($action) {
            case 'participer':
                require_once("vue/vue_inscription.php");
                
                break;
        }
    }
    if (isset($_POST['Participer'])) {
        $unControleur->insertParticiper($_POST);
        /*header('Location: vue/vue_confirmation.php');
        exit(); */
        echo "<script>document.location.href='index.php?page=1';</script>";
    }
    $lesEventsUsers=$unControleur->selectAbonnesEvents($_SESSION['id']);
    require_once("vue/vue_les_events_abonne.php");
}

/************************************************Visiteur******************************************************/
if ($_SESSION['role'] == 'visiteur') {
    $lesEvents = $unControleur->selectAllEvents();
    require_once("vue/vue_les_events.php");

    if (isset($_GET['id_event']) && isset($_GET['action'])) {
        $id_event = $_GET['id_event'];
        $action = $_GET['action'];
        switch ($action) {
            case 'participer':
                require_once("vue/vue_acheter_billet.php");
                
                break;
        }
    }
    if (isset($_POST['Participer'])) {
        $unControleur->insertAcheter($_POST);
        /*header('Location: vue/vue_confirmation.php');
        exit(); */
        echo "<script>document.location.href='index.php?page=1';</script>";
    }
    $lesEventsUsers=$unControleur->selectVisiteursEvents($_SESSION['id']);
    require_once("vue/vue_les_events_visiteur.php");

}
/********************************************Guest********************************************************** */
if ($_SESSION['role'] === 'guest') {

    $unGuest = $unControleur->selectGuest($_SESSION['role']);
    $lesEvents = $unControleur->selectAllEvents();
    require_once("vue/vue_les_events.php");

    if (isset($_GET['id_event']) && isset($_GET['action'])) {
        $id_event = $_GET['id_event'];
        $action = $_GET['action'];
        switch ($action) {
            case 'participer':
                require_once("vue/vue_inscription_guest.php");
                
                break;
        }
    }
    if (isset($_POST['Inviter'])) {
        $unControleur->insertInviter($_POST);
        /*header('Location: vue/vue_confirmation.php');
        exit(); */
        echo "<script>document.location.href='index.php?page=1';</script>";

    } 

    $lesEventsUsers=$unControleur->selectGuestsEvents($_SESSION['id']);
    require_once("vue/vue_les_events_guest.php");

}



?>