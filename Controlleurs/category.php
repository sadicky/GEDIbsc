<?php

    //Fonction Login
	function Category(){
		require_once('Models/category.class.php');
		$getCategory= new Category();		
		$getC = $getCategory->getCategories();
	    include('Vues/Category/categories.php');
    }
	
	function CategoryA(){
		require_once('Models/category.class.php');
		$getCategory= new Category();		
		$getC = $getCategory->getCategoriesA();
	    include('Vues/Category/catact.php');
    }
	function CategoryD(){
		require_once('Models/category.class.php');
		$getCategory= new Category();		
		$getC = $getCategory->getCategoriesD();
	    include('Vues/Category/catdes.php');
    }
    