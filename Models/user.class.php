<?php
require_once('connexion.php');

class Users 
{
	
	
	public function getUser($mail,$password)
	{
		$db = getConnection();
		$query = $db->prepare('SELECT ID_user,nom_user,profil_id,prenom,date_creation FROM users WHERE adress_mail = :mail AND password = :password');
		$query->execute(array('mail' => $mail,'password' => $password)) or die(print_r($query->errorInfo()));
		return $query;
	}

	public function getUserId($mail)
	{
		$db = getConnection();
		$query = $db->prepare('SELECT * FROM users WHERE adress_mail = :mail LIMIT 1');
		$query->execute(array('mail' => $mail)) or die(print_r($query->errorInfo()));
		$query=$query->fetchObject();
		return $query;
	}
      public function getAllusers()
    {
    	$db = getConnection();
		$query = $db->prepare("SELECT ID_user,nom_user,prenom,date_creation,adress_mail,profil_user.profil_name FROM users,profil_user WHERE profil_user.profil_id = users.profil_id");
		$query->execute() or die(print_r($query->errorInfo()));
		//return $query->fetchAll(PDO::FETCH_OBJ);
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	 public function affect_users()
    {
    	$db = getConnection();
		$query = $db->prepare("SELECT ID_user,nom_user,prenom,date_creation,adress_mail,profil_user.profil_name FROM users,profil_user WHERE profil_user.profil_id = users.profil_id");
		$query->execute() or die(print_r($query->errorInfo()));
		return $query->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	//nombre total des users

	public function compteAllusers()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT count(*) AS nb FROM users");
		$query ->execute();
		return $query;
	}
	//nombre total des profiles

	public function compteprofils_Allusers()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT count(*) AS nb FROM profil_user");
		$query ->execute();
		return $query;
	}
	public function Ajout_user($nom,$prenom,$mail,$password,$profil,$date_creation)
	{
		
		$db = getConnection();
		$query = $db->prepare("INSERT INTO users(nom_user,prenom,adress_mail,password,profil_id,date_creation) VALUES (:nom,:prenom,:mail,:password,:profil,:date_creation)");
		$rs = $query->execute(array('nom' =>$nom,'prenom'=>$prenom,'mail' =>$mail,'password' =>$password,'profil' =>$profil,'date_creation'=>$date_creation)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	public function setProfil_user_permession($profil_id,$page,$L,$C,$M,$S,$page_accept)
	{
		$db = getConnection();
		$query = $db->prepare("INSERT INTO profil_user_permission(profil_id,page,L,C,M,S,page_accept) VALUES(:profil_id,:page,:L,:C,:M,:S,:page_accept)");
		$res = $query->execute(array('profil_id' => $profil_id,'page' => $page,'L' => $L,'C' => $C,'M' => $M,'S' => $S,'page_accept' => $page_accept)) or die(print_r($query->errorInfo()));
		return $res;
	}
	public function setProfil_user($profil_name)
	{
		$db = getConnection();
		$query = $db->prepare("INSERT INTO profil_user(profil_name) VALUES(?)");
		$query->execute(array($profil_name));
		return $query->errorInfo();
	}
	public function getMaxProfilIdUser()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT MAX(profil_id) AS profil_id FROM profil_user");
		$query->execute() or die(print_r($query->errorInfo()));
		return $query;
	}
	public function getAllProfilUser()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT * FROM profil_user");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	public function verifierPermissionDunePage($page,$iduser)
	{
		$db = getConnection();
		$query = $db->prepare("SELECT page,L,C,M,S FROM users,profil_user pu,profil_user_permission pup WHERE users.profil_id = pu.profil_id AND pu.profil_id = pup.profil_id AND page = :page AND users.ID_user =:iduser AND page_accept = 1");
		$query->execute(array('page' => $page,'iduser' => $iduser)) or die(print_r($query->errorInfo()));
		return $query;
	}
	public function affiche_permission_par_profil($profil_id)
	{
		$db = getConnection();
		$query = $db->prepare("SELECT id,profil_user.profil_id,page,L,C,M,S FROM `profil_user_permission`,`profil_user` WHERE profil_user_permission.profil_id = profil_user.profil_id AND profil_user.profil_id = ?");
		$query->execute(array($profil_id)) or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	public function update_permission($idpermission,$lire,$creer,$modifier,$supprimer,$page_accept)
	{
		$db = getConnection();
		$query = $db->prepare("UPDATE profil_user_permission SET L=:L,C=:C,M=:M,S=:S,page_accept=:page_accept WHERE id=:idpermission");
		$res = $query->execute(array('L' => $lire,'C' => $creer,'M' => $modifier,'S' => $supprimer,'page_accept' => $page_accept,'idpermission' => $idpermission)) or die(print_r($query->errorInfo()));
		return $res;
	}
	public function UpdateUser($iduser,$nomuser,$prenom,$mail_user)
	{
		$db = getConnection();
		$query = $db->prepare("UPDATE users SET nom_user = :nomuser,prenom = :prenom,adress_mail =:mail_user WHERE ID_user = :iduser");
		$rs = $query->execute(array('nomuser' => $nomuser,'prenom'=>$prenom,'mail_user' => $mail_user,'iduser' =>$iduser)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	public function setGroup_user($group_user)
	{
		$db = getConnection();
		$query = $db->prepare("INSERT INTO tbl_group_user(groupName) VALUES(?)");
		$query->execute(array($group_user));
		return $query->errorInfo();
	}
	public function getgroupUser()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT ID_group,groupName FROM tbl_group_user");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	public function UpdateGroupUser($id,$nom)
	{
		$db = getConnection();
		$query = $db->prepare("UPDATE tbl_group_user SET groupName = :nom WHERE ID_group = :id");
		$rs = $query->execute(array('nom' => $nom,'id' =>$id)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	public function setUser_group($iduser_tab,$group)
	{
		$db = getConnection();
		$query = $db->prepare("INSERT INTO tbl_affecte_user(ID_user,ID_group) VALUES(:iduser_tab,:group)");
		$res = $query->execute(['iduser_tab' => $iduser_tab,'group' => $group]) or die(print_r($query->errorInfo()));
		return $res;
	}
	public function assignUser_group()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT users.ID_user,users.nom_user,users.prenom,users.profil_id,tbl_group_user.groupName,profil_name FROM users,tbl_affecte_user,tbl_group_user,profil_user WHERE users.ID_user = tbl_affecte_user.ID_user AND users.profil_id = profil_user.profil_id AND tbl_group_user.ID_group = tbl_affecte_user.ID_group GROUP BY tbl_affecte_user.id");
		$query->execute() or die(print_r($query->errorInfo()));
		$res = array();
		while ($data = $query->fetchObject()) 
		{
			$res[] = $data;
		}
		return $res;
	}
	//save photo
	public function modifierphotoprofil($idutilisateur,$photo)
 	{
 		$db = getConnection();
		$query = $db->prepare("UPDATE users SET photo = :photo WHERE ID_user = :idutilisateur");
		$rs = $query->execute(array('photo' => $photo,'idutilisateur' =>$idutilisateur)) or die(print_r($query->errorInfo()));
		return $rs;
 	}
 	//get image profil
 	public function image_user($iduser)
	{
	 	$db = getConnection();
	 	$query = $db->prepare("SELECT photo FROM users WHERE ID_user =?");
	 	$query->execute(array($iduser));
	 	$rs = array();
	 	while ( $data = $query->fetchObject()) 
	 	{
	 		$rs[] = $data;
	 	}
	 	return $rs;
	}
	public function afficheprofilUser($iduser)
	{
	 	$db = getConnection();
	 	$query = $db->prepare("SELECT nom_user,prenom,profil_user.profil_id,profil_name,adress_mail,photo FROM users,profil_user WHERE users.profil_id = profil_user.profil_id AND users.ID_user =?");
	 	$query->execute(array($iduser));
	 	$rs = array();
	 	while ( $data = $query->fetchObject()) 
	 	{
	 		$rs[] = $data;
	 	}
	 	return $rs;
	}
	//change the password
	public 	function changemp($nomss,$nouveaupassword)
	{
		$db = getConnection();
		$query = $db->prepare("UPDATE users SET  password = :nouveaupassword WHERE nom_user = :nomss");
		$rs = $query->execute(array('nouveaupassword' => $nouveaupassword,'nomss' => $nomss)) or die(print_r($query->errorInfo()));
		return $rs;
	}
	public function getLastUser()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT MAX(ID_user) as ID_user FROM user");
		$query->execute();
		return $query;
	}
	public function modif_detailprofil($identifiant,$nomuser,$prenomuser,$adresmail,$loginuser)
	{
		$db = getConnection();
		$query = $db->prepare("UPDATE users SET  nom_user = :nomuser,prenom = :prenomuser,adress_mail = :adresmail WHERE ID_user = :identifiant");
		$rs = $query->execute(array('nomuser' => $nomuser,'prenomuser' => $prenomuser,'adresmail' => $adresmail,'identifiant' => $identifiant)) or die(print_r($query->errorInfo()));
		return $rs; 
	}
	public function recupererMailDe_userActif()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT adress_mail FROM users WHERE adress_mail <> ''");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
	public function recupererMailDeuserParGroup($idgroup)
	{
		$db = getConnection();
		$query = $db->prepare("SELECT users.ID_user,nom_user,adress_mail,prenom,photo FROM tbl_affecte_user,users WHERE tbl_affecte_user.ID_user = users.ID_user AND tbl_affecte_user.ID_group = ?");
		$query->execute(array($idgroup)) or die(print_r($query->errorInfo()));

		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}