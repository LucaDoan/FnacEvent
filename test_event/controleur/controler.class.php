<?php
require_once("modele/modele.class.php");

class controler
{
    private $unModele; //Instanciation de la Classe Modele

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unModele = new Modele($serveur, $bdd, $user, $mdp);
    }

    /********************************************** */

    public function selectAllEvents()
    {
        $lesEvents = $this->unModele->selectAllEvents();
        return $lesEvents;
    }
    /********************************************** */

    public function insertEvent($tab)
    {
        $this->unModele->insertEvent($tab);
    }

    /********************************************** */

    public function selectAllCategories()
    {
        $lesCategories = $this->unModele->selectAllCategories();
        return $lesCategories;
    }
    /********************************************** */

    public function selectWhereCategorie($idcategorie)
    {
        return $this->unModele->selectWhereCategorie($idcategorie);

    }
    


    public function insertCategorie($tab)
    {
        $this->unModele->insertCategorie($tab);
    }
    /********************************************** */

    public function selectAllLieux()
    {
        $lesLieux = $this->unModele->selectAllLieux();
        return $lesLieux;
    }
    /********************************************** */

    public function selectWhereLieux($idlieu)
    {
        return $this->unModele->selectWhereLieux($idlieu);
    }
    /************************************************ */
    public function insertLieu($tab)
    {
        $this->unModele->insertLieu($tab);
    }
    /********************************************** */

    public function insertParticiper($tab)
    {
        $this->unModele->insertParticiper($tab);
    }
    /********************************************** */

    public function insertInviter($tab)
    {
        $this->unModele->insertInviter($tab);
    }
    /********************************************** */

    public function insertAcheter($tab)
    {
        $this->unModele->insertAcheter($tab);
    }
    /********************************************** */

    public function verifConnexion($email, $mdp)
    {
        $unUser = $this->unModele->verifConnexion($email, $mdp);
        return $unUser;

    }
    /********************************************** */

    public function selectAllUsers()
    {
        $lesUsers = $this->unModele->selectAllUsers();
        return $lesUsers;
    }
    /********************************************** */
    public function selectAllGuests()
    {
        $lesGuests = $this->unModele->selectAllGuests();
        return $lesGuests;
    }

    public function selectGuest($role)
    {
        $unGuest = $this->unModele->selectGuest($role);
        return $unGuest;
    }
    /********************************************** */

    public function selectAllVisiteurs()
    {
        $lesVisiteurs = $this->unModele->selectAllVisiteurs();
        return $lesVisiteurs;
    }
    /********************************************** */

    public function selectVisiteur($role)
    {
        $unVisiteur = $this->unModele->selectVisiteur($role);
        return $unVisiteur;
    }
     /********************************************** */
     public function selectAllAbonnes()
     {
         $lesAbonnes = $this->unModele->selectAllAbonnes();
         return $lesAbonnes;
     }
 
}
