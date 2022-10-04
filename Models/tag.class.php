<?php
        require_once("connexion.php");

Class Tag
{
    public function createTag($name,$content){
        $db = getConnection();
        $r = $db->prepare("INSERT INTO tbl_tags SET TAG=?, DESCRIPTION=?");
        $r->execute([
            $name,
            $content
        ]);
    }
    public function updateTag($name,$content){
        $db = getConnection();
        $r = $db->prepare("UPDATE tbl_tags SET TAG=?, DESCRIPTION=?");
        $r->execute([
            $name,
            $content
        ]);
    }
    public function deleteTags($id){
        $db = getConnection();
        $r = $db->prepare("DELETE FROM tbl_tags WHERE ID=?");
        $r->execute([$id]);
    }
    public function getAllTags(){
        $db = getConnection();
        $r = $db->prepare("SELECT * FROM tbl_tags");
        $r->execute();
        return $r->fetchAll();
    }
    public function getTag($id){
        $db = getConnection();        
        $r = $db->prepare("SELECT * FROM tbl_tags WHERE ID=?");
        $r->execute([$id]);
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    public function getTagByName($name){
        $db = getConnection();        
        $r = $db->prepare("SELECT * FROM tbl_tags WHERE TAG=?");
        $r->execute([$name]);
        $result = $r->fetchAll();
        if(count($result)==0){
            $this->createTag($name, '');
        }
        $ra = $db->prepare("SELECT * FROM tbl_tags WHERE TAG=?");
        $ra->execute([$name]);
        return $ra->fetchAll()[0];
    }
    public function getTagByFile($id){
        $db = getConnection();  
        $r = $db->prepare("SELECT * FROM tbl_files_tags WHERE IDF=?");
        $r->execute([$id]);
        return $r->fetchAll();;
    }
    public function affectTag($idTag,$idFile){
        $db = getConnection();  
        $expression=$this->getTagByFile($idFile);
        $hasThisTag=false;
        foreach($expression as $t){
            if($idTag==$t->IDT){
                $hasThisTag=true;
            }
        }
        if(!$hasThisTag){
            $db = getConnection();  
            $r = $db->prepare("INSERT INTO tbl_files_tags SET IDF=?, IDT=?");
            $r->execute([
                $idFile,
                $idTag
            ]);
            
        } 
    }
    public function killTag($idt,$idf){
        $db = getConnection();  
        $r = $db->prepare("DELETE FROM tbl_files_tags WHERE IDT=? AND IDF=?");
        $r->execute(array($idt,$idf));
    }
}
?>