<?php
  		require_once('Models/backup.class.php');
   	require_once('Models/user.class.php');
	   require_once('Models/historique.class.php');


		//Tout les utilisateur
		 function in_backup()
		{
			
			$backup = new Backups();	
			$user = new Users();
			$historique = new Historiques();	
			//$getbackup = $backup->getBackup();
			include 'Vues/Backup/backup.php';

		}
		function savebackup()
		{
			$backup = new Backups();	
			$user = new Users();
			$historique = new Historiques();	
			
		}