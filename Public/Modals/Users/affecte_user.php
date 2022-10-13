
<div id="affectUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign user </h4>
      </div>
      <div class="modal-body">
       
         <form class="form-horizontal p-t-0" id="affectForm" action="<?=WEBROOT?>affecteUser" method="post">
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-lg-10 col-md-10">
                                        <div class="form-group row">
                                          <label for="exampleInputuname3" class="col-sm-3 control-label">Group Name *</label>
                                          <div class="col-sm-9">
                                            <select class="form-control" id="group" name="group">
                                                <?php 
                                                foreach ($groupUser as $data)
                                    
                                                {?>
                                                    <option value="<?php echo $data->ID_group?>"><?php echo $data->groupName?>
                                                    </option>
                                                <?php
                                                }?>
                                            </select>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                         
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label">Date versement</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="dateAfect" id="dateAfect">
                                            <input type="text" id="auteur" name="auteur" value="<?=$_SESSION['ID_user']?>" hidden>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <label for="exampleInputuname3" class="col-sm-3 control-label" class="btn"> User to affect group </label>
                                    <div class="col-sm-9" id="checkbox-parent">
                                         <?php 
                                        $i = 0;
                                        foreach($user->affect_users() as $value)
                                        {
                                            $i++;
                                        ?>
                                         <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="<?=$value->ID_user?>" name="affecte[<?=$i?>]" id="affecte<?=$i?>">
                                            <label class="custom-control-label" for="affecte<?=$i?>"><?= $value->ID_user.'_'.$value->nom_user.'_'.$value->profil_name?></label>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <span id="msg"></span>
                            
                            <button type="submit" class="btn btn-primary text-white"> <i class="fa fa-check"></i>Ajouter au group</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Fermer</button>
                        </div>
                </form>
      </div>
    </div>
  </div>
</div