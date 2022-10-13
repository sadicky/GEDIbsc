<?php
 require_once('../../../Models/user.class.php'); 

$user = new Users();
//$historique = new Historiques();
//$userName = $_POST['userName'];
var_dump('Aucun donné dans post => '.$_POST);die();
if ($user->update_permission($_POST['idpermission'],$_POST['lire'],$_POST['creer'],$_POST['modifier'],$_POST['supprimer'],$_POST['page_accept'])) 
{                 
   //if ($historique->setHistoriqueAction($_GET['idpermission'],'droitdacces',$_GET['userName'],date('Y-m-d'),'modifier',$_GET['profil_id']))
   //{
   //require_once('rep.php');
   $i = 0;
   foreach ($user->affiche_permission_par_profil($_POST['profil_id']) as $value) 
   { 
   $i++;
   ?>
   <tr>
       <td><?php echo $value->page?></td>
   <?php 
   if ($value->L == 1) 
   {?>
     <td><label class="text-success"><i class="fa fa-check "></i></label></td>
       
   <?php
   }
   else
   {?>
     <td><label class="text-danger"><i class="fas fa-times "></i></label></td>
   <?php 
   } 
   if ($value->C == 1) 
   {?>
     <td><label class="text-success"><i class="fa fa-check "></i></label> </td>
       
   <?php
   }
   else
   {?>
     <td><label class="text-danger"><i class="fas fa-times "></i></label></td>
   <?php 
   }
   if ($value->M == 1) 
   {?>
     <td><label class="text-success"><i class="fa fa-check "></i></label></td>
   <?php
   }
   else
   {?>
     <td><label class="text-danger"><i class="fas fa-times "></i></label></td>
   <?php 
   } 
   if ($value->S == 1) 
   {?>
     <td><label class="text-success"><i class="fa fa-check "></i></label></td>    
   <?php
   }
   else
   {?>
     <td><label class="text-danger"><i class="fas fa-times "></i></label></td>
   <?php 
   }
   ?>
     <td>
   <?php
   if ($_GET['droit']) 
   {?>
       <a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-lgs<?=$i?>" data-original-title="Editer"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
       <!-- sample modal content -->
   <div class="modal fade bs-example-modal-lgs<?= $i?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
     <div class="modal-dialog modal-lgs">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="myLargeModalLabel">Modification des droits le profil</h4>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <form class="form-horizontal p-t-20" method="post" id="updatepProfil">
            <input type="text" id="userName" name="userName" value="<?=$userName?>" hidden>
         <div class="modal-body">
             <div class="row">
               <div class="col-lg-6 col-md-6">
                 <div class="form-group row">
                   <label for="exampleInputuname3" class="col-sm-3 col-lg-4 control-label">Lire</label>
                   <div class="col-sm-9 col-lg-5">
                   
                       <select class="form-control" name="lire<?=$i?>" id="lire<?=$i?>">
                         <?php
                         if ($value->L == 0) 
                         {
                         ?>
                           <option value="<?=$value->L?>" selected>Non</option>
                           <option value="1">Oui</option>
                         <?php
                         }
                         else
                         {
                         ?>
                           <option selected="" value="<?=$value->L?>">Oui</option>
                           <option value="0">Non</option>
                         <?php
                         }
                         ?>
                       </select>
                   </div>
                 </div>
               </div>
               <div class="col-md-6 col-lg-6">
                 <div class="form-group row">
                   <label for="exampleInputuname3" class="col-sm-3 col-lg-5 control-label">Creer</label>
                   <div class="col-sm-9 col-lg-5">
                       <!--<input type="number" id="creer<?=$i?>" value="<?=$value->C?>" class="form-control">-->
                       <select class="form-control" id="creer<?=$i?>" name="creer<?=$i?>">
                         <?php
                         if ($value->C == 0) 
                         {
                         ?>
                           <option value="<?=$value->C?>" selected>Non</option>
                           <option value="1">Oui</option>
                         <?php
                         }
                         else
                         {
                         ?>
                           <option selected="" value="<?=$value->C?>">Oui</option>
                           <option value="0">Non</option>
                         <?php
                         }
                         ?>
                       </select>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6 col-lg-6">
                 <div class="form-group row">
                   <label for="exampleInputuname3" class="col-sm-3 col-lg-4 control-label">Modifier</label>
                   <div class="col-sm-9 col-lg-5">
                   
                       <select class="form-control" id="modifier<?=$i?>" name="modifier<?=$i?>">
                         <?php
                         if ($value->M == 0) 
                         {
                         ?>
                           <option value="<?=$value->M?>" selected>Non</option>
                           <option value="1">Oui</option>
                         <?php
                         }
                         else
                         {
                         ?>
                           <option selected="" value="<?=$value->M?>">Oui</option>
                           <option value="0">Non</option>
                         <?php
                         }
                         ?>
                       </select>
                   </div>
                 </div>
               </div>
               <div class="col-md-6 col-lg-6">
                 <div class="form-group row">
                   <label for="exampleInputuname3" class="col-sm-3 col-lg-5 control-label">Supprimer</label>
                   <div class="col-sm-9 col-lg-5"> 
                       <select class="form-control" id="supprimer<?=$i?>" name="supprimer<?=$i?>">
                         <?php
                         if ($value->S == 0) 
                         {
                         ?>
                           <option value="<?=$value->S?>" selected>Non</option>
                           <option value="1">Oui</option>
                         <?php
                         }
                         else
                         {
                         ?>
                           <option selected="" value="<?=$value->S?>">Oui</option>
                           <option value="0">Non</option>
                         <?php
                         }
                         ?>
                       </select>
                       <input type="text" name="idpermission<?=$i?>" id="idpermission<?=$i?>" value="<?=$value->id?>" hidden>
                       <input type="text" id="i<?=$i?>" name="i<?=$i?>" value="<?=$i?>" hidden>
                   </div>
                 </div>
               </div>
             </div>
         </div>
         <div class="modal-footer">
           <span id="msg<?=$i?>"></span>
            <!--button type="submit" name="updatepProfil" class="btn btn-primary text-white modifier" data-dismiss="modal">Modifier
           </button-->
            <button type="button" class="btn btn-primary text-white" onclick="update_permission($('#idpermission<?=$i?>').val(),$('#lire<?=$i?>').val(),$('#creer<?=$i?>').val(),$('#modifier<?=$i?>').val(),$('#supprimer<?=$i?>').val(),$('#i<?=$i?>').val())" data-dismiss="modal">Modifier
           </button>
           <button type="button" class="btn btn-danger waves-effect text-left " data-dismiss="modal">Fermer</button>
         </div>
         </form>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <?php
   }
   ?>
     </td>
   </tr>
   <?php
   }
  //}
}
?>

