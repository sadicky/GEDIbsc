<?php

require_once("connexion.php");
Class File
{
    public $extAccepted;
    public $fileState;
    
    function __construct() {   

        // var_dump($_FILES);die();

        $this->extAccepted = array(
            "application/pdf","application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg","video/mpeg","image/png","audio/mpeg",
            "image/gif","video/mp4","video/x-matroska"
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
           $add= $this->addToDb($fileName, $namev,$type, str_replace('Public/Script/File/addfile.php', 'Public\Uploads', $url).'/'.$fileName , 
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
        $r = $db->prepare("SELECT * FROM tbl_files WHERE NAMEF LIKE :queryString OR NAMEVIEW LIKE :queryString OR TYPEF LIKE :queryString OR DESCRIPTIONF LIKE :queryString OR KEYWORDS LIKE :queryString");
        $r->execute([':queryString' => '%'.$kw.'%']);
        return $r->fetchAll();
    }
    
    public function getFilesByDate($from){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_files
        WHERE CREATEDAT BETWEEN '?' ");
        $r->execute([$from]);
        return $r->fetchAll();
    }
    
    public function getFilesByFolder($folderId){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_files WHERE IDD=? ");
        $r->execute([$folderId]);
        return $r->fetchAll();
    }

    public function getTheFile($id){
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_files WHERE  md5(ID) = ? LIMIT 1");
        $matP->execute(array($id));
        $res =  $matP->fetchObject();
        return $res;
    }

    public function getTheFile2($id){
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_files WHERE md5(ID) =? LIMIT 1");
        $matP->execute(array($id));
        $tbP = array();
        while($data =  $matP->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    
    public function updateFile($file,$namev=0,$idp=0,$idc=0,$desc=0,$user=0,$kw=0,$vers=0,$id){
        
        $destDir = str_replace('Models\file.class.php', 'Public\Uploads', __FILE__);

        // var_dump($id);die();$_POST['kw'],
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
            $add= $this->updateFiles($fileName, $namev,$type, str_replace('Public/Script/File/editfile.php', 'Public\Uploads', $url).'/'.$fileName , 
            $destDir.DIRECTORY_SEPARATOR.$fileName,$size,$desc,$user,$idp,$idc,$kw,$vers,$id);
            header('Location:../../../files');
                
        }else{
            echo "<span class='alert alert-danger alert-lg col-sm-12'>Le fichier n'à pas été telechargé.<button type='button' class='close' data-dismiss='alert'>x</button></span>";          
           
        }
    }

    public  function updateFiles($fileName,$namev,$fileType,$fileUrl,$filePath,$size,$desc,$user,$idp, $idc,$kw,$vers,$id) {

        $db = getConnection();
        $r =$db->prepare("SELECT * FROM tbl_files WHERE ID = ?");
        $r->execute([$id]);
        $n = $r->fetchAll(PDO::FETCH_OBJ)[0];
        $s = serialize($n);
        $name=$n->NAMEVIEW;
        $version=$n->VERSION;
        $id=$n->ID;
        $r = $db->prepare("INSERT INTO tbl_files_version SET FILE_NAMEF=?, DATAF=?, VERSION=?, IDF=?");
        $r->execute([
            $name,
            $s,
            $version,
            $id
        ]);      
        $r = $db->prepare("UPDATE tbl_files SET NAMEF=?, NAMEVIEW=?, TYPEF=?,URLF=?, PATHF=?,SIZEF=?,
         DESCRIPTIONF=?, IDU=?, IDD=?, IDC=?, KEYWORDS=?, VERSION=? WHERE ID=?");
        $r->execute([$fileName,$namev,$fileType,$fileUrl,$filePath,$size,$desc,$user,$idp, $idc,$kw,$vers,$id]);
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

    //all file version
    public function getFileVersion($id){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_files_version WHERE md5(IDF)=?");
        $r->execute(array($id));
        $tbP = array();
        while($data =  $r->fetchObject()){
            $tbP[] = $data;
        }
        return $tbP;
    }
    public function getFileV($id){
        $db = getConnection();
        $r = $db->prepare("SELECT DISTINCT VERSION FROM tbl_files_version WHERE md5(IDF)=?");
        $r->execute(array($id));
       $data =  $r->fetchObject();
        return $data;
    }
    
    public function backVersion($versionId){
        $db = getConnection();
        $bv = $db->prepare("SELECT * FROM tbl_files_version WHERE ID = ?");
        $bv->execute([$versionId]);
        $n = $bv->fetchAll(PDO::FETCH_OBJ)[0];
        $o = unserialize($n->DATAF);
        $idf=$n->ID;
        $versionf=$n->VERSION;

        
        $r1 =$db->prepare("SELECT * FROM tbl_files WHERE ID = ?");
        $r1->execute([$idf]);
        $n1 = $r1->fetchAll(PDO::FETCH_OBJ)[0];
        $s1 = serialize($n1);
        $name=$n1->NAMEVIEW;
        $version=$n1->VERSION;
        $id=$n1->ID;

        $r1 = $db->prepare("INSERT INTO tbl_files_version SET FILE_NAMEF=?, DATAF=?, VERSION=?, IDF=?");
        $r1->execute([
            $name,
            $s1,
            $version,
            $id
        ]);
        
        $bv = $db->prepare("UPDATE tbl_files SET ID=?, NAMEF=?, NAMEVIEW=?, TYPEF=?, CREATEDAT=?, 
        URLF=?, PATHF=?, IDC=?, IDD=?, IDU=?, SIZEF=?, DESCRIPTIONF=?, KEYWORDS=?, VERSION=?");
        $a= $bv->execute([
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
    }

    //supprimer de la corbeille
    public function unlinkFile($trashId){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_trash WHERE ID = ?");
        $r->execute([$trashId]);
        $n = $r->fetchAll(PDO::FETCH_OBJ)[0];
        $o = unserialize($n->DATAF);
        unlink($o->PATHF);
        $rb = $db->prepare("DELETE FROM tbl_trash WHERE ID=?");
        $rb->execute([$trashId]);
        $ra = $db->prepare("DELETE FROM tbl_files_tags WHERE IDF=?");
        $ra->execute([$o->ID]);
        $rc = $db->prepare("DELETE FROM tbl_files_version WHERE IDF=?");
        $rc->execute([$trashId]);
    }

    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
    

}
?>