<?php $title = "New Folder";
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
                                    <div class="col-sm-3 col-xs-12">
                                        <form method="post" id='formfolder' class="form">
                                            <h3 class="box-title">All folders</h3>
                                            <div class="form-group">
                                                <select name="idp" class="form-control select2" id="idp">
                                                    <option value="0">No Parent</option>
                                                    <?php foreach ($getF as $folder) : ?>
                                                        <option value="<?= $folder->ID ?>"><?= $folder->FOLDER ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>New Folder</label>
                                                <input class="form-control" type="text" name="folder" id="folder" placeholder='Add folder' autocomplete="off" required />
                                            </div>
                                            <button type="submit" name="validate" class="btn btn-primary btn-block btn-md validate"><i class="fas fa-save"></i> <strong> Save</strong> </button>
                                        </form>
                                    </div>
                                    <div class="col-sm-2 col-xs-12"></div>
                                    <div class="col-sm-3 col-xs-12">
                                        <h3 class="box-title">Folder Tree</h3>
                                         <div id="folder_jstree"></div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12"></div>
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