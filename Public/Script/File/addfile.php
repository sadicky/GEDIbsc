<?php

require_once('../../../Models/file.class.php');
$fileUpl = new File();
// var_dump($_SERVER);die();
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'fileUpload') {
    $m="";
    if(isset($_POST['action'])){
        if($_POST['action']=="fileUpload"){
            $table=$_FILES;
            $user=2;
            foreach ($table['fichier']['name'] as $key => $value) {
                $t['fichier']['name']=$table['fichier']['name'][$key];
                $t['fichier']['type']=$table['fichier']['type'][$key];
                $t['fichier']['tmp_name']=$table['fichier']['tmp_name'][$key];
                $t['fichier']['error']=$table['fichier']['error'][$key];
                $t['fichier']['size']=$table['fichier']['size'][$key];
                if($_POST['name']==""){
                    $nameView="";
                }else{
                    if($key=="0"){
                        $nameView=$_POST['name'];
                    }else{
                        $nameView=$_POST['name']."_".$key;
                    }
                }
                $add =$fileUpl->copyFile($t,$nameView,$_POST['idp'],$_POST['idc'],$_POST['desc'],$user);
              

            }
        }
        // if($_POST['action']=="dropFile"){
        //     $trash->moveToTrash($_POST['fileId']);
        // }
    }
  }
  
}
