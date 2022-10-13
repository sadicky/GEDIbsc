<?php
require_once("connexion.php");

Class Folder
{
    public $folder;
    public $idp;
    public $dateins=null;
    public $idu = 1;

    //ajouter un FOLDER
    public function setFolder($folder,$idp,$idu)
    {   
        $this->folder=$folder; 
        $this->idu=$idu;
        $this->idp=$idp;
        $db = getConnection();
        if(!file_exists($folder)){
            mkdir($folder,0777,true);
            $add = $db->prepare("INSERT INTO tbl_folders (FOLDER,IDP,IDU) VALUES (?,?,?)");
            $addline = $add->execute(array($folder,$idp,$idu)) or die(print_r($add->errorInfo()));
            return $addline;
        }else{
            echo "<span class='alert alert-danger alert-lg col-sm-12'>Field already created.<button type='button' class='close' data-dismiss='alert'>x</button></span>";
        }
    }

    //afficher touts les folders
    public function getFolders()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_folders order by FOLDER");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }

    //arborescence de folders
    public function getNodeData($idp,$db){
        $db = getConnection();
        $query = "SELECT * FROM tbl_folders WHERE IDP = ?";
        $statement = $db->prepare($query);
        $statement->execute(array($idp));
        $f = new Folder();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
         $sub_array = array();
         $sub_array['text'] = $row->FOLDER;
         $sub_array['nodes'] = array_values($f->getNodeData['$row->ID'],$db);
         $output[] = $sub_array;
        }
        return $output;

    }
    //afficher les folders actifs
    public function getfoldersA()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_folders WHERE STATUT='1' order by FOLDER");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    
    //Modifier un folder
    public function updateCategory($cat,$id)
    {
        $db = getConnection();
        $this->cat=$cat; 
        $this->id=$id;
        $statement = $db->prepare("UPDATE tbl_folders SET FOLDERS=? WHERE ID=?");
        $addline=$statement->execute(array($cat,$id));
        return $addline;
    }
  
    //afficher une FOLDERS
    public function getFolderId($idcat)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_folders WHERE ID=? LIMIT 1");
        $matP->execute(array($idcat));
        $res =  $matP->fetchAll();
        return $res;
    }
}
?>