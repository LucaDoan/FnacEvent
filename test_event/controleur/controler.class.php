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
    public function deleteCategorie($idcategorie)
    {
        $this->unModele->deleteCategorie($idcategorie);
    }
    public function updateCategorie($tab)
    {
        $this->unModele->updateCategorie($tab);
    }
    /********************************************** */

    public function selectAllLieux()
    {
        $lesLieux = $this->unModele->selectAllLieux();
        return $lesLieux;
    }
    /********************************************** */

    public function selectWhereLieu($idlieu)
    {
        return $this->unModele->selectWhereLieu($idlieu);
    }
    /************************************************ */
    public function insertLieu($tab)
    {
        $this->unModele->insertLieu($tab);
    }
    public function deleteLieu($idlieu)
    {
        $this->unModele->deleteLieu($idlieu);
    }
    public function updateLieu($tab)
    {
        $this->unModele->updateLieu($tab);
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
    
    public function insertGuest($tab){
        $this->unModele->insertGuest($tab);

     }
     public function updateGuest($tab){
        $this->unModele->updateGuest($tab);

     }
     public function selectWhereGuest($id_user)
     {
         $lesGuests= $this->unModele->selectWhereGuest($id_user);
         return $lesGuests;
     }
     public function deleteGuest($id_user){
        $this->unModele->deleteGuest($id_user);
        
     }
    /********************************************** */

    

    /*public function selectVisiteur($role)
    {
        $unVisiteur = $this->unModele->selectVisiteur($role);
        return $unVisiteur;
    } */
    public function selectAllVisiteurs()
     {
         $lesVisiteurs = $this->unModele->selectAllVisiteurs();
         return $lesVisiteurs;
     }
     
     public function insertVisiteur($tab){
        $this->unModele->insertVisiteur($tab);

     }
     public function updateVisiteur($tab){
        $this->unModele->updateVisiteur($tab);

     }
     public function selectWhereVisiteur($id_user)
     {
         $lesVisiteurs = $this->unModele->selectWhereVisiteur($id_user);
         return $lesVisiteurs;
     }
     public function deleteVisiteur($id_user){
        $this->unModele->deleteVisiteur($id_user);
        
     }
     /********************************************** */
     public function selectAllAbonnes()
     {
         $lesAbonnes = $this->unModele->selectAllAbonnes();
         return $lesAbonnes;
     }
     
     public function insertAbonne($tab){
        $this->unModele->insertAbonne($tab);

     }
     public function updateAbonne($tab){
        $this->unModele->updateAbonne($tab);

     }
     public function selectWhereAbonne($id_user)
     {
         $lesAbonnes = $this->unModele->selectWhereAbonne($id_user);
         return $lesAbonnes;
     }

     public function deleteAbonne($id_user){
        $this->unModele->deleteAbonne($id_user);
        
     }
     /*****************************************************/ 

     public function selectAbonnesEvents($idUser){
        $lesEvents = $this->unModele->selectAbonnesEvents($idUser);
         return $lesEvents;
     }
     public function selectVisiteursEvents($idUser){
        $lesEvents = $this->unModele->selectVisiteursEvents($idUser);
         return $lesEvents;
     }
     public function selectGuestsEvents($idUser){
        $lesEvents = $this->unModele->selectGuestsEvents($idUser);
         return $lesEvents;
     }

}
