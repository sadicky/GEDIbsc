<?php $title = "User assign by group";
include 'Public/Includes/head.php';
$l = false;
$c = false; 
$m = false;
$s = false; 
//verification de permission de la page
if ($d = $user->verifierPermissionDunePage('backup',$_SESSION['ID_user'])->fetch()) 
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
                            <!--h4 class="header-title">Affichage de profil</h4-->

                            <p class="sub-header">
                              
                          <div class="row">
                        <div class="col-12">
                                <p class="pull-righ">  
                                     <!--name="backupnow"-->
                                     <!--a href="<?= WEBROOT;?>backup"  class="btn btn-sm btn-primary pull-right"><i class="fe-upload-cloud"></i> <b>CREATE BACKUP</b></a-->
                                       <!--button type="button" data-toggle="modal" data-target="#modal_backup"  class="btn btn-sm btn-primary pull-right"><i class="fe-upload-cloud"></i> <b>New backup</b></button-->
                                     
                                   
                                </p>
                                    <div class="form-wrap">
                                            <form action="<?= WEBROOT;?>getBackup" method="post" id="">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" >Host</label>
                                                    <input type="text" class="form-control" placeholder="Enter Server Name EX: Localhost" name="server" id="server" required="" autocomplete="on">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" >Database Username</label>
                                                    <input type="text" class="form-control" placeholder="Enter Database Username EX: root" name="username" id="username" required="" autocomplete="on">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" >Database Password</label>
                                                    <input type="password" class="form-control" placeholder="Enter Database Password" name="password" id="password" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10">Database Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Database Name" name="dbname" id="dbname" required="" autocomplete="on">
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" name="backupnow" class="btn btn-primary">Initiate Backup</button>
                                                </div>
                                            </form>
                                        </div>



                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>All Group</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <!--table class="table table-centered mb-0" id="btn-editable"-->
                                    <thead>
                                        <tr>
                                            
                                            <th>Location</th>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Last modified</th>
                                            <th></th><th></th>
                                        </tr>
                                     </thead>
 
                                    <tbody>
                                        <!-- 
                                        <php foreach ($assignUser as $user):?-->
                                        <tr>
                                            <td>http/127.0.0.1:8080/2022-10-05/1.zip</td>
                                           <td>2022-10-05/1.zip</td>
                                           <td>3.39 MB</td>
                                           <td>2022-10-05 14h 25</td>
                                           
                                            <td> 
                                                <button type='button' data-toggle="modal" name='userUpdate' id='<?= $user->ID_user?>' class='btn btn-block btn-xs btn-primary view_data' data-target="#userUpdate" title='Modifier'><i class=' mdi mdi-download'></i></button>
                                            </td>
                                            <td>
                                                <button type='button' data-toggle="modal" name='userUpdate' id='<?= $user->ID_user?>' class='btn btn-block btn-xs btn-danger view_data' data-target="#userUpdate" title='Modifier'><i class='fe-trash-2'></i></button>
                                               
                                            </td>
                                        </tr>
                                        <!--php endforeach-->
                                
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

        <?php ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
</html>