<?php
session_start();  
define('WEBROOT',str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));

include 'Controlleurs/category.php';
include 'Controlleurs/main.php'; 
include 'Controlleurs/file.control.php';
include 'Controlleurs/folder.php';
include 'Controlleurs/backup.control.php';
include 'Controlleurs/user.control.php';
include 'Controlleurs/historique.control.php';
include 'Controlleurs/chat.control.php';
include 'config/backup.php';

	if(isset($_GET['p']))
	{
		$params = explode('/', $_GET['p']); 
		//die(print_r($params));
		$_SESSION['action'] = '';
		$action = $params[0];
		$d = preg_split("#[-]+#", $action);
		$n = count($d);   
		if ($n > 1)  
		{
			$action = $d[0];
		}
		if ($action == 'login') 
		{

			aborderLogin($_POST['emailaddress'],$_POST['password'],$_POST['remember_me']);
		}
		
		else if($action =='dashboard')
		{
			dashboard();
		}
		else if($action =='categories')
		{
			Category();
		}
		else if($action == 'users')
		{
			Inc_users();
		}
		elseif($action == 'group_users')
		{
			groupUsers();
		}
		elseif($action == 'voir_user')
		{
			getAllUser();
		}
			elseif ($action == 'setprofiluser') 
			{
				$page = array();
				$page = $_SESSION['page'];
				$nb = count($page);
				$page_accept = 0;
				for ($i=0; $i < $nb; $i++) 
				{
					$ll = 'l'.$i;
					$cc = 'c'.$i;
					$mm = 'm'.$i;
					$ss = 's'.$i; 
					if (isset($_POST['l'.$i])) 
					{
						$l = 1;
						$page_accept = 1;
					}
					else $l = 0;
					if (isset($_POST['c'.$i])) 
					{
						$c = 1;
						$page_accept = 1;
					}
					else $c = 0;
					if (isset($_POST['m'.$i])) 
					{
						$m = 1;
						$page_accept = 1;
					}
					else $m = 0;
					if (isset($_POST['s'.$i])) 
					{
						$s = 1;
						$page_accept = 1;
					}
					else $s = 0;
					//var_dump($_POST['profile_name'].'=>'.$page[$i].'=>'.$l.'=>'.$c.'=>'.$m.'=>'.$s.'=>'.$i.'=>'.$page_accept.'=>'.$nb);die();
					setProfilUser($_POST['profile_name'],$page[$i],$l,$c,$m,$s,$i,$page_accept,$nb);
						$page_accept = 0;

					/*if ($page_accept == 1) 
					{
						setProfilUser($_POST['profile_name'],$page[$i],$l,$c,$m,$s,$i,$page_accept);
						$page_accept = 0;
					}*/
				}
			}
			elseif ($action =='updroitacces') {
				//echo "vous etes la ";
			}
		//url pour creer ub dossier
		else if($_GET['p']=='foldercreate')
		{
			createFolder();
		}
		//url pour tous les dossiers
		else if($_GET['p']=='folderall')
		{
			Folders();
		}
		//url pour la categorie
		else if($_GET['p']=='categories')
		{
			Category();
		}
		//url pour le file
		else if($_GET['p']=='files')
		{
			Files();
		}
		else if ($action == 'from_mail') 
		{
			from_mail();
		}
		elseif($action == 'sendMail')
		{
			Sendmail();
		}
		elseif ($action == 'file_scan') 
		{
			fileScan();
		}
		//recupere le data dun fichier
		else if($_GET['p']=='file')
		{
			FileId();
		}
		elseif($action =='affecteUser')
		{
			if (isset($_POST['group']) AND isset($_POST['auteur']) AND isset($_POST['dateAfect']) AND isset($_POST['affecte'])) 
				{
					
					affectUser($_POST['group'],$_POST['auteur'],$_POST['dateAfect'],$_POST['affecte']);
				}
				//else sendMsgError('Tous les champs doivent etre remplis et verifiez si vou avez selectionne un user');
		}
		elseif($action =='group_user')
		{
			assignUser();
		}
		
		//recupere un fichier
		else if($_GET['p']=='trash')
		{
			allTrashed();
		}
		elseif ($action =='voir_profil') 
		{
			VoirProfil();
		}
 
		//historique
		elseif($action =='historique')
		{
			inc_historique();
		}
		//my profil
		elseif($action =='myprofil')
		{
			incmyprofil();
		}
		//recupere une photo
		elseif ($action =='image_profil') 
		{
			// code...
		}
		elseif ($action == 'loggedUser') 
		{
			loggedUser();
		}
		elseif($action =='backup')
		{
			//echo" Backup ";
			in_backup();
		}
		//charger une photo
		elseif($action =='photoprofil')
		{
			if(!file_exists($_FILES['photo']['tmp_name']) || !is_uploaded_file($_FILES['photo']['tmp_name'])) 
				{
					$message= 'Veuillez selectionner une photo SVP !';
					//$url = "vue/admin/utilisateur/photo_profil.php";
					afficherMessage($message,$url='Vues/User/Myprofil.php');
				}   
				else
				{ 
					if (isset($_POST['idutilisateur'])) 
         		    {
	            		$message = []; // Store all foreseen and unforseen errors here
	            		if (!empty($_POST['idutilisateur'])) 
	           			{
			              	$currentDir = getcwd();
			              	$uploadDirectory = "/image_profil/";
			              	$fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
			              	$fileName = $_FILES['photo']['name'];
			              	$fileSize = $_FILES['photo']['size'];
			              	$fileTmpName = $_FILES['photo']['tmp_name'];
			              	$fileType = $_FILES['photo']['type'];
			              	$uploadPath = $currentDir.$uploadDirectory.basename($fileName);

				            if ($fileType != 'image/jpg' AND $fileType != 'image/jpeg' AND $fileType != 'image/png') 
         					{
     					 		$message ="Ce fichier ne pas supporté! Veuillez choisir l'extension JPEG ou PNG"; //echo"Ce fichier n'est supporté! Veuillez choisir l'extension JPEG ou PNG";
         					}
             				if ($fileSize > 1000000) 
          					{
         					   $message ="Cette photo depasse 1MB";
        				    }
	            			if (empty($message)) 
         					{
          						creerphoto_profil($_POST['idutilisateur'],$fileTmpName,$uploadPath,$fileName);
        					}
            				else
         					{	//require_once('Vues/User/Myprofil.php');
          						  $url = "Vues/User/Myprofil.php";
           						  afficherMessage($message,$url);
          					} 
        			    }
        				else
   						{
         					$url = "Vues/User/Myprofil.php";
         					$message[] = "Veillez remplir tous les champs";
         					 afficherMessage($message,$url);
   						}
  					} 
									//echo 'upload';
				}
		}
		elseif($action =='sendMailToUser')
		{
			
				$sujet = $_POST['sujet'];
				$message = $_POST['message'];
				$sendGroup = $_POST['sendGroup'];
				//$sendForAll = (isset($_POST['sendForAll']) ? true : false);
				$_SESSION['result'] = '';
				$_SESSION['status'] = '';
				$_SESSION['result'] = '';
				$_SESSION['status'] = '';
                if (isset($_FILES['attachFile']) && $_FILES['attachFile']['error'] == UPLOAD_ERR_OK) 
				{
					$file = $_FILES['attachFile']['tmp_name'];
					$fileName = $_FILES['attachFile']['name'];
				}
				
				sendMailToClient($sujet,$message,$sendGroup/*,$sendForAll*/,$file,$fileName);
		}
		elseif($action == 'getBackup')
		{

			              	// $currentDir = getcwd();
			              	// $uploadDirectory = "/image_profil/";
			              	// $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
			              	// $fileName = $_FILES['photo']['name'];
			              	// $fileSize = $_FILES['photo']['size'];
			              	// $fileTmpName = $_FILES['photo']['tmp_name'];
			              	// $fileType = $_FILES['photo']['type'];
			              	// $uploadPath = $currentDir.$uploadDirectory.basename($fileName);
			error_reporting(0);

			//include 'config/backup.php';

			if(isset($_POST['backupnow'])){

			$server = $_POST['server'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$dbname = $_POST['dbname'];
			


			backDb($server, $username, $password, $dbname);

			exit();

			}
			else{
			echo 'Add All Required Field';
			}
			//savebackup();
		}
		elseif ($action == 'chat') 
		{
			inc_chat();
		}
		elseif ($action == 'chatroom') 
		{
			inc_chatroom();
		}

		//deconnexion
		elseif ($action == 'deconnexion') 
		{
			deconnexion();
		}
		
		else
		{
			error404();

		}	
	}
	else
	{
		session_destroy();
		login();
	}

?>