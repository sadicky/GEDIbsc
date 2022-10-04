<?php

	function Tags(){
		require_once('Models/tag.class.php');
		require_once('Models/file.class.php');	
		$getFile= new File();	
		$getT= new Tag();	
		$id = $_GET['id'];
        $tagsList = $getT->getTagByFile($id);	
        $v = $getFile->getTheFile($id);
		$tags = $getT->getAllTags();
		$list= $getFile->getAllTrash();
	    include('Vues/Tag/tags.php');
    }
	
	
    