<?php $title = "All Folders";
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
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <h3 class="box-title">Folder Tree</h3>
                                         <div id="folder_jstree"></div>
                                    </div>
                                    <div class="col-sm-2 col-xs-12"></div>
                                    <div class="col-sm-1 col-xs-12">
                                    </div>
                                    <div class="col-sm-3 col-xs-12"></div>
                                </div>
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
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>


<!--Pour les javascript-->

<script type="text/javascript" src="Public/JS/Folder/folder.js"></script>
</html>