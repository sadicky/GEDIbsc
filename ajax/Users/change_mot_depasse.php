 
<?php
require_once("../../Models/connexion.php");
require_once('../../Models/user.class.php');
require_once('../../Models/historique.class.php');
	
	$user = new User();
	$historique = new Historiques();

	if($user->changemp($_GET['nomss'],$_GET['nouveaupassword']) > 0)
	{
		
		$idAction = $user->getLastUser()->fetch()['ID_user'];
	 	  if ($historique->setHistoriqueAction($idAction,'user',$_GET['nomss'],date('Y-m-d'),'change password')) 
			{
				echo "Vous venez de changer votre mot de passe avec succès";
			}
   
    }
  
     
