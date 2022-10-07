<?php $title = "Edit";
include 'Public/Includes/head.php'; 
                                            
if($file->IDC==0){
    $category = "Non classé";
}else{
    $category = $getCategory->getCatId($file->IDC)[0][1];
}

if($file->IDD==0){
    $folder = "Non classé";
}else{
    $folder = $getFolder->getFolderId($file->IDD)[0][1];
}                                   

if(isset($_POST['fichier'])==null){
    $m = "Veiller choisir une image";
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
                            <p class="text-right">
                                <a href="files" class="btn btn-primary"><i class="fe-arrow-left"></i> All Documents</a>
                            </p>
                            <div class="card-box table-responsive">
                                <div class="message"></div>
                                <div class="error"></div>
                                <h4 class="header-title"><b>Edit File</b></h4>


                                <form method="post" action='Public/Script/File/editfile.php' enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" name="action" value="fileUpload" />
                                        <input type="hidden" value="<?= $file->ID ?>" name="id" />
                                        <input type="hidden" value="<?= $file->IDU ?>" name="user" />
                                        <input type="hidden" value="<?= $file->VERSION + 1 ?>" name="version" />
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Folder</label>
                                                <select name="idp" class="form-control select2" id="idp">
                                                    <option value="<?= $file->IDD ?>" selected><?=$folder?></option>
                                                    <option value="0">No Parent</option>
                                                    <?php foreach ($getF as $folder) : ?>
                                                        <option value="<?= $folder->ID ?>"><?= $folder->FOLDER ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="idc" class="form-control select2" id="idc">
                                                    <option value="<?= $file->IDC ?>" selected><?=$category?></option>
                                                    <option value="0">Not</option>
                                                    <?php foreach ($getC as $category) : ?>
                                                        <option value="<?= $category->ID ?>"><?= $category->CATEGORIE ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" value="<?= $file->NAMEVIEW ?>" name="name" id="name" placeholder='Name' />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>File</label>
                                                <input type="file" name="fichier[]" id="fichier" value="<?= $file->NAMEVIEW ?>" class="filestyle" id="filestyleicon" required multiple>
                                                <span style="color:red"><?=$m?></span>
                                                <div class="form-group"> <br>
                                                    <button type="submit" name="valider" class="btn btn-success btn-block">
                                                        <i class="fas fa-save"></i> Save Version <?= $file->VERSION + 1 ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="desc" id="desc"><?= $file->DESCRIPTIONF ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>KeyWords</label>
                                                <textarea class="form-control" name="kw" id="kw" placeholder='Keywords'><?= $file->KEYWORDS ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>


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

</html>