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
                            <p class="text-right">
                                <a href="files" class="btn btn-primary"><i class="fe-arrow-left"></i> All Documents</a>
                            </p>
                            <div class="card-box table-responsive">
                                <ul>
                                    <?php foreach ($tagsList as $vtags) : ?>
                                        <li>
                                            <form class="form-inline" id="formtagdel" method="post">
                                                <?= $getT->getTag($vtags['IDT'])[0]->TAG ?>
                                                <input type="hidden" name="idf" id="idf" value="<?= $id ?>" />
                                                <input type="submit" id="<?= $vtags['IDT'] ?>" style="color:red;" class="btn btn-link deletetag" value="X" />
                                            </form>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <form class="form-inline" method="post" id="formtag">
                                    <input type="hidden" name="id" value="<?= $id; ?>" />
                                    <input type="text" class="form-control" name="tag" placeholder="Nom du tag" list="tags" />
                                    <datalist id="tags">
                                        <?php foreach ($tags as $ve) : ?>
                                            <option value="<?= $ve['TAG']; ?>">
                                            <?php endforeach; ?>
                                    </datalist>
                                    <input type="submit" class="btn btn-success validatetag" value="+" />

                                </form>

                                <p class="text-right">
                                    <a href="<?= $file->URLF ?>" target="_blank" class="btn btn-primary"><i class="fe-eye"></i> View</a>
                                    <button class="btn btn-primary" id="share"><i class="fe-navigation"></i> Share with users</button>
                                    <button id="<?= $file->ID ?>" class="btn btn-danger p-l delete"><i class="fe-trash-2"></i> Delete</button>
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
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Version Control</h5>
                                                        <div class="card-body">
                                                            <p class="card-text" align="center">
                                                            <?php //print_r(json_encode($getVersion));?>
                                                            <div class="btn-group mb-2">
                                                                <a href="<?=$file->URLF?>" target="blank" class="btn btn-primary"><i class="fe-download"></i> Download</a>
                                                                <button type="button" class="btn btn-primary dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> Versions <span class="badge badge-danger badge-pill"><?=count($getVersion)?></span> <i class="mdi mdi-chevron-down"></i> </button>
                                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                    <?php foreach($getVersion as $version):?>
                                                                    <a class="dropdown-item restorev" id='<?= $version->ID?>'  href="#">Version <?=$version->VERSION?></a>
                                                                    <?php endforeach ?>
                                                                </div>
                                                                <button class="btn btn-primary"><i class="fe-lock"></i> Lock</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Edit</h5>
                                                        <div class="card-body">
                                                            <p class="card-text" align="center">
                                                                <a href="index.php?p=editFile&id=<?= $file->ID ?>" class='btn btn-primary' title='Modifier'><i class='fas fa-edit'></i> Edit</a>
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
<script type="text/javascript" src="Public/JS/File/file.js"></script>
<script type="text/javascript" src="Public/JS/Tag/tag.js"></script>

</html>