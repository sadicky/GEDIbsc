

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL AUTO_INCREMENT,
  `chatroomid` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  PRIMARY KEY (`chat_memberid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL AUTO_INCREMENT,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `ID_user` int(11) NOT NULL,
  PRIMARY KEY (`chatroomid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `profil_user` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_name` varchar(60) NOT NULL,
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil_name` (`profil_name`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

INSERT INTO profil_user VALUES("7","");
INSERT INTO profil_user VALUES("1","Manager");
INSERT INTO profil_user VALUES("6","Technique");



CREATE TABLE `profil_user_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_id` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `L` int(1) NOT NULL DEFAULT 0,
  `C` int(1) NOT NULL DEFAULT 0,
  `M` int(1) NOT NULL DEFAULT 0,
  `S` int(1) NOT NULL DEFAULT 0,
  `page_accept` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_profil_user-permission_on_profil_id` (`profil_id`),
  CONSTRAINT `fk_profil_user-permission_on_profil_id` FOREIGN KEY (`profil_id`) REFERENCES `profil_user` (`profil_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO profil_user_permission VALUES("1","1","categorie","0","0","0","0","0");
INSERT INTO profil_user_permission VALUES("2","1","users","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("3","1","files","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("4","1","tags","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("5","1","trash","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("6","1","filter","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("7","1","rapport","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("8","1","dashboard","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("9","1","logs","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("10","1","backup","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("11","1","user online","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("12","1","settings","1","1","1","1","1");
INSERT INTO profil_user_permission VALUES("37","1","group user","1","1","1","1","1");



CREATE TABLE `tbl_affecte_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `ID_group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_affecte_user VALUES("1","1","3");
INSERT INTO tbl_affecte_user VALUES("3","6","3");
INSERT INTO tbl_affecte_user VALUES("4","1","1");
INSERT INTO tbl_affecte_user VALUES("5","6","1");



CREATE TABLE `tbl_group_user` (
  `ID_group` int(10) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_group`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_group_user VALUES("1","Coordination");
INSERT INTO tbl_group_user VALUES("3","partenaires");



CREATE TABLE `tbl_historique` (
  `ID_HISTORIQUE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ACTION` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `TYPE` varchar(15) DEFAULT NULL,
  `ELEMENT` varchar(15) DEFAULT NULL,
  `ACTION` varchar(8) DEFAULT NULL,
  `DATE_CREATION` datetime DEFAULT NULL,
  `IP_HOST_LOGIN` varchar(25) DEFAULT NULL,
  `MAC_HOST_LOGIN` varchar(25) DEFAULT NULL,
  `HOSTNAME` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_HISTORIQUE`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_historique VALUES("1","2","1","profil","permission","creer","2022-09-25 01:54:37","127.0.0.1","","ALAIN-PC");
INSERT INTO tbl_historique VALUES("2","0","8","affecte user","group user","creer","2022-10-04 00:00:00","","","");



CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(10) DEFAULT NULL,
  `prenom` varchar(10) DEFAULT NULL,
  `adress_mail` varchar(25) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `profil_id` int(6) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","Alain muci","alain","alainmusha27@gmail.com","povic","1","455.2$.jpg","2022-09-20");
INSERT INTO users VALUES("6","sadiky","david","alainmuchiga@hotmail.com","$2y$10$g8n","2","","2022-09-26");
INSERT INTO users VALUES("9"," IRUTA","Bernard","irutabernard@gmail.com","123","1","","2022-10-10");
INSERT INTO users VALUES("10","Jado","Jado","alainmuchiga@hotmail.com","123","2","","2022-10-10");

