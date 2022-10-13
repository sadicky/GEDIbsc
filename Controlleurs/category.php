<?php

    //Fonction Login
	function Category(){
		require_once('Models/category.class.php');
		require_once('Models/file.class.php');		
		include 'Language/config.php';
		$getFile= new File();	
		$getCategory= new Category();		
		$getC = $getCategory->getCategories();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
		$files = $getFile->getFiles();
	    include('Vues/Category/categories.php');
    }
	
	function CategoryA(){
		require_once('Models/category.class.php');
		require_once('Models/file.class.php');	
		include 'Language/config.php';	
		$getFile= new File();	
		$getCategory= new Category();		
		$getC = $getCategory->getCategoriesA();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
		$files = $getFile->getFiles();
	    include('Vues/Category/catact.php');
    }
	function CategoryD(){
		require_once('Models/category.class.php');
		require_once('Models/file.class.php');		
		include 'Language/config.php';
		$getFile= new File();	
		$getCategory= new Category();		
		$getC = $getCategory->getCategoriesD();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
		$files = $getFile->getFiles();
	    include('Vues/Category/catdes.php');
    }
    