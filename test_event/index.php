<?PHP
session_start();
require_once("controleur/config_bdd.php");
require_once("controleur/controler.class.php");

//Instanciation de la Classe Controleur
$unControleur = new controler($serveur, $bdd, $user, $mdp);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FNAC Event</title>
</head>

<body>

<nav class="nav">
    <div class="container-left">
        <a href="index.php?page=0">Fnac Event</a>
    </div>
    <div class="container-right">
    <a href="index.php?page=0">Accueil</a>
    <a href="https://www.fnacspectacles.com/" target="_blank">Notre boutique</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") { ?>
            <a href="index.php?page=10" >Abonne</a>
            <a href="index.php?page=7" >Visiteur</a>
            <a href="index.php?page=8" >Guest</a>
            <a href="index.php?page=9" >Categorie</a>
            <a href="index.php?page=2" >Lieux</a>
        <?php } ?>
        <a href="index.php?page=1">Event</a>
        <a href="index.php?page=5">Connexion/deconnexion</a>
        <a href="index.php?page=6">Contact</a>
    </div>
</nav>

<center>
    <h1>Bienvenue sur FNAC Event</h1>
    <?php

/************************************************************************************** */


    if (!isset($_SESSION['email'])) {
        require_once("vue/vue_connexion.php");
    }
    if (isset($_POST['seConnecter'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $unUser = $unControleur->verifConnexion($email, $mdp);

        if (!$unUser) {
            //Les identifiants ne correspond pas à notre liste d'user
            echo "</br></br> Veuillez vérifier vos identifiant !";
        } else {
            //Connexion réussie
            $_SESSION['id'] = $unUser['id_user'];
            $_SESSION['email'] = $unUser['email'];
            $_SESSION['nom'] = $unUser['nom'];
            $_SESSION['prenom'] = $unUser['prenom'];
            $_SESSION['role'] = $unUser['role'];

            if ($_SESSION['role'] == "guest") {
                $unGuest = $unControleur->selectGuest($_SESSION['role']);
                /*$_SESSION['id_guest'] = $unGuest['id_user'];*/
            }
            /*if ($_SESSION['role'] === "visiteur") {
                $unVisiteur = $unControleur->selectVisiteur($_SESSION['role']);
                $_SESSION['id_user'] = $unVisiteur['id_user'];
            }*/
            header("Location: index.php?page=0");
        }
    }

    
/************************************************************************************** */

    if (isset($_SESSION['email'])) {
        $lEvent = null;

        $page = (isset($_GET['page'])) ? $_GET['page'] : 0;
        switch ($page) {
            case 0:
                require_once("home.php");
                break;
            case 1:
                require_once("events.php");
                break;
            case 2:
                require("lieux.php");
                break;
            case 5:
                session_destroy();
                unset($_SESSION);
                header("Location: index.php");
                break;
            case 6 :
                require_once("vue/vue_contact.php");
                break;
            case 7 :
                require_once("vue/vue_visiteur.php");
                break;
            case 8 :
                require_once("vue/vue_guest.php");
                break;
            case 9:
                require_once("categorie.php");
                break;
            case 10:
                require_once("vue/vue_abonne.php");
                break;
           
        }
    }
   
    ?>

</center>
</body>

</html>