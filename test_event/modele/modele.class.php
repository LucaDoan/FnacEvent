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
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($requete);
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
    public function selectWhereLieux($idlieu)
    {
        $requete = "select * from lieu where idlieu=" . $idlieu . ";";
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($requete);
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
    /*************************************Guest************************************************** */
    public function selectAllGuests()
    {
        if ($this->unPDO != null) {
            $requete = "select * from guest;";
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
    public function selectAllVisiteurs()
    {
        if ($this->unPDO != null) {
            $requete = "select * from visiteur;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesVisiteurs = $select->fetchAll();
            return $lesVisiteurs;
        } else {
            return null;
        }
    }

    public function selectVisiteur($role)
    {
        if ($this->unPDO != null) {
            // $requete = "select u.* ,g.id_guest from utilisateur u , guest g where u.:id_user = g.:id_user;";
            $requete = "SELECT * FROM utilisateur WHERE role = :role";
            $donnees = array(":role" => $role);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unVisiteur = $select->fetch();
            return $unVisiteur;
        } else {
            return null;
        }
    }
    public function insertAcheter($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into acheter values(:id_user, :id_event, :dateinscription, :statut, :billet_prix);";
            $donnees = array(
                ":id_user" => $tab['id_user'],
                ":id_event" => $tab['id_event'],
                ":dateinscription" => $tab['date_inscription'],
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
            $requete = "select * from abonne;";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $lesAbonnes = $select->fetchAll();
            return $lesAbonnes;
        } else {
            return null;
        }
    }
}
