<?php $title = "My profil";
include 'Public/Includes/head.php'; ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include 'Public/Includes/topbar.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'Public/Includes/menu.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">GedIBSC</a></li>
                                        <li class="breadcrumb-item active"><?= $title ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?= $title ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                             <div class="row">
                            
                                     <div class="col-md-6 col-lg-3">
    
                                    <!-- Simple card -->
                                    <div class="card">
                                       
                                         <?php
                                            foreach ($user->image_user($_SESSION['ID_user']) as  $value) 
                                                {?>
                                                <img src="<?=WEBROOT?>image_profil/<?php echo $value->photo?>" class="card-img-top img-fluid" width="200" />
                                                <?php
                                            }
                                            ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $title ?></h5>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">photo</button>
                                            
                                        </div>
                                    </div>
                                     <!-- sample modal content -->
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Upload a picture</h4>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="col-12">
                                                    <form class="form-horizontal p-t-20" enctype="multipart/form-data" action="<?=WEBROOT?>photoprofil" method="POST">
                                                  <div class="form-group">
                                                    <label>Picture</label>
                                                    <input type="text" class="form-control" id="idutilisateur" name="idutilisateur" value="<?php echo $_SESSION['ID_user']?>"hidden>
                                                    <input type="file"  name="photo" id="photo"  class="filestyle" id="filestyleicon" required multiple>
                                                     
                                                  </div>
                                                </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="file" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
    
                                </div><!-- end col -->
                            <div class="col-md-8">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">account details </h4>

                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                    
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#edit_password" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Password
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                       
                                        <div class="tab-pane show active" id="profile1">
                                            <form method="post" id='form_update_user'  enctype="multipart/form-data">
                                                <?php foreach ($user->afficheprofilUser($_SESSION['ID_user']) as $value) 
                                                  {
                                                ?>
                                                <div class="row">
                                                 <div class="col-lg-6 form-group">Nom </div>
                                                    <div class="col-lg-6 form-group">
                                                        <input type="text" id ="iduser" name="iduser" value="<?php echo $_SESSION['ID_user'];?>"hidden>
                                                         <input type="text" id="nom" name="nom" value="<?php echo $value->nom_user;?>" class="form-control form-control-line">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-lg-6 form-group">Prenom </div>
                                                    <div class="col-lg-6 form-group">
                                                         <input type="text" id="prenom" name="prenom" value="<?php echo $value->prenom;?>" class="form-control form-control-line">
                                                        
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                 <div class="col-lg-6 form-group">Profil name</div>
                                                    <div class="col-lg-6 form-group">
                                                       
                                                         <input type="text" id="profil"  value="<?php echo $value->profil_name;?>" class="form-control form-control-line"disabled>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-lg-6 form-group">Mail </div>
                                                    <div class="col-lg-6 form-group">
                                                       
                                                         <input type="text" name="mail" id="mail" value="<?php echo $value->adress_mail;?>" class="form-control form-control-line">
                                                        
                                                    </div>
                                                </div>
                                                 <div class="modal-footer">
                                                    <button type="submit" name="iduser" class="btn btn-primary btn-md update_user">
                                                        <i class='fas fa-edit'></i><strong>Change</strong>
                                                    </button>
                                                </div>
                                             
                                                <?php
                                                 }
                                                 ?>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="edit_password">
                                             <div class="row">
                                                 <div class="col-lg-6 form-group">New password </div>
                                                    <div class="col-lg-6 form-group">
                                                        <input type="text" class="form-control custom-select" id="nomss" value="<?= $_SESSION['userName']?>" hidden>
                                                         <input type="text" id="nouveaupassword" name="nouveaupassword"  class="form-control form-control-line">
                                                        
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                 <div class="col-lg-6 form-group">Confirm password </div>
                                                    <div class="col-lg-6 form-group">
                                                         <input type="text" id="confirmer" name="confirmer"  class="form-control form-control-line">
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" name="iduser" class="btn btn-primary btn-md update_user"onclick="changempmot_de_passe($('#nomss').val(),$('#nouveaupassword').val(),$('#confirmer').val())">
                                                        <i class='fas fa-edit'></i><strong>Change</strong>
                                                    </button>
                                                </div>
                                         
                                        </div>
                                     
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                      </div> <!-- end content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
</html>