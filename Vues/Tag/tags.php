<?php $title = "Tags";
include 'Public/Includes/head.php';
$idf=$_GET['id'];
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
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>New Tag</b></h4>
                                <form id="formtag" class="form-inline" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $v->ID; ?>" />
                                    <input type="text" name="tag" id="tag" class="form-control" placeholder="Nom du tag" list="tags" />
                                    <datalist id="tags">
                                        <?php foreach ($getT->getAllTags() as $ve): ?>
                                        <option value="<?php echo $ve->TAG; ?>">
                                        <?php endforeach; ?>
                                    </datalist>
                                    <input type="submit" class="btn btn-success validatetag" value="+" />
                                    
                                </form>
                            </div>
                        </div> 
                        <div class="col-12">
                             <div class="card-box table-responsive">
                                <h4 class="header-title"><b>All Tags</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <!-- Affichage de toutes les catégories -->
                                        <?php $i=1; foreach ($tags as $tag):?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$tag['TAG']?></td>
                                            <td> <button type='button' name='update' id='<?= $tag['ID']?>' class='btn btn-block btn-xs btn-primary view_data' title='Modifier'><i class='fas fa-edit'></i></button></td>
                                            <td> <button type='button' name='delete' id='<?= $tag['ID']?>' class='btn btn-block btn-xs btn-danger delete' title='delete'><i class='fe-trash-2'></i></button></td>
                                        </tr>
                                        <?php $i++; endforeach?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end row -->

                        </div>

                </div> <!-- end content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php // include_once 'Public/Modals/Category/editcat.php'; ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Tag/tag.js"></script>
</html>