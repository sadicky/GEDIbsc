              <div id="userUpdate" class="modal fade" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                   <div class="modal-content"> 
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit User</h4>
                      </div>

                      <div class="modal-body">          
                            <form method="post" id='form_update_user'  enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">Nom<span class="text-danger">*</span></label>
                                                 <div class="col-7">
                                                    <input type="text"  class="form-control" id="nom" name="nom" placeholder="Nom user">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">Prenom<span class="text-danger"></span></label>
                                                <div class="col-7">
                                                    <input type="text" id="prenom" class="form-control"name="prenom" id="inputEmail3" placeholder="prenom">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">Adresse mail<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input type="email"  class="form-control"name ="mail" id="mail" placeholder="Email">
                                                </div>
                                            </div>
                                         
                                            <div class="form-group row">
                                                <div class="col-7">
                                                    <input type="hidden" name="date_add_user" id="date_add_user"value="<?=date('Y-m-d')?>" class="form-control"
                                                           >
                                                </div>
                                            </div>
                                            <input type="text" name="iduser" id="iduser" value="<?=$user->ID_user?>"hidden>
                                             <div class="form-group row mb-0">
                                                <div class="col-8 offset-4">
                                                    
                                                    <button type="submit" name="iduser" class="btn btn-primary btn-md update_user">
                                                        <i class='fas fa-edit'></i><strong>Editer</strong>
                                                    </button>

                                                    <button type="reset"
                                                            class="btn btn-light waves-effect ml-1" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                  </div>
                                </div>
                              </div>
                            </div>