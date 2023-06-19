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
	age varchar(50) NOT NULL,
	role    Varchar (50) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Visiteur
#------------------------------------------------------------

CREATE TABLE Visiteur(
	id_user       Int NOT NULL ,
	adresse       Varchar (50) NOT NULL ,
	datenaissance Date NOT NULL
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
	age varchar(50) NOT NULL,
	date_debut  Date NOT NULL ,
	date_fin    Date NOT NULL ,
	prixMensuel Float NOT NULL ,
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
	domaineActivite  Varchar (50) NOT NULL
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


#-----------------------------------------------------------------------------------------------------------------------

drop procedure if exists insertAbonne;
delimiter $
create procedure insertAbonne(IN p_nom varchar(50), IN p_prenom varchar(50), IN p_email varchar(50), IN p_mdp varchar(50), IN p_role varchar(50), IN p_age varchar(50),IN p_date_debut Date, IN p_date_fin Date, IN p_prixMensuel float, IN p_id_groupe int)
Begin
	Declare p_iduser int(3);
	insert into utilisateur values(null, p_nom, p_prenom, p_email, p_mdp, p_role);

	select id_user into p_iduser from utilisateur where nom=p_nom and prenom=p_prenom and email=p_email and mdp=p_mdp and role=p_role;

	insert into abonne values(p_iduser, p_age,p_date_debut, p_date_fin, p_prixMensuel, p_id_groupe);
End $
delimiter ;

drop view if exists vueAbonnes;
create view vueAbonnes as(
	select u.*,a.age, a.date_debut, a.date_fin, a.prixMensuel, a.id_groupe from utilisateur u, abonne a where u.id_user=a.id_user
);

DROP PROCEDURE IF EXISTS deleteAbonne;
DELIMITER $
CREATE PROCEDURE deleteAbonne(IN p_id_user INT)
BEGIN
    DELETE FROM abonne WHERE id_user = p_id_user;
    DELETE FROM utilisateur WHERE id_user = p_id_user;
END$
DELIMITER ;

DROP PROCEDURE IF EXISTS updateAbonne;
DELIMITER $
CREATE PROCEDURE updateAbonne(
    IN p_id_user INT(3),
    IN p_nom VARCHAR(50),
    IN p_prenom VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_mdp VARCHAR(50),
    IN p_role VARCHAR(50),
    IN p_age VARCHAR(50),
    IN p_date_debut DATE,
    IN p_date_fin DATE,
    IN p_prixMensuel FLOAT,
    IN p_id_groupe INT
)
BEGIN
    UPDATE utilisateur
    SET nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role = p_role
    WHERE id_user = p_id_user;

    UPDATE abonne
    SET id_groupe = p_id_groupe, age = p_age ,date_debut = p_date_debut, date_fin = p_date_fin, prixMensuel = p_prixMensuel
    WHERE id_user = p_id_user;
END $
DELIMITER ;




#-----------------------------------------------------------------------------------------------------------------------

drop procedure if exists insertVisiteur;
delimiter $
create procedure insertVisiteur(IN p_nom varchar(50), IN p_prenom varchar(50), 
IN p_email varchar(50), IN p_mdp varchar(50), IN p_role varchar(50),IN p_adresse varchar(50) ,IN p_datenaissance Date)
Begin
	Declare p_id_user int(3);
	insert into utilisateur values(null, p_nom, p_prenom, p_email, p_mdp, p_role);

	select id_user into p_id_user from utilisateur where nom=p_nom and prenom=p_prenom and email=p_email and mdp=p_mdp and role=p_role;

	insert into visiteur values(p_id_user,p_adresse ,p_datenaissance);
End $
delimiter ;


drop view if exists vueVisiteurs;
create view vueVisiteurs as(
	select u.*, v.adresse,v.datenaissance from utilisateur u, visiteur v where u.id_user=v.id_user
);

drop procedure if exists deleteVisiteur;
delimiter $
CREATE PROCEDURE deleteVisiteur(IN p_id_user INT)
BEGIN
DELETE FROM visiteur WHERE id_user = p_id_user;
DELETE FROM utilisateur WHERE id_user = p_id_user;
END $
delimiter ;


DROP PROCEDURE IF EXISTS updateVisiteur;
DELIMITER $
CREATE PROCEDURE updateVisiteur(
    IN p_id_user INT(3),
    IN p_nom VARCHAR(50),
    IN p_prenom VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_mdp VARCHAR(50),
    IN p_role VARCHAR(50),
    IN p_adresse VARCHAR(100),
    IN p_date_naissance DATE
)
BEGIN
    UPDATE utilisateur
    SET nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role = p_role
    WHERE id_user = p_id_user;

    UPDATE visiteur SET datenaissance = p_date_naissance, adresse = p_adresse WHERE id_user = p_id_user;
END $
DELIMITER ;


#--------------------------------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS insertGuest;
DELIMITER $$
CREATE PROCEDURE insertGuest(IN p_nom VARCHAR(50),IN p_prenom VARCHAR(50),IN p_email VARCHAR(50),IN p_mdp VARCHAR(50),IN p_role VARCHAR(50),IN p_pays VARCHAR(50),IN p_langueOfficielle VARCHAR(50),IN p_domaineActivite VARCHAR(50)
)
BEGIN
  DECLARE p_iduser INT(3);

  INSERT INTO Utilisateur
  VALUES (null, p_nom, p_prenom, p_email, p_mdp, p_role);
  SELECT id_user INTO p_iduser FROM Utilisateur WHERE nom = p_nom
    AND prenom = p_prenom
    AND email = p_email
    AND mdp = p_mdp
    AND role = p_role;

  INSERT INTO Guest
  VALUES (p_iduser, p_pays, p_langueOfficielle, p_domaineActivite);
END$$
DELIMITER ;


DROP PROCEDURE IF EXISTS deleteGuest;
DELIMITER $
CREATE PROCEDURE deleteGuest(IN p_id_user INT)
BEGIN
DELETE FROM guest WHERE id_user = p_id_user;
DELETE FROM utilisateur WHERE id_user = p_id_user;
END $
delimiter ;



DROP VIEW IF EXISTS vueGuests;
CREATE VIEW vueGuests AS SELECT u.*, g.pays, g.langueOfficielle, g.domaineActivite FROM utilisateur u, guest g WHERE u.id_user = g.id_user;

DROP PROCEDURE IF EXISTS updateGuest;
DELIMITER $
CREATE PROCEDURE updateGuest(
    IN p_id_user INT(3),
    IN p_nom VARCHAR(50),
    IN p_prenom VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_mdp VARCHAR(50),
    IN p_role VARCHAR(50),
    IN p_pays VARCHAR(50),
    IN p_langueOfficielle VARCHAR(50),
    IN p_domaineActivite VARCHAR(50)
)
BEGIN
    UPDATE utilisateur
    SET nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role = p_role
    WHERE id_user = p_id_user;

    UPDATE guest 
    SET pays = p_pays, langueOfficielle = p_langueOfficielle, domaineActivite = p_domaineActivite
    WHERE id_user = p_id_user;
END $
DELIMITER ;



#------------------------------------------------------------------------------------------------------------------------------
insert into groupe values (null,"groupe1");

insert into Utilisateur values(null, 'DOAN', 'Luca', "a@gmail.com" , "123", "Admin");

call insertAbonne("Doan", "Luca", "pluca@gmail.com", "123", "Abonne","18 ans", Now(), Now(), 15.0, 1);
call insertVisiteur('Dupont', 'Jean', 'jean.dupont@example.com', 'password123', 'visiteur', '123 rue des visiteurs', '1990-01-01');
CALL insertGuest('Dupont', 'Jean', 'jp@gmail.com', 'password123', 'guest', 'France', 'Français', 'Informatique');





insert into Categorie values(null,"test_categorie_1");
insert into Categorie values(null,"test_categorie_2");

insert into Lieu values(null,"test_lieu_1","65 rue de la roche");
insert into Lieu values(null,"test_lieu_2","55 rue du manoir");

insert into event values (null, "Literature", "2020-10-10", "2020-10-12",250,1,1);
insert into event values(null, 'Sport', '2020-10-10', '2020-10-12',300,2,2);


insert into participer values(2,2,"2022-11-09");
insert into inviter values(1,4,1,"2022-12-07","2022-12-10");
insert into acheter values(3,1,"2022-12-13","visiteur",10.0);


create view vueAbonnesEvents as(
	select p.*, u.nom, u.prenom, e.designation from participer p, utilisateur u, event e where u.id_user=p.id_user and e.id_event=p.id_event
);

CREATE VIEW vueVisiteursEvents AS(
	select a.*, u.nom, u.prenom, e.designation from acheter a, utilisateur u, event e where u.id_user=a.id_user and e.id_event=a.id_event

);

CREATE VIEW vueGuestsEvents AS(
	select i.*, u.nom, u.prenom, e.designation from inviter i, utilisateur u, event e where u.id_user=i.id_user and e.id_event=i.id_event

);