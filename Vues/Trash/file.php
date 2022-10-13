<?php $title = $file->NAMEVIEW;
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
                                <h4 class="page-title"><?= 'File' ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <p class="text-right">
                                <a href="files" class="btn btn-primary"><i class="fe-arrow-left"></i> All Documents</a>
                            </p>
                            <div class="card-box table-responsive">
                                <div class="message"></div>
                                <div class="error"></div>

                                <p class="text-right">
                                    <button class="btn btn-primary"><i class="fe-eye"></i> View</button>
                                    <button class="btn btn-primary"><i class="fe-paperclip"></i> Tagging</button>
                                    <button class="btn btn-primary"><i class="fe-navigation"></i> Share with users</button>
                                    <button class="btn btn-danger p-l"><i class="fe-trash-2"></i> Delete</button>
                                </p>


                                <div class="card-box">
                                    <h4 class="header-title mb-4">Details of: </h4>

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
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Document Current Version</h5>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                <label for="">Document Name</label><br>
                                                                    <?=$file->NAMEF?><br><br>
                                                                <label for="">Version</label> <br>
                                                                    <?=$file->VERSION?><br><br>
                                                                <label for="">Created On</label> <br>
                                                                    <?=$file->CREATEDAT?><br><br>
                                                                <label for="">Created by</label><br>
                                                                    <?=$file->IDU?><br><br>
                                                                <label for="">Description</label> <br>
                                                                    <?=$file->DESCRIPTIONF?><br><br>
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
                                                                    <?=$file->SIZEF?><br><br>
                                                                <label for="">Keyword</label><br>
                                                                    <?=$file->KEYWORDS?><br><br>
                                                                <label for="">Category</label> <br>
                                                                <?php if($file->IDC==0){
                                                                        $category = "Non classé";
                                                                        echo $category;
                                                                    }else{
                                                                        $category = $getCategory->getCatId($file->IDC)[0][1];
                                                                        echo $category;
                                                                    }?>
                                                                    <br><br>
                                                                <label for="">Folder</label><br>
                                                                <?php if($file->IDD==0){
                                                                        $category = "Non classé";
                                                                        echo $category;
                                                                    }else{
                                                                        $category = $getFolder->getFolderId($file->IDD)[0][1];
                                                                        echo $category;
                                                                    }?>
                                                                    <br><br>
                                                                <label for="">Original Author</label> <br>
                                                                    <?=$file->DESCRIPTIONF?><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Version Control</h5>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                <button class="btn btn-primary"><i class="fe-download"></i> Download</button>
                                                                <button class="btn btn-primary"><i class="fe-upload"></i> Upload</button>
                                                                <button class="btn btn-primary"><i class="fe-corner-left-down"></i> Rollback</button>
                                                                <button class="btn btn-primary"><i class="fe-lock"></i> Lock</button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Edit</h5>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                <button class="btn btn-primary"><i class="fe-edit"></i> Edit</button>
                                                                <button class="btn btn-primary"><i class="fe-edit-1"></i> Rename</button>
                                                                <button class="btn btn-primary"><i class="fe-eye-off"></i> Hide</button>
                                                            </p>
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

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include_once 'Public/Modals/File/addfile.php';
        //   include_once 'Public/Modals/Category/editcat.php'; 
        ?>

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<!-- <script type="text/javascript" src="Public/JS/File/file.js"></script> -->

</html>