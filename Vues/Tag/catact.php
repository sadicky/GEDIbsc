<?php $title = "Categories Actives";
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
                                <p class="text-right">
                                     <a href="<?=WEBROOT?>categories" class="btn btn-sm btn-primary pull-right"><i class="fe-arrow-left"></i>Toutes les Categories</a>
				                </p>
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b><?=$title?></b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Added By</th>
                                            <th>Statut</th>
                                            <th>Act/Des</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <!-- Affichage de toutes les catégories -->
                                        <?php foreach ($getC as $category):?>
                                        <tr>
                                            <td><?=$category->CATEGORIE?></td>
                                            <td>SADICKY Dave</td>
                                            <td>
                                                <?php if($category->STATUT==1):?>
                                                <b class="badge badge-primary badge-pill">Activate</b>
                                                <?php else:?>
                                                <b class="badge badge-danger badge-pill">Deactivate</b>
                                                <?php endif?>
                                            </td>
                                            <td>
                                                <?php if($category->STATUT==0):?>
                                                    <button type='button'  id='<?=$category->ID?>' name='activer' class='btn btn-block btn-xs btn-primary activer' ><i class='fe-check-circle' ></i> Actived?</button>
                                                <?php else:?>
                                                    <button type='button'  id='<?= $category->ID?>' name='desactiver' class='btn btn-block btn-xs btn-danger desactiver' ><i class='fe-x-circle' ></i> Deactived?</button>
                                                <?php endif?>
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

        <?php include_once 'Public/Modals/Category/addcat.php';
              include_once 'Public/Modals/Category/editcat.php'; ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Category/category.js"></script>
</html>