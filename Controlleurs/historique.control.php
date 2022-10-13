<?php
   require_once('Models/historique.class.php');
   $historique = new Historiques();

		//Tout les utilisateur
		 function inc_historique()
		{
			
			$historique = new Historiques();		
			$geHistorique = $historique->getHistoriqueActions();
			include 'Vues/Historique/Historique.php';

		}