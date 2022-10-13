create database gedibsc;
	use gedibsc;

	CREATE TABLE users (
  ID_user int(11) NOT NULL,
  nom_user varchar(10) ,
  prenom varchar(10) ,
  adress_mail varchar(10),
  password varchar(10),
  profil_id int(6),
  photo varchar(60),
  date_creation date, PRIMARY KEY(ID_user)
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    CREATE TABLE tbl_historique 
    (
        ID_HISTORIQUE int(11) NOT NULL,
        ID_ACTION int(11) NOT NULL,
        ID_user int(11) NOT NULL,
        TYPE varchar(10) ,
        ELEMENT varchar(10) ,
        ACTION varchar(60),
        DATE_CREATION datetime, PRIMARY KEY(ID_HISTORIQUE)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;