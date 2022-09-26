
<?php

//fetchNodedata.php

require_once('../../../Models/connexion.php');
$idp = 0;
$connect = getConnection();
$query = "SELECT * FROM tbl_folders";
$folders_arr = array();

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{  
     $parentid = $row['IDP'];
    if($parentid == '0') $parentid = "#";

    $selected = false;$opened = false;
    if($row['ID'] == 2){
        $selected = true;$opened = true;
    }
    $folders_arr[] = array(
        "id"=>$row['ID'],
        "parent"=>$parentid,
        "text"=>$row['FOLDER'],
        "state" => array(
            "selected" => $selected,
            "opened"=>$opened
        ) 
    );
}

echo json_encode(array_values($folders_arr));
?>
