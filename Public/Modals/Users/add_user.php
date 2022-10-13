                <div id="users" class="modal fade" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                   <div class="modal-content"> 
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add new User</h4>
                      </div>
                      <div class="modal-body">          
                            <form method="post" id='form_user'  enctype="multipart/form-data">

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
                                                <label for="inputEmail3" class="col-4 col-form-label">Profil<span class="text-danger"></span></label>
                                                <div class="col-7">
                                                   <select  class="col-12 form-control select2" name="profile" id="profile">
                                                    <option> Veiller choisir le profil</option>
                                                        <?php foreach($profil as $value )
                                                        { 
                                                            ?>
                                                        <option value="<?= $value->profil_id?>"><?= $value->profil_id.' '.$value->profil_name?></option>
                                                        <?php
                                                         }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> 
                                             
                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-4 col-form-label">Password<span class="text-danger">*</span></label>
                                                <div class="col-7">
                                                    <input  type="password" id="password" placeholder="Password" name="password" required class="form-control">
                                                </div>
                                            </div>
                                         
                                            <div class="form-group row">
                                                <div class="col-7">
                                                    <input type="hidden" name="date_add_user" id="date_add_user"value="<?=date('Y-m-d')?>" class="form-control"
                                                           >
                                                </div>
                                            </div>
                                             <div class="form-group row mb-0">
                                                <div class="col-8 offset-4">
                                                    
                                                    <button type="submit" name="save_user" id="save_user" class="btn btn-primary btn-md save_user">
                                                        <i class="fas fa-save"></i><strong> Register</strong>
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-dark waves-effect ml-1" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                  </div>
                                </div>
                              </div>
                            </div> 