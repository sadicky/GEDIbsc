
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
                                     <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">New Scan</button>
                                </p>
                                
                             
                                 <!-- Signup modal content -->
                                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <h2 class="text-uppercase text-center mb-4">
                                                        <a href="index.html" class="text-success">
                                                            <span><img src="assets/images/logo-dark.png" alt="" height="20"></span>
                                                        </a>
                                                    </h2>


                                                    <form class="form-horizontal" action="#">

                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="username">Name </label>
                                                                <input class="form-control" type="text" id="username" required="" placeholder="name of document">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="emailaddress">Choose scan</label>
                                                                <input class="form-control" type="file" id="scan" required="" placeholder="john@deo.com">
                                                            </div>
                                                        </div>

                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Save and send</button>
                                                            </div>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                <h4 class="header-title"><b>All Document</b></h4>
                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Document</th>
                                            <th>Author</th>
                                            <th>View</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                     
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            <td>
                                            <a href="" target='blank' class='btn btn-block btn-xs btn-primary' ><i class='fe-eye' ></i> </a>
                                              </td>
                                            <td class="text-center">  
                                                <button type='button' name='update' id='<?= $file->ID?>' class='btn btn-xs btn-primary view_data' title='Modifier'><i class='fas fa-edit'></i></button>
                                                 <button type='button' name='delete' id='<?= $file->ID?>' class='btn btn-xs btn-danger delete' title='Supprimer'><i class='fe-trash'></i></button>
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

        <?php include_once 'Public/Modals/File/addfile.php';?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/File/file.js"></script>
</html>