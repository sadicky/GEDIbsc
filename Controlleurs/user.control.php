   <?php 
	   require_once('Models/user.class.php');
	   require_once('Models/historique.class.php');
	    
	    $user = new Users();

     
    function aborderLogin($emailaddress,$password,$remember_me)
	{
		
		$user = new Users();
		
		if ($data = $user->getUser($emailaddress,$password)->fetch()) 
		{ 
			 /*$hash = password_hash($password, PASSWORD_DEFAULT);
			if (password_verify($password, $hash)) 
			{
				header('location:dashboard');
				
			}
			else*/
			//var_dump($user);
			$_SESSION['ID_user'] = $data['ID_user'];
			$_SESSION['userName'] = $data['nom_user'];
		
			header('location:dashboard');
		
		}
	    else login();
	}
	//tout profil user
	function Inc_users()
	{
   		$user = new Users();
		$profil = $user->getAllProfilUser();
		include'Vues/User/user.php';
	}
	function groupUsers()
	{
		$user = new Users();
		$groupUser = $user->getgroupUser();
		include'Vues/User/groupUsers.php';
	}
  function affectUser($group,$auteur,$dateAfect,$affecte)
	{
				
			    $count_users = count($affecte);
				$ip = $_SERVER['REMOTE_ADDR'];
		        $hostname = gethostname();
		        $mac = "M-A";
				$user = new Users();
		        $historique = new Historiques(); 
				$i = 0;
				
					foreach ($affecte as $key => $value) 
					{
						//$iduser_tab = preg_split("#[_]+#", $value);
			            $i++; 
						var_dump($value);
						if ($user->setUser_group($value,$group)) 
						{
		                  
							if ($count_users == $i) 
							{
		                        if ($historique->setHistoriqueAction($value,$auteur,'affecte user','group user','creer',$dateAfect,$ip,$mac,$hostname)) 
		                        {
		                        	
		                        }
		                        header('Location:group_users');
		                        
								require_once('printing/fiches/user_group.php');
						}
					}
				}
			}
			function assignUser()
			{
				$user= new Users();		
				$assignUser= $user->assignUser_group();
				include 'Vues/User/assignUser.php';
			}
	//insertion de permission sur les pages 
	function setProfilUser($profile_name,$page,$l,$c,$m,$s,$i,$page_accept,$nb)
		{
			$user = new Users();
			
			//insertion profil et droit d'acces
				if ($user->setProfil_user_permession($profile_name,$page,$l,$c,$m,$s,$page_accept))
				{
					if ($i == $nb - 1) 
					{
						$msg = 'Le profil :'.$profile.' cree avec succes';
						header('location:users');
					}
				 }
		}
		function loggedUser()
		{
			$user= new Users();		
			$getUsers = $user->getAllusers();
			include 'Vues/User/userLoged.php';
		}
	
		//Tout les utilisateur
		 function getAllUser()
		{
			
			$user= new Users();		
			$getUsers = $user->getAllusers();
			include 'Vues/User/affiche_user.php';

		}
		//affiche profil
		function VoirProfil()
		{
			$user= new Users();		
			$getUsers = $user->getAllusers();
			include 'Vues/User/voirProfil.php';
		}
		function afficherMessage($message,$url)
		{
			$user = new Users();
			require_once $url;
		}
		function creerphoto_profil($idutilisateur,$fileTmpName,$uploadPath,$fileName)
		{
			
			$user = new Users();
			//echo "Bonjour".$idutilisateur.$nomphoto.$fileTmpName.$uploadPath.$fileName;
			//$iduser = preg_split("#[-]+#", $idutilisateur);
			 
		    //$idutilisateur[0]; 

			//echo 'fileTmpName: '.$fileTmpName.' uploadPath: '.$uploadPath.' fileName: '.$fileName;
			$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
			if ($didUpload) 
			{
				
				$photo = basename($fileName);
				//echo "idutilisateur : ".$idutilisateur." nom :".$nom." fichier : ".$fichier;
				if ($user->modifierphotoprofil($idutilisateur,$photo))
				{
					//echo 'upload reussie';
					//$user = new Users();
					//$msg = "La creation reussie";
					header("location:myprofil-".$_SESSION['ID_user']);
					//require_once('Vues/User/Myprofil.php');
				}
			}
			else
			{	$user = new User();
				$message = "La photo ".basename($fileName)." n'est pas chargé";
				require_once('Vues/User/Myprofil.php');
			}
		}
		function incmyprofil()
		{
			$user = new Users();
			include'Vues/User/Myprofil.php';
		}

		function deconnexion()
		{
			session_destroy();
			login();
			//in_login();
		}