<?php
require_once('Models/user.class.php');
  
    //Fonction Login
	function login()
	{
		// require_once('Model/authAdmin.php');
		// require_once('Model/aa.class.php');
		// $getAa= new AA();		
		// $getAa = $getAa->getAllAA();
	    include('Vues/Login/login.php');
    }

   
    //Fonction de la page non trouvée
	function error404(){
		// require_once('Model/authAdmin.php');
		// require_once('Model/aa.class.php');
		// $getAa= new AA();		
		// $getAa = $getAa->getAllAA();
	    include('Vues/Login/error404.php');
    }

    //Fonction de la page dashboard
	function dashboard(){
		// require_once('Model/authAdmin.php');
		// require_once('Model/aa.class.php');
		// $getAa= new AA();		
		// $getAa = $getAa->getAllAA();
		 $user = new Users();
	    include('Vues/Admin/dashboard.php');
    }