drop database if exists event;
create database event;
use event;
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id_user Int  Auto_increment  NOT NULL ,
        nom     Varchar (50) NOT NULL ,
        prenom  Varchar (50) NOT NULL ,
        email   Varchar (50) NOT NULL ,
        mdp     Varchar (50) NOT NULL ,
        role    Varchar (50) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Visiteur
#------------------------------------------------------------

CREATE TABLE Visiteur(
        id_user       Int NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        datenaissance Date NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        email         Varchar (50) NOT NULL ,
        mdp           Varchar (50) NOT NULL ,
        role          Varchar (50) NOT NULL
	,CONSTRAINT Visiteur_PK PRIMARY KEY (id_user)

	,CONSTRAINT Visiteur_Utilisateur_FK FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id_groupe Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL
	,CONSTRAINT Groupe_PK PRIMARY KEY (id_groupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Abonne
#------------------------------------------------------------

CREATE TABLE Abonne(
        id_user     Int NOT NULL ,
        date_debut  Date NOT NULL ,
        date_fin    Date NOT NULL ,
        prixMensuel Float NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        email       Varchar (50) NOT NULL ,
        mdp         Varchar (50) NOT NULL ,
        role        Varchar (50) NOT NULL ,
        id_groupe   Int NOT NULL
	,CONSTRAINT Abonne_PK PRIMARY KEY (id_user)

	,CONSTRAINT Abonne_Utilisateur_FK FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user)
	,CONSTRAINT Abonne_Groupe0_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Guest
#------------------------------------------------------------

CREATE TABLE Guest(
        id_user          Int NOT NULL ,
        pays             Varchar (50) NOT NULL ,
        langueOfficielle Varchar (50) NOT NULL ,
        domaineActivite  Varchar (50) NOT NULL ,
        nom              Varchar (50) NOT NULL ,
        prenom           Varchar (50) NOT NULL ,
        email            Varchar (50) NOT NULL ,
        mdp              Varchar (50) NOT NULL ,
        role             Varchar (50) NOT NULL
	,CONSTRAINT Guest_PK PRIMARY KEY (id_user)

	,CONSTRAINT Guest_Utilisateur_FK FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        idcategorie Int  Auto_increment  NOT NULL ,
        libelle     Varchar (50) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (idcategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE Lieu(
        idlieu  Int  Auto_increment  NOT NULL ,
        libelle Varchar (50) NOT NULL ,
        adresse Varchar (50) NOT NULL
	,CONSTRAINT Lieu_PK PRIMARY KEY (idlieu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Event
#------------------------------------------------------------

CREATE TABLE Event(
        id_event    Int  Auto_increment  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_debut  Date NOT NULL ,
        date_fin    Date NOT NULL ,
        capacite    Int NOT NULL ,
        idcategorie Int NOT NULL ,
        idlieu      Int NOT NULL
	,CONSTRAINT Event_PK PRIMARY KEY (id_event)

	,CONSTRAINT Event_Categorie_FK FOREIGN KEY (idcategorie) REFERENCES Categorie(idcategorie)
	,CONSTRAINT Event_Lieu0_FK FOREIGN KEY (idlieu) REFERENCES Lieu(idlieu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: acheter
#------------------------------------------------------------

CREATE TABLE acheter(
        id_user         Int NOT NULL ,
        id_event        Int NOT NULL ,
        dateinscription Date NOT NULL ,
        statut          Varchar (50) NOT NULL ,
        billet_prix     Float NOT NULL
	,CONSTRAINT acheter_PK PRIMARY KEY (id_user,id_event)

	,CONSTRAINT acheter_Visiteur_FK FOREIGN KEY (id_user) REFERENCES Visiteur(id_user)
	,CONSTRAINT acheter_Event0_FK FOREIGN KEY (id_event) REFERENCES Event(id_event)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        id_user         Int NOT NULL ,
        id_event        Int NOT NULL ,
        dateinscription Date NOT NULL
	,CONSTRAINT participer_PK PRIMARY KEY (id_user,id_event)

	,CONSTRAINT participer_Abonne_FK FOREIGN KEY (id_user) REFERENCES Abonne(id_user)
	,CONSTRAINT participer_Event0_FK FOREIGN KEY (id_event) REFERENCES Event(id_event)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inviter
#------------------------------------------------------------

CREATE TABLE inviter(
        id_event       Int NOT NULL ,
        id_user        Int NOT NULL ,
        dateinvitation Date NOT NULL ,
        datedepart     Date NOT NULL
	,CONSTRAINT inviter_PK PRIMARY KEY (id_event,id_user)

	,CONSTRAINT inviter_Event_FK FOREIGN KEY (id_event) REFERENCES Event(id_event)
	,CONSTRAINT inviter_Guest0_FK FOREIGN KEY (id_user) REFERENCES Guest(id_user)
)ENGINE=InnoDB;




insert into Utilisateur values(null, 'DOAN', 'Luca', "a@gmail.com" , "123", "admin"),(null, "DOAN", "Luca", "abonne@gmail.com", "456", "abonne")
,(null,"Raky","Pascal","visiteur@gmail.com","123","visiteur")
,(null,"Monsieur","Guest","guest@gmail.com","123","guest");

insert into groupe values (null,"groupe1");

insert into abonne values (2,"2022-11-09","2022-12-09",5.0,"DOAN","Luca","b@gmail.com","456","abonne",1);
insert into visiteur values(3,"9 rue de la Fontaine","22-06-1995","Raky","Pascal",'pascal@gmail.com',"123","visiteur");
insert into guest values(1,"France","français","Livre","Monsieur","Guest","guest@gmail.com","123","guest");



insert into Categorie values(null,"test_categorie_1");
insert into Categorie values(null,"test_categorie_2");

insert into Lieu values(null,"test_lieu_1","65 rue de la roche");
insert into Lieu values(null,"test_lieu_2","55 rue du manoir");

insert into event values (null, "Literature", "2020-10-10", "2020-10-12",250,1,1);
insert into event values(null, 'Sport', '2020-10-10', '2020-10-12',300,2,2);


insert into participer values(2,2,"2022-11-09");
insert into inviter values(1,4,1,"2022-12-07","2022-12-10");
insert into acheter values(3,1,"2022-12-13","visiteur",10.0);
