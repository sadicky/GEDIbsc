<?php $title = "Users";
$l = false;
$c = false;
$m = false;
$s = false; 
if ($d = $user->verifierPermissionDunePage('users',$_SESSION['ID_user'])->fetch()) 
{
    if ($d['L'] == 1) 
    {
        $l = true;
    }
    if ($d['C'] == 1) 
    {
        $c = true;
    }
    if ($d['M'] == 1) 
    {
        $m = true;
    }
    if ($d['S'] == 1) 
    {
        $s = true;
    }
}
include 'Public/Includes/head.php'; 

?>

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
                           <!-- variable session qui stock l'id de user -->
                       
                        <div class="col-12">
                                <p class="pull-righ">  

				                <button type="button" data-toggle="modal" data-target="#users"  class="btn btn-sm btn-primary pull-right"><i class="fas fa-plus"></i> <b>New user</b></button>

				                <a href="<?= WEBROOT;?>voir_user"  class="btn btn-sm btn-primary pull-right"><i class="fa fa-eye"></i> <b>voir user</b></a>

                                     <a href="<?= WEBROOT;?>voir_profil"  class="btn btn-sm btn-primary pull-right"><i class="fa fa-eye"></i> <b>voir profil</b></a>


				                

				                </p>
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>New user profils</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                     <div class="row">
                     <form class="form-horizontal" method="post" id="formProfil" >
                        <div class="col-6">
                            <input type="text" class="form-control" name="profile" id="profile" placeholder="Nom du nouveau profil">

                        </div>
                        <div class="col-6 ">                            
                        	<button type="submit" style="background-color: rgb(28,128,209);" class="btn d-none d-lg-block m-l-15 font-light text-white valider"><i class="fa fa-check-circle"></i> Valider
                            </button>
                        </div>
                    </form>
                        </div><br>
                

                    
                        <form class="form-horizontal" action="<?= WEBROOT?>setprofiluser" method="post" id="form-profil-user" onsubmit="setProfilUser()">
                                <div class="row">
                        <div class="col-lg-6 form-group">
                            
                            <select class="form-control select2" name="profile_name" id="profile_name">
                            <option>veuillez selectionner un profil </option>
                                <?php foreach($profil as $data)
                                 { 
                                ?>
                                <option value="<?= $data->profil_id?>" ><?=$data->profil_name?></option>
                                <?php
                                 }
                                ?>
                                  </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background-color: rgb(28,128,209);" class="text-white">
                                        <tr>
                                            <th>Pages</th>
                                            <th>L</th>
                                            <th>C</th>
                                            <th>M</th>
                                            <th>S</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot style="background-color: rgb(28,128,209);" class="text-white">
                                        <tr>
                                            <th>Pages</th>
                                            <th>L</th>
                                            <th>C</th>
                                            <th>M</th>
                                            <th>S</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="reponse">
                                        <?php
                                        $page = ['documents','categorie','users','files','tags','trash','filter','rapport','dashboard','logs','backup','user online','settings','group user','file scan','file from mail'];
                                        $_SESSION['page'] = $page;
                                        for ($i=0; $i < count($page); $i++) 
                                        { 
                                        ?>
                                            <tr>
                                                <td class="font-bold"><?= $page[$i]?></td>
                                                <td><input type="checkbox" name="l<?=$i?>" id="l<?=$i?>"></td>
                                                <td><input type="checkbox" name="c<?=$i?>" id="c<?=$i?>"></td>
                                                <td><input type="checkbox" name="m<?=$i?>" id="m<?=$i?>"></td>
                                                <td><input type="checkbox" name="s<?=$i?>" id="s<?=$i?>"></td>
                                                <td><label class="btn">
                                                    <input type="checkbox" id="<?=$i?>" onclick="cocherUneLigneOnCreerProfilUser(this.id)"> Cocher cette ligne
                                                </label></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-2 offset-5">
                                        <?php
                                       // if ($c) 
                                        //{?>
                                            <button type="submit" style="background-color: rgb(28,128,209);" class="btn d-none d-lg-block m-l-15 font-light text-white"><i class="fa fa-check-circle"></i> Valider</button>
                                        <?php
                                      //  }
                                        ?>
                                    </div>
                                 </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    
                            

                        </div>

                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php

        include_once'Public/Modals/Users/add_user.php';


        ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
</html>