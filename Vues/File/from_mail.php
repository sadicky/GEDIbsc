<?php $title = "From mail";
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
                     <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">

                            <!-- Right Sidebar -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <!-- Left sidebar -->
                                    <div class="inbox-leftbar">

                                        <a href="sendMail" class="btn btn-danger btn-block waves-effect waves-light">Compose</a>

                                        <div class="mail-list mt-3">
                                            <a href="#" class="list-group-item border-0 text-danger"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span class="badge badge-danger float-right ml-2">8</span></a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft<span class="badge badge-info float-right ml-2">32</span></a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                            <a href="#" class="list-group-item border-0"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                        </div>

                                    </div>
                                    <!-- End Left sidebar -->

                                    <div class="inbox-rightbar">

                                        <div role="toolbar">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                                <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                                <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <span class="dropdown-header">Move to</span>
                                                    <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                                    <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                                    <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                                    <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-label font-18 vertical-middle"></i>
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                                                    More
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                              
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h4>Hi Bro, How are you?</h4>

                                            <hr/>

                                            <div class="media mb-3 mt-1">
                                                    <?php
                                                 foreach ($user->image_user($_SESSION['ID_user']) as  $value) 
                                                {
                                                    ?>
                                                <img src="<?=WEBROOT?>image_profil/<?php echo $value->photo?>" class="d-flex mr-3 rounded-circle avatar-sm" width="200" />
                                                <?php
                                                }
                                            ?>
                                                    <div class="media-body">
                                                    <span class="float-right">07:23 AM</span>
                                                    <h5 class="m-0"><?php echo($_SESSION['userName']);?></h5>
                                                    <small class="text-muted">From: jonathan@domain.com</small>
                                                </div>
                                            </div>

                                     


                                            <h5> <i class="fas fa-paperclip mb-2"></i> Attachments <span>(2)</span> </h5>

                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <a href="#"> <img src="assets/images/attached-files/img-1.jpg" alt="attachment" class="img-thumbnail img-fluid"> </a>
                                                </div>
                                               
                                                <div class="col-sm-2">
                                                    <a href="#"> <img src="assets/images/attached-files/img-3.jpg" alt="attachment" class="img-thumbnail img-fluid"> </a>
                                                </div>
                                            </div>
                                        </div> <!-- card-box -->

                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div> <!-- end Col -->

                        </div><!-- End row -->
                        
                    </div> <!-- end container-fluid -->

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
<script type="text/javascript" src="Public/JS/File/file.js"></script>
</html>