create database if not exists minichatbd character set 'utf8';
use minichatbd;

/*==============================================================*/
/* dbms name:      mysql 5.0                                    */
/* created on:     26/06/2021 11:37:03                          */
/*==============================================================*/


drop table if exists minichat;
drop table if exists visiteur;
drop table if exists identifiants;

/*==============================================================*/
/* table: Minichat                                                 */
/*==============================================================*/
create table minichat
(
   id              int not null auto_increment,
   pseudo             varchar(255) not null,
   messages         varchar(255) not null,
   dateInsert      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   primary key (id)
);

/*==============================================================*/
/* table: Visiteur                                                 */
/*==============================================================*/
create table visiteur
(
   id              int not null auto_increment,
   datenaissance      DATE NOT NULL,
   primary key (id)
);
/*==============================================================*/
/* table: Identifiant                                                 */
/*==============================================================*/
create table identifiants
(
   id              int not null auto_increment,
   logine      VARCHAR(255) NOT NULL,
   mdp         VARCHAR(255) NOT NULL,
   primary key (id)
);
/*==============================================================*/
/* table: utilisateur                                                 */
/*==============================================================*/
create table utilisateurs
(
   id              int not null auto_increment,
   nom     VARCHAR(255) NOT NULL,
   email         VARCHAR(255) NOT NULL,
   age         int NOT NULL,
   sexe         VARCHAR(255) NOT NULL,
   primary key (id)
);

/*------------------------------------------------------------------------*/
/*        Insertion des enregistrements                                                       */
/*-- -----------------------------------------------------------------------*/

insert into `minichat` (`pseudo`, `messages`) VALUES
  ('ZAGOR','on est en accord'),
  ('MOLADE','je suis pas d accord ZAGOR'),
  ('LELOUCHE','tu es vraiment louche'),
  ('ICARDI','le footballeur de renome'),
  ('le sprinx','je suis l homme mystére')
  
  
  

