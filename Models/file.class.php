<?php

require_once("connexion.php");
Class File
{
    public $extAccepted;
    public $fileState;
    
    function __construct() {   
        // echo (str_replace('files', 'Public/Uploads', $url));die();

        // var_dump($_SERVER);die();
        $this->extAccepted = array(
            "application/pdf",
            "application/excel",
            "application/word",
            "image/jpeg",
            "image/png",
            "image/gif"
        );
        
    }
    public function copyFile($file,$namev=0,$idp=0,$idc=0,$desc=0,$user=0){
        
        $destDir = str_replace('Models\file.class.php', 'Public\Uploads', __FILE__);
        //les datas from file
        $name = $file['fichier']['name'];
        $fileName= time().'_'.$name;
        $type = $file['fichier']['type'];
        $tmpName = $file['fichier']['tmp_name'];
        $error = $file['fichier']['error'];
        $size = $file['fichier']['size'];

        if($this->isup($tmpName)){
            $this->fileState.="le fihier n'as pas été uploader de maniere régulière";
            echo "<span class='alert alert-success alert-lg col-sm-12'>le fichier n'as pas été uploader de maniere réguilere
            <button type='button' class='close' data-dismiss='alert'>x</button></span>";
            die();
        }
        if(!in_array($type, $this->extAccepted)){  
            echo "<span class='alert alert-danger alert-lg col-sm-12'>le format ".$type." est incorrecte <button type='button' class='close' data-dismiss='alert'>x</button></span>";          
            die();
        }
        // if(preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name )){
        //     echo 'tentative de hack';
        //     die();
        // }
        if($error !="0"){
            echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d\'upload <button type='button' class='close' data-dismiss='alert'>x</button></span>";          
            die();
        }
        if($size > 100000000){
            echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur de taille : ".$size." Trop lourde<button type='button' class='close' data-dismiss='alert'>x</button></span>";          
            die();
        }
        if(move_uploaded_file($tmpName, $destDir.DIRECTORY_SEPARATOR.$fileName)){ 
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $url = "https";
            } else {
                $url = "http";
            }
            $url .= "://";
            $url .= $_SERVER['HTTP_HOST'];
            $url .= $_SERVER['REQUEST_URI']; 
           $add= $this->addToDb($fileName, $namev,$type, str_replace('Public\Script\File\addfile.php', 'Public\Uploads', $url).'/'.$fileName , 
            $destDir.DIRECTORY_SEPARATOR.$fileName,$size,$desc,$user,$idp,$idc);
            if($add){
                header('Location:../../../files');
              }else{
                echo "<span class='alert alert-danger alert-lg col-sm-12'>Le fichier n'à pas été ajouté dans la base de donnée.<button type='button' class='close' data-dismiss='alert'>x</button></span>";          
                }
        }else{
            echo "<span class='alert alert-danger alert-lg col-sm-12'>Le fichier n'à pas été telechargé.<button type='button' class='close' data-dismiss='alert'>x</button></span>";          
           
        }
    }
     /**
     * vérifie si le fichier à bien été chargé
     * @param type $tmpName
     */
    public function isup($tmpName){
        if(!is_uploaded_file($tmpName)){
            true;
        }else{
            false;
        }
    }
    public function addToDb($fileName,$namev,$fileType,$fileUrl,$filePath,$size,$desc,$user,$idp,$idc){
        $db = getConnection();
        if($namev==""){
            $namev=$fileName;
        }
        $add = $db->prepare("INSERT INTO tbl_files set NAMEF=?,NAMEVIEW=?,TYPEF=?,URLF=?,PATHF=?,SIZEF=?,
        DESCRIPTIONF=?,IDU=?,IDD=?,IDC=?");
        $addline =$add->execute(array($fileName,$namev,$fileType,$fileUrl,$filePath,$size,$desc,$user,$idp, $idc)) or die(print_r($add->errorInfo()));
        return $addline;
    }
    
    public function getFiles(){
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_files ORDER by NAMEVIEW");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    public function getFilesByCategory($categoryId){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_files WHERE IDC=? ");
        $r->execute([$categoryId]);
        return $r->fetchAll();
    }
    public function getFilesByKeyWord($kw){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_files WHERE name LIKE :queryString OR nameView LIKE :queryString OR keywords LIKE :queryString OR description LIKE :queryString");
        $r->execute([':queryString' => '%'.$kw.'%']);
        return $r->fetchAll();
    }
    public function getTheFile($id){
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_files WHERE ID=? LIMIT 1");
        $matP->execute(array($id));
        $res =  $matP->fetchObject();
        return $res;
    }

    public function getTheFile2($id){
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_files WHERE ID=? LIMIT 1");
        $matP->execute(array($id));
        $tbP = array();
        while($data =  $matP->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    public  function updateNameAndCategory($id,$name,$category,$descrition,$kw) {
        $r = $this->db->prepare("UPDATE tbl_files SET nameView=?, category_id=?, description=?, keywords=? WHERE id=?");
        $r->execute([
            $name,
            $category,
            $descrition,
            $kw,
            $id
        ]);
    }

    public function moveToTrash($id){
        $db = getConnection();
         $r =$db->prepare("SELECT * FROM tbl_files WHERE ID = ?");
        $r->execute([$id]);
        $n = $r->fetchAll(PDO::FETCH_OBJ)[0];
        $s = serialize($n);
        $name=$n->NAMEVIEW;
        $r = $db->prepare("INSERT INTO tbl_trash SET FILE_NAMEF=?, DATAF=?");
        $r->execute([
            $name,
            $s
        ]);
        $r = $db->prepare("DELETE FROM tbl_files WHERE ID=?");
        $r->execute(array($id));
        unserialize($s);
        // var_dump(unserialize($s));
        // die();
    }
    
    public function getAllTrash(){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_trash");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    
    public function backFile($trashId){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_trash WHERE ID = ?");
        $r->execute([$trashId]);
        $n = $r->fetchAll(PDO::FETCH_OBJ)[0];
        $o = unserialize($n->DATAF);
        
        $r = $db->prepare("INSERT INTO tbl_files SET ID=?, NAMEF=?, NAMEVIEW=?, TYPEF=?, CREATEDAT=?, 
        URLF=?, PATHF=?, IDC=?, IDD=?, IDU=?, SIZEF=?, DESCRIPTIONF=?, KEYWORDS=?, VERSION=?");
        $r->execute([
            $o->ID,
            $o->NAMEF,
            $o->NAMEVIEW,
            $o->TYPEF,
            $o->CREATEDAT,
            $o->URLF,
            $o->PATHF,
            $o->IDC,
            $o->IDD,
            $o->IDU,
            $o->SIZEF,
            $o->DESCRIPTIONF,
            $o->KEYWORDS,
            $o->VERSION
        ]);
        $rb = $db->prepare("DELETE FROM tbl_trash WHERE ID=?");
        $rb->execute([$trashId]);
        //var_dump($o);
        //die();
        
    }

    //supprimer de la corbeille
    function unlinkFile($trashId){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_trash WHERE ID = ?");
        $r->execute([$trashId]);
        $n = $r->fetchAll(PDO::FETCH_OBJ)[0];
        $o = unserialize($n->DATAF);
        unlink($o->PATHF);
        $rb = $db->prepare("DELETE FROM tbl_trash WHERE ID=?");
        $rb->execute([$trashId]);
        // $ra = $db->prepare("DELETE FROM tbl_files_as_tags WHERE file_id=?");
        // $ra->execute([$o->id]);
    }
    

}
?>