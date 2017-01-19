-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                           PostgreSQL
--                        (5/11/2016 16:12:05)
-- -----------------------------------------------------------------------------
--      Nom de la base : script_cinema
--      Projet : 
--      Auteur : Dami
--      Date de dernière modification : 5/11/2016 16:09:39
-- -----------------------------------------------------------------------------

drop database script_cinema;
-- -----------------------------------------------------------------------------
--       CREATION DE LA BASE 
-- -----------------------------------------------------------------------------

CREATE DATABASE script_cinema;

-- -----------------------------------------------------------------------------
--       TABLE : DIFFUSION
-- -----------------------------------------------------------------------------

CREATE TABLE DIFFUSION
   (
    ID_DIFFUSION serial NOT NULL  ,
    ID_SALLE int4 NOT NULL  ,
    HEURE_DIFFUSION text NOT NULL  
,   CONSTRAINT PK_DIFFUSION PRIMARY KEY (ID_DIFFUSION)
   );

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE DIFFUSION
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_DIFFUSION_SALLE
     ON DIFFUSION (ID_SALLE)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : CLIENT
-- -----------------------------------------------------------------------------

CREATE TABLE CLIENT
   (
    ID_CLIENT serial NOT NULL  ,
    NOM_CLIENT text NOT NULL  ,
    PRENOM_CLIENT text NOT NULL  ,
    EMAIL_CLIENT text NOT NULL  
,   CONSTRAINT PK_CLIENT PRIMARY KEY (ID_CLIENT)
   );

-- -----------------------------------------------------------------------------
--       TABLE : TICKET
-- -----------------------------------------------------------------------------

CREATE TABLE TICKET
   (
    ID_TICKET serial NOT NULL  ,
    ID_CLIENT int4 NOT NULL  ,
    ID_PROJECTION int4 NOT NULL  
,   CONSTRAINT PK_TICKET PRIMARY KEY (ID_TICKET)
   );

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE TICKET
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_TICKET_CLIENT
     ON TICKET (ID_CLIENT)
    ;

CREATE  INDEX I_FK_TICKET_PROJECTION
     ON TICKET (ID_PROJECTION)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : SALLE
-- -----------------------------------------------------------------------------

CREATE TABLE SALLE
   (
    ID_SALLE serial NOT NULL  ,
    NB_PLACE int4 NOT NULL  
,   CONSTRAINT PK_SALLE PRIMARY KEY (ID_SALLE)
   );

-- -----------------------------------------------------------------------------
--       TABLE : PROJECTION
-- -----------------------------------------------------------------------------

CREATE TABLE PROJECTION
   (
    ID_PROJECTION serial NOT NULL  ,
    ID_DIFFUSION int4 NOT NULL  ,
    NOM text NOT NULL  ,
    PRIX int4 NOT NULL  ,
    DESCRIPTION text NOT NULL  ,
    DUREE int4 NOT NULL  
,   CONSTRAINT PK_PROJECTION PRIMARY KEY (ID_PROJECTION)
   );

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE PROJECTION
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_PROJECTION_DIFFUSION
     ON PROJECTION (ID_DIFFUSION)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE DIFFUSION ADD 
     CONSTRAINT FK_DIFFUSION_SALLE
          FOREIGN KEY (ID_SALLE)
               REFERENCES SALLE (ID_SALLE);

ALTER TABLE TICKET ADD 
     CONSTRAINT FK_TICKET_CLIENT
          FOREIGN KEY (ID_CLIENT)
               REFERENCES CLIENT (ID_CLIENT);

ALTER TABLE TICKET ADD 
     CONSTRAINT FK_TICKET_PROJECTION
          FOREIGN KEY (ID_PROJECTION)
               REFERENCES PROJECTION (ID_PROJECTION);

ALTER TABLE PROJECTION ADD 
     CONSTRAINT FK_PROJECTION_DIFFUSION
          FOREIGN KEY (ID_DIFFUSION)
               REFERENCES DIFFUSION (ID_DIFFUSION);


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------