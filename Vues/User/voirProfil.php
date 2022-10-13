<?php $title = "Voir profil";
include 'Public/Includes/head.php';
$l = false;
$c = false; 
$m = false;
$s = false; 
//verification de permission de la page
if ($d = $user->verifierPermissionDunePage('users',$_SESSION['ID_user'])->fetch()) 
{
    if ($d['M'] == 1) 
    {
        $m = true;
    }
} 
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

                    <div class="container-fluid">
                    <div class="col-md-5 align-self-center">
        <a href="javascript:history.back()" class="btn btn-outline-primary waves-effect waves-light" type="button" ><i class="fa fa-fast-backward"></i></a><span class="btn-label"></span></button>
    </div><div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="header-title">Affichage de profil</h4>
                            <p class="sub-header">
                                <div class="col-lg-6 form-group">
                                <form class="form-horizontal" method="post" id="form-profil-user" >
                                     <input type="text" id="userName"name="userName"  value="<?=$_SESSION['userName']?>" hidden>
                            <input type="text" id="droit" value="<?=$m?>" hidden>
                            <select  onchange="getprofilPermission($(this).val())" name="profile_name" id="profile_name"  class="form-control select2">
                                <option value="">-- Choisir un profil --</option>
                                <?php
                                foreach ($user->getAllProfilUser() as  $value)
                                {
                                ?>
                                    <option value="<?php echo $value->profil_id?>"><?php echo $value->profil_name?></option>
                                <?php   
                                } 
                                ?>
                            </select>

                        </div>
                        <!--div class="col-lg-6 ">
                            <a href="<= WEBROOT;?>modification" style="background-color: rgb(28,128,209);" class="btn d-none d-lg-block m-l-15 font-light text-white"><i class="fa fa-eye"></i> Suppression et modification de profil</a>
                        </div-->
                                        </p>

                                        <div class="table-responsive">
    
                                        <table class="table mb-0 table-sm">
                                            <thead>
                                            <tr>
                                               
                                            <th>Pages</th>
                                            <th>Lecture</th>
                                            <th>Creation</th>
                                            <th>Modification</th>
                                            <th>Suppression</th>
                                            <th>Action</th>
                                        
                                            </tr>
                                            </thead>
                                            <tbody id="reponse">
                                             <tr>
                                                <th>aucune</th>
                                               
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                </div> <!-- end content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include_once'Public/Modals/Users/add_user.php';
              include_once 'Public/Modals/Users/edit_user.php'; 
            //  include_once'Public/Modals/Users/getProfil.php';
              ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
</html>