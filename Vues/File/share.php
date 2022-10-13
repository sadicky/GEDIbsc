<?php $title = "Share";
include 'Public/Includes/head.php'; ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include 'Public/Includes/topbar2.php'; ?>
        <!-- end Topbar -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">GedIBSC</a></li>
                                        <li class="breadcrumb-item active"><?= $title ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?= 'File' ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">

                                <p class="text-right">
                                    <a href="<?= $file->URLF ?>" target="_blank" class="btn btn-primary"><i class="fe-eye"></i> View</a>
                                    <a  href="index.php?p=download&file=<?= $file->URLF?>" target="blank" class="btn btn-primary"><i class="fe-download"></i> Download</a>
                                </p>
                                
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Details of:<?= $file->NAMEVIEW ?> </h4>

                                    <ul class="nav nav-tabs nav-bordered nav-justified">
                                        <li class="nav-item">
                                            <a href="#gI" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                General Info
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#vd" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Views Details
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="gI">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Document Current Version <span class="badge badge-danger badge-pill"><?=$file->VERSION?></h5>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                <label for="">Document Name</label><br>
                                                                <?= $file->NAMEF ?><br><br>
                                                                <label for="">Version</label> <br>
                                                                <?= $file->VERSION ?><br><br>
                                                                <label for="">Created On</label> <br>
                                                                <?= $file->CREATEDAT ?><br><br>
                                                                <label for="">Created by</label><br>
                                                                <?= $file->IDU ?><br><br>
                                                                <label for="">Description</label> <br>
                                                                <?= $file->DESCRIPTIONF ?><br><br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Meta Data</h5>
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <label>Size</label> <br>
                                                                <?php
                                                                echo $getFile->formatSizeUnits($file->SIZEF);
                                                                ?>
                                                                <br><br>
                                                                <label for="">Keyword</label><br>
                                                                <?= $file->KEYWORDS ?><br><br>
                                                                <label for="">Category</label> <br>
                                                                <?php if ($file->IDC == 0) {
                                                                    $category = "Non classé";
                                                                    echo $category;
                                                                } else {
                                                                    $category = $getCategory->getCatId($file->IDC)[0][1];
                                                                    echo $category;
                                                                } ?>
                                                                <br><br>
                                                                <label for="">Folder</label><br>
                                                                <?php if ($file->IDD == 0) {
                                                                    $category = "Non classé";
                                                                    echo $category;
                                                                } else {
                                                                    $category = $getFolder->getFolderId($file->IDD)[0][1];
                                                                    echo $category;
                                                                } ?>
                                                                <br><br>
                                                                <label for="">Original Author</label> <br>
                                                                <?= "SADICKY" ?><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="vd">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                </div> <!-- end col -->


                            </div>
                            <!-- end row -->

                        </div>

                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
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
<script type="text/javascript" src="Public/JS/Tag/tag.js"></script>

</html>