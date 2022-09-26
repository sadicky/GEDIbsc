<?php

    //Fonction Login
	function login(){
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

    //Fonction de la page non trouvée
	function dashboard(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		$getCategory= new Category();		
		$getFile= new File();		
		$getFolder= new Folder();		
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$files = $getFile->getFiles();
		$list= $getFile->getAllTrash();
	    include('Vues/Admin/dashboard.php');
    }