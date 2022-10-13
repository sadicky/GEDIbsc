<?php $title = "Trash";
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
        <div class="message"></div><div class="error"></div>
                                <h4 class="header-title"><b>All Document Trashed</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Documents</th>
                                            <th>Restore</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <!-- Affichage de toutes les catégories -->
                                       
                                            <tr>
                                            <td><a href="<php echo unserialize($file->DATAF)->URLF; >"><= file->FILE_NAMEF ></a></td>                                        
                                            <td class="text-center">  
                                                <button type='button' name='restore' id='<?= $file->ID?>' class='btn btn-xs btn-block btn-success restore' title='Restore'><i class='fe-corner-up-left'></i></button>
                                            </td>
                                            <td class="text-center"> 
                                                 <button type='button' name='delete' id='<?= $file->ID?>' class='btn btn-xs btn-block btn-danger delete' title='Supprimer'><i class='fe-trash-2'></i></button>
                                            </td>
                                            
                                        </tr>
                                     
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
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/File/trash.js"></script>
</html>