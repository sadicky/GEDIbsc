<?php
require_once("connexion.php");

Class Category
{
    public $idcat;
    public $cat;
    public $dateins=null;
    public $idu = 1;

    //ajouter une categorie
    public function setCategory($cat,$idu)
    {   
        $this->cat=$cat; 
        $this->idu=$idu;
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_categories (CATEGORIE,IDU) VALUES (?,?)");
        $addline = $add->execute(array($cat,$idu)) or die(print_r($add->errorInfo()));
        return $addline;
    }

    //afficher toutes les catégories
    public function getCategories()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_categories order by CATEGORIE");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    //afficher les catégories actives
    public function getCategoriesA()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_categories WHERE STATUT='1' order by CATEGORIE");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    
    //afficher les catégories desactivés
    public function getCategoriesD()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_categories WHERE STATUT='0' order by CATEGORIE");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    //Modifier une categorie
    public function updateCategory($cat,$id)
    {
        $db = getConnection();
        $this->cat=$cat; 
        $this->id=$id;
        $statement = $db->prepare("UPDATE tbl_categories SET CATEGORIE=? WHERE ID=?");
        $addline=$statement->execute(array($cat,$id));
        return $addline;
    }
  
    //afficher une categorie
    public function getCatId($idcat)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_categories WHERE ID=? LIMIT 1");
        $matP->execute(array($idcat));
        $res =  $matP->fetchAll();
        return $res;
    }
    public function getCatId2($idcat)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_categories WHERE ID=? LIMIT 1");
        $matP->execute(array($idcat));
        $res =  $matP->fetchObject();
        return $res;
    }
	
    //activer une categorie
     public function activCat($idcat){
         $db = getConnection();
         $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='1' WHERE ID=?");
         $ok = $sql->execute(array($idcat));
        return $ok;
     }
     
     //desactiver une categorie
    public function deactivCat($idcat){
        $db = getConnection();
        $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='0' WHERE ID=?");
        $ok = $sql->execute(array($idcat));
        return $ok;
    }
}
?>