<?php

    //Fonction Login
	function Category(){
	require_once('Models/category.class.php');
		$getCategory= new Category();		
		//$getC = $getCategory->getCategories();
	    include('Vues/Category/categories.php');
    }
    