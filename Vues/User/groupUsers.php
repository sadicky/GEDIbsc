 <?php $title = "Group Users";
include 'Public/Includes/head.php';
include'Public/Modals/Users/affecte_user.php';


$l = false;
$c = false; 
$m = false;
$s = false; 
//verification de permission de la page
if ($d = $user->verifierPermissionDunePage('group user',$_SESSION['ID_user'])->fetch()) 
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
        <?php include 'Public/Includes/topbar.php'; 
        include'Public/Modals/Users/updateGroup.php';?>
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
                            <!--h4 class="header-title">Affichage de profil</h4-->
                            <p class="sub-header">
                              
                          <div class="row">
                        <div class="col-12">
                            <p class="pull-righ">  
                                <button type="button" data-toggle="modal" data-target="#groupUser"  class="btn btn-sm btn-primary pull-right"><i class="fas fa-plus"></i> <b>New group</b></button>

                                 <button type="button" data-toggle="modal" data-target="#affectUser"  class="btn btn-sm btn-success pull-right"><i class="fas fa-plus"></i> <b>Assign a user to the group</b></button>
                                    
                                    <a href="<?= WEBROOT;?>group_user"  class="btn btn-sm btn-dark pull-right"><i class="fa fa-eye"></i> <b>show user assign by group</b></a>
                                </p>
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>All Group</b></h4>
                                <!--table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"-->
                                <table class="table table-centered mb-0" id="btn-editable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name group</th>
                                        <th>Actions</th>
                                    </tr>
                                 </thead>

                                <tbody>
                                    <!-- Affichage de toutes les catégories -->
                                    <?php $i=0;
                                    foreach ($groupUser as $data)
                                    {
                                        $i++;
                                        ?>
                                    <tr>
                                        <td><?=$data->ID_group?></td>
                                        <td><?=$data->groupName?></td>
                                        
                                    <td> 
                                         <?php
                                       // if ($c) 
                                       // {?>
                            <button type='button' data-toggle="modal" id="<?=$data->ID_group?>" class='btn btn-block btn-xs btn-primary view_data' data-target="#editgroup" title='Modifier'><i class='fas fa-edit'></i></button> <?php
                                     // }
                                        ?>   
                                            </td>
                                    </tr>
                                    <?php }?>
                            
                            </table>
                        </div>
                            <!-- end row -->

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
        include_once'Public/Modals/Users/add_groupUser.php';

        ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
</html>