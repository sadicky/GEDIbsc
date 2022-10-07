<?php $title = "Documents";
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
                                <p class="pull-righ">  
                                     <button type="button" data-toggle="modal" data-target="#Files"  class="btn btn-sm btn-primary pull-right"><i class="fas fa-plus"></i> <b>New Documents</b></button>
				                </p>
                            <div class="card-box table-responsive">
        <div class="message"></div><div class="error"></div>
                                <h4 class="header-title"><b>All Document</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Documents</th>
                                            <th>Folder</th>
                                            <th>Categoty</th>
                                            <th>Tags</th>
                                            <th>Author</th>
                                            <th>View</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <!-- Affichage de toutes les catégories -->
                                        <?php foreach ($files as $file):?>
                                            <?php
                                            
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
                                                $tagListOfTheFile = $getT->getTagByFile($file->ID);
                                                // var_dump($tagListOfTheFile);die();
                                            ?>
                                        <tr>
                                            <td><?=$file->ID?></td>
                                            <td><i class='fas fa-file'></i> <a href="index.php?p=file&id=<?= $file->ID ?>"><?=$file->NAMEF?></a></td>
                                            <td><?=$folder?></td>
                                            <td><?=$category?></td>
                                            <td>
                                                 <?php foreach ($tagListOfTheFile as $v): ?>
                                                    <a href="#" class="btn btn-success btn-xs"><?=$getT->getTag($v['IDT'])[0]->TAG;?></a>,                                             
                                                 <?php endforeach; ?>
                                            </td>
                                            <td>SADICKY Dave</td>
                                            <td>
                                            <a href="<?= $file->URLF ?>" target='blank' class='btn btn-block btn-xs btn-primary' ><i class='fe-eye' ></i> </a>
                                              </td>
                                            <td class="text-center">  
                                                <a href="index.php?p=editFile&id=<?= $file->ID ?>" class='btn btn-xs btn-primary'  title='Modifier'><i class='fas fa-edit'></i></a>
                                                 <button type='button' name='delete' id='<?= $file->ID?>' class='btn btn-xs btn-danger delete' title='Supprimer'><i class='fe-trash'></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
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

        <?php include_once 'Public/Modals/File/addfile.php'; ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/File/file.js"></script>
</html>