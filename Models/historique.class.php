<?php
require_once('connexion.php');

class Historiques
{
    //insertion de l'historique
   public function setHistoriqueAction($idAction,$effectuerPar,$type,$ref,$action,$dateAction)
	{
		$db = getConnection();

		$query = $db->prepare("INSERT INTO tbl_historique(ID_action,ID_user,TYPE,ELEMENT,ACTION,DATE_CREATION) VALUES
			(:idAction,:effectuerPar,:type,:ref,:action,:dateAction)");
		$res = $query->execute(['idAction' => $idAction,'effectuerPar' => $effectuerPar,'type' => $type,'ref'=>$ref,'action' =>$action,'dateAction' => $dateAction]) or die(print_r($query->errorInfo()));
		return $res;
	}
	//affiche l'historique
    public function getHistoriqueActions()
	{
		$db = getConnection();
		$query = $db->prepare("SELECT nom_user,prenom,ID_HISTORIQUE,ID_ACTION,users.ID_user,TYPE,ELEMENT,ACTION,tbl_historique.DATE_CREATION,IP_HOST_LOGIN,MAC_HOST_LOGIN,HOSTNAME FROM tbl_historique,users WHERE tbl_historique.ID_user = users.ID_user GROUP BY ID_HISTORIQUE ");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
}