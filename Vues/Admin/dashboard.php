<?php $title = "Dashboard";
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
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box tilebox-one">
                                <i class="fe-briefcase float-right"></i>
                                <h5 class="text-muted text-uppercase mb-3 mt-0">folders</h5>
                                <h3 class="mb-3" data-plugin="counterup"><?=count($getF)?></h3>
                           </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card-box tilebox-one">
                                <i class="fe-folder float-right"></i>
                                <h5 class="text-muted text-uppercase mb-3 mt-0">Files</h5>
                                <h3 class="mb-3"><span data-plugin="counterup"><?=count($files)?></span></h3>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card-box tilebox-one">
                                <i class="fe-trash float-right"></i>
                                <h5 class="text-muted text-uppercase mb-3 mt-0">Trash</h5>
                                <h3 class="mb-3"><span data-plugin="counterup"><?=count($list)?></span></h3>
                             </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card-box tilebox-one">
                                <i class="fe-users float-right"></i>
                                <h5 class="text-muted text-uppercase mb-3 mt-0">Users</h5>
                                <h3 class="mb-3" data-plugin="counterup">4</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
    
                                <div class="col-md-4">
                                    <div class="card">
                                        <h4 class="card-header text-center">
                                            UPLOADS
                                        </h4>
                                        <div class="card-body">
                                                <p class="text-center">
                                                    <a href="<?=WEBROOT?>files" class="btn btn-primary"><i class="far fa-file"></i> Documents</a>
                                                    <a href="<?=WEBROOT?>foldercreate" class="btn btn-primary"><i class="far fa-folder-open"></i> Folders</a>
                                                </p>
                                              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <h4 class="card-header text-center">
                                            DOCUMENTS
                                        </h4>
                                        <div class="card-body">
                                                <p class="text-center">
                                                    <a href="<?=WEBROOT?>files" class="btn btn-primary"><i class="fas fa-list"></i> Lists</a>
                                                    <a href="<?=WEBROOT?>search" class="btn btn-primary"><i class="fe-search"></i> Search</a>
                                                    <a href="<?=WEBROOT?>" class="btn btn-primary"><i class="fe-trash"></i> Trash</a>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <h4 class="card-header text-center">
                                            MANAGE FOLDERS
                                        </h4>
                                        <div class="card-body">
                                                <p class="text-center">
                                                    <a href="<?=WEBROOT?>foldercreate" class="btn btn-primary"><i class="fa fa-folder-plus"></i> Create</a>
                                                    <a href="<?=WEBROOT?>folderall"  class="btn btn-primary"><i class="fe-eye"></i> View</a>
                                                </p>                                                    
                                        </div>
                                    </div>
                                </div>

                            </div>

                    <!-- end row -->

                </div> <!-- end container-fluid -->

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

</html>