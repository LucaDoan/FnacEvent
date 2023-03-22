<h2>Gestion des evenements</h2>
<div style="display: flex; align-items: center; justify-content: center;">
  <div>
    <img src="images/events.png" alt="Logo" height ="150" witdh ="150">
    </div>
</div>
<?php

/**********************************************Admin************************************************ */
if ($_SESSION['role'] == 'admin') {
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

if ($_SESSION['role'] == 'abonne') {

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
                if (isset($_POST['Participer'])) {
                    $unControleur->insertParticiper($_POST);
                    /*header('Location: vue/vue_confirmation.php');
                    exit(); */
                }
                break;
        }
    }
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
                if (isset($_POST['Participer'])) {
                    $unControleur->insertParticiper($_POST);
                    /*header('Location: vue/vue_confirmation.php');
                    exit(); */
                }
                break;
        }
    }
    if (isset($_POST['Participer_event'])) {
        $unControleur->insertInviter($_POST);
    }
}


?>