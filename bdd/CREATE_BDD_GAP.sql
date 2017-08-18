CREATE TABLE public.militants
(
  id_militant serial NOT NULL,
  nom character varying(50),
  prenom character varying(50),
  email_militant character varying(100) NOT NULL UNIQUE,
  tel character varying(20),
  id_proximite character varying(15) NOT NULL UNIQUE,
  adresse character varying(250),
  ville character varying(100),
  codepostal integer,
  facebook character varying(20),
  twitter character varying(20),
  notes character varying(250),
  CONSTRAINT pk_militants PRIMARY KEY (id_militant)
)
;
CREATE TABLE public.aptitude
(
  id_militant integer NOT NULL UNIQUE,
  id_competence integer NOT NULL UNIQUE,
  niveau integer,
  CONSTRAINT pk_aptitude PRIMARY KEY (id_militant),
  CONSTRAINT fk_aptitude FOREIGN KEY (id_militant)
      REFERENCES public.militants (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
CREATE TABLE public.competences
(
  id_competence serial NOT NULL UNIQUE,
  nom_competence character varying(150),
  detail_competence character varying(150),
  CONSTRAINT pk_competences PRIMARY KEY (id_competence),
  CONSTRAINT fk_competences FOREIGN KEY (id_competence)
      REFERENCES public.aptitude (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
CREATE TABLE public.participe_action
(
  id_militant integer NOT NULL UNIQUE,
  id_action integer NOT NULL UNIQUE,
  id_role integer NOT NULL UNIQUE,
  CONSTRAINT pk_participe_action PRIMARY KEY (id_militant),
  CONSTRAINT fk_participe_action FOREIGN KEY (id_militant)
      REFERENCES public.militants (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
CREATE TABLE public.participe_formation
(
  id_militant integer NOT NULL UNIQUE,
  id_formation integer NOT NULL UNIQUE,
  CONSTRAINT pk_participe_formation PRIMARY KEY (id_militant),
  CONSTRAINT fk_participe_formation FOREIGN KEY (id_militant)
      REFERENCES public.militants (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;

CREATE TABLE public.actions
(
  id_action serial NOT NULL,
  nom_action character varying(100),
  type_action character varying(100),
  datedeb timestamp without time zone,
  duree interval,
  lieu character varying(100),
  id_campagne integer NOT NULL UNIQUE,
  CONSTRAINT pk_actions PRIMARY KEY (id_action),
  CONSTRAINT fk_actions FOREIGN KEY (id_action)
    REFERENCES public.participe_action (id_action) MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION
)
;


CREATE TABLE public.formations
(
  id_formation serial NOT NULL,
  nom_formation character varying(100),
  id_militant integer not null unique ,-- id militant formateur,
  type_formation character varying(100),
  datedeb timestamp without time zone,
  duree interval,
  lieu character varying(100),
  id_campagne integer NOT NULL UNIQUE ,
  notes character varying(250),
  CONSTRAINT pk_formations PRIMARY KEY (id_formation),
  CONSTRAINT fk_formations FOREIGN KEY (id_formation)
    REFERENCES public.participe_formation (id_militant) MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION
)
;


CREATE TABLE public.role_action
(
  id_role serial NOT NULL,
  nom_role character varying(150),
  CONSTRAINT pk_roleaction PRIMARY KEY (id_role),
  CONSTRAINT fk_role_action FOREIGN KEY (id_role)
      REFERENCES participe_action (id_role) MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION

)
;
CREATE TABLE public.association_militant
(
  id_militant integer NOT NULL UNIQUE,
  id_association integer NOT NULL UNIQUE,
  CONSTRAINT pk_association_militant PRIMARY KEY (id_militant),
  CONSTRAINT fk_association_militant FOREIGN KEY (id_militant)
      REFERENCES public.militants (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
CREATE TABLE public.association
(
  id_association serial NOT NULL,
  nom_association character varying(150),
  codepostal integer,
  type character varying(150),
  CONSTRAINT pk_association PRIMARY KEY (id_association),
  CONSTRAINT fk_association FOREIGN KEY (id_association)
      REFERENCES public.association_militant (id_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
;
--CREATE TABLE public.campagne
--(
  --id_campagne serial NOT NULL,
  --nom_campagne character varying(100),
  --periode interval,
  --contexte character varying(250),
  --CONSTRAINT pk_campagne PRIMARY KEY (id_campagne),
  --CONSTRAINT fk_campagne FOREIGN KEY (id_campagne)
   -- REFERENCES public.participe (id_campagne) MATCH SIMPLE
   -- ON UPDATE NO ACTION ON DELETE NO ACTION
--)
--;

CREATE TABLE public.mailing
(
  email_militant character varying(100) UNIQUE NOT NULL,
  id_proximite integer NOT NULL UNIQUE,
  CONSTRAINT pk_mailing PRIMARY KEY (email_militant),
  CONSTRAINT fk_mailing FOREIGN KEY (email_militant)
      REFERENCES public.militants (email_militant) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE public.proximite
(
  id_proximite serial NOT NULL,
  nom_proximite character varying(30),
  CONSTRAINT pk_proximite PRIMARY KEY (id_proximite),
  CONSTRAINT fk_proximite FOREIGN KEY (id_proximite)
      REFERENCES public.mailing (id_proximite) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);
