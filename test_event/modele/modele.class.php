<?php
class Modele
{
    private $unPDO; //Instance de la Classe PDO

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unPDO = null;
        try {
            //Connexion à Mysql et la Base de Données
            $this->unPDO = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            //Echec de connexion
            echo "Errreur de connexion à la Base de Données";
            echo $exp->getMessage();
        }
    }

    /*******************************************  Les events *********************************/
    public function selectAllEvents()
    {
        if ($this->unPDO != null) {
            $requete = "select * from event;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesEvents = $select->fetchAll();
            return $lesEvents;
        } else {
            return null;
        }
    }
    public function insertEvent($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into event values(null, :designation, :date_debut, :date_fin, :capacite, :idcategorie , :idlieu);";
            $donnees = array(
                ":designation" => $tab['designation'],
                ":date_debut" => $tab['date_debut'],
                ":date_fin" => $tab['date_fin'],
                ":capacite" => $tab['capacite'],
                ":idcategorie" => $tab['idcategorie'],
                ":idlieu" => $tab['idlieu']

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    /*****************************************Categorie*************************************************** */
    public function selectAllCategories()
    {
        if ($this->unPDO != null) {
            $requete = "select * from categorie;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesCategories = $select->fetchAll();
            return $lesCategories;
        } else {
            return null;
        }
    }
    public function selectWhereCategorie($idcategorie)
    {
        $requete = "select * from categorie where idcategorie=" . $idcategorie . ";";
        if ($this->unPDO != null) {
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            //Extraction du Client
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function insertCategorie($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into categorie values(null, :libelle);";
            $donnees = array(
                ":libelle" => $tab['libelle']
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function deleteCategorie($idcategorie)
    {
        if ($this->unPDO != null) {
            $requete = "delete from categorie where idcategorie= :idcategorie;";
            $donnees = array(
                
                ":idcategorie" => $idcategorie
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function updateCategorie($tab)
    {
        if ($this->unPDO != null) {
            $requete = "update categorie set libelle=:libelle where idcategorie=:idcategorie;";
            $donnees = array(
                ":libelle" => $tab['libelle'],
                ":idcategorie" => $tab['idcategorie']
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    /*************************************************Lieu*************************************************** */
    public function selectAllLieux()
    {
        if ($this->unPDO != null) {
            $requete = "select * from Lieu ;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesLieux = $select->fetchAll();
            return $lesLieux;
        } else {
            return null;
        }
    }
    public function selectWhereLieu($idlieu)
    {
        $requete = "select * from lieu where idlieu=" . $idlieu . ";";
        if ($this->unPDO != null) {
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            //Extraction du Client
            return $select->fetch();
        } else {
            return null;
        }
    }
    public function insertLieu($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into lieu values(null, :libelle, :adresse);";
            $donnees = array(
                ":libelle" => $tab['libelle'],
                ":adresse" => $tab['adresse']
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function deleteLieu($idlieu)
    {
        if ($this->unPDO != null) {
            $requete = "delete from Lieu where idlieu= :idlieu;";
            $donnees = array(
                
                ":idlieu" => $idlieu
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function updateLieu($tab)
    {
        if ($this->unPDO != null) {
            $requete = "update Lieu set libelle=:libelle ,adresse=:adresse where idlieu=:idlieu;";
            $donnees = array(
                ":libelle" => $tab['libelle'],
                ":adresse" => $tab['adresse'],
                ":idlieu" => $tab['idlieu']
                

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    /****************************************************Participer****************************************************** */

    public function insertParticiper($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into participer values(:id_user, :id_event, :dateinscription);";
            $donnees = array(
                ":id_user" => $tab['id_user'],
                ":id_event" => $tab['id_event'],
                ":dateinscription" => $tab['dateinscription']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    
    /*************************************Inviter************************************************** */

    public function insertInviter($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into inviter values(:id_event, :id_user, :dateinvitation, :datedepart);";
            $donnees = array(
                ":id_event" => $tab['id_event'],
                ":id_user" => $tab['id_user'],
                ":dateinvitation" => $tab['dateinvitation'],
                ":datedepart" => $tab['datedepart']
            );
            var_dump($donnees);
            echo $requete; 
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    
        /*************************************Acheter************************************************** */

    public function insertAcheter($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into acheter values(:id_user, :id_event, :dateinscription, :statut, :billet_prix);";
            $donnees = array(
                ":id_user" => $tab['id_user'],
                ":id_event" => $tab['id_event'],
                ":dateinscription" => $tab['dateinscription'],
                ":statut" => $tab['statut'],
                ":billet_prix" => $tab['billet_prix']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }




    /******************************************************  Les users ***************************************/
    public function verifConnexion($email, $mdp)
    {
        if ($this->unPDO != null) {
            $requete = "select * from utilisateur where email = :email and mdp = :mdp;";
            $donnees = array(
                ":email" => $email,
                ":mdp" => $mdp
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }
    public function selectAllUsers()
    {
        if ($this->unPDO != null) {
            $requete = "select * from utilisateur;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesUsers = $select->fetchAll();
            return $lesUsers;
        } else {
            return null;
        }
    }
    /*******************************************************Les Abonnes ***************************************/
    public function selectAllAbonnes()
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueabonnes;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetchAll();
            return $lesAbonnes;
        } else {
            return null;
        }
    }

    public function insertAbonne($tab){
        if ($this->unPDO != null) {
            $requete = "call insertAbonne(:nom,:prenom,:email,:mdp,:role,:age,:date_debut,:date_fin,:prixMensuel,:id_groupe);";
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":age" => $tab['age'],
                ":role" => $tab['role'],
                ":date_debut" => $tab['date_debut'],
                ":date_fin" => $tab['date_fin'],
                ":prixMensuel" => $tab['prixMensuel'],
                ":id_groupe" => $tab['id_groupe']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function updateAbonne($tab){
        if ($this->unPDO != null) {
            $requete = "call updateAbonne(:id_user,:nom,:prenom,:email,:mdp,:role,:age,:date_debut,:date_fin,:prixMensuel,:id_groupe);";
            $donnees = array(
                ":id_user"=>$tab['id_user'],
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":age" => $tab['age'],
                ":role" => $tab['role'],
                ":date_debut" => $tab['date_debut'],
                ":date_fin" => $tab['date_fin'],
                ":prixMensuel" => $tab['prixMensuel'],
                ":id_groupe" => $tab['id_groupe']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function selectWhereAbonne($id_user)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueabonnes where id_user='".$id_user."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetch();
            return $lesAbonnes;
        } else {
            return null;
        }
    }

    public function deleteAbonne($id_user){
        if($this->unPDO !=null){
            $requete="call deleteAbonne(:idUser);";
            $donnees=array(
                ":idUser"=>$id_user
            );
            $update=$this->unPDO->prepare($requete);
            $update->execute($donnees);
        }
    }

    public function selectAbonnesEvents($idUser)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueAbonnesEvents where id_user='".$idUser."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesEvents = $select->fetchAll();
            return $lesEvents;
        } else {
            return null;
        }
    }

    /*************************************Visiteur************************************************** */
    public function selectAllVisiteurs()
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueVisiteurs;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetchAll();
            return $lesAbonnes;
        } else {
            return null;
        }
    }

    public function insertVisiteur($tab){
        if ($this->unPDO != null) {
            $requete = "call insertVisiteur(:nom,:prenom,:email,:mdp,:role,:adresse,:datenaissance);";
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":role" => $tab['role'],
                ":adresse" => $tab['adresse'],
                ":datenaissance" => $tab['datenaissance']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function updateVisiteur($tab){
        if ($this->unPDO != null) {
            $requete = "call updateVisiteur(:id_user,:nom,:prenom,:email,:mdp,:role,:adresse,:datenaissance);";
            $donnees = array(
                ":id_user"=>$tab['id_user'],
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":role" => $tab['role'],
                ":adresse" => $tab['adresse'],
                ":datenaissance" => $tab['datenaissance']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function selectWhereVisiteur($id_user)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueVisiteurs where id_user='".$id_user."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetch();
            return $lesAbonnes;
        } else {
            return null;
        }
    }
    public function deleteVisiteur($id_user){
        if($this->unPDO !=null){
            $requete="call deleteVisiteur(:idUser);";
            $donnees=array(
                ":idUser"=>$id_user
            );
            $update=$this->unPDO->prepare($requete);
            $update->execute($donnees);
        }
    }
    public function selectVisiteursEvents($idUser)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueVisiteursEvents where id_user='".$idUser."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesEvents = $select->fetchAll();
            return $lesEvents;
        } else {
            return null;
        }
    }
    /*************************************Guest************************************************** */
    public function selectAllGuests()
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueGuests;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesGuests = $select->fetchAll();
            return $lesGuests;
        } else {
            return null;
        }
    }

    public function selectGuest($role)
    {
        if ($this->unPDO != null) {
            // $requete = "select u.* ,g.id_guest from utilisateur u , guest g where u.:id_user = g.:id_user;";
            $requete = "SELECT * FROM utilisateur WHERE role = :role";
            $donnees = array(":role" => $role);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unGuest = $select->fetch();
            return $unGuest;
        } else {
            return null;
        }
    }
    public function insertGuest($tab){
        if ($this->unPDO != null) {
            $requete = "call insertGuest(:nom,:prenom,:email,:mdp,:role,:pays,:langueOfficielle,:domaineActivite);";
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":role" => $tab['role'],
                ":pays" => $tab['pays'],
                ":langueOfficielle" => $tab['langueOfficielle'],
                ":domaineActivite" => $tab['domaineActivite'],

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }

 

    public function updateGuest($tab){
        if ($this->unPDO != null) {
            $requete = "call updateGuest(:id_user,:nom,:prenom,:email,:mdp,:role,:pays,:langueOfficielle,:domaineActivite);";
            $donnees = array(
                ":id_user"=>$tab['id_user'],
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":email" => $tab['email'],
                ":mdp" => $tab['mdp'],
                ":role" => $tab['role'],
                ":pays" => $tab['pays'],
                ":langueOfficielle" => $tab['langueOfficielle'],
                ":domaineActivite" => $tab['domaineActivite'],

            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function selectWhereGuest($id_user)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueGuests where id_user='".$id_user."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetch();
            return $lesAbonnes;
        } else {
            return null;
        }
    }
    public function deleteGuest($id_user){
        if($this->unPDO !=null){
            $requete="call deleteGuest(:idUser);";
            $donnees=array(
                ":idUser"=>$id_user
            );
            $update=$this->unPDO->prepare($requete);
            $update->execute($donnees);
        }
    }

    public function selectGuestsEvents($idUser)
    {
        if ($this->unPDO != null) {
            $requete = "select * from vueGuestsEvents where id_user='".$idUser."';";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesEvents = $select->fetchAll();
            return $lesEvents;
        } else {
            return null;
        }
    }
    
}
