<?php $title = "Log";
include 'Public/Includes/head.php'; 
  
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

    
                            <div class="row">

                                <div class="col-lg-12">
                                
                                    <div class="card-box">
                                        <h4 class="header-title">Users activities</h4>
                                        <p class="sub-header">
                                        </p>

                                        <div class="table-responsive">
                                
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Ref</th>
                                                    <th>IP machine</th>
                                                    <th>Agent</th>
                                                    <th>Time</th>
                                                    <th>Message</th>
                                                    <th>HOSTNAME</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-active">

                                                    <!--affiche tout historique-->
                                                
                                                <?php foreach ($geHistorique as $histo):?>
                                                
                                                <th scope="row"><?=$histo->ID_user?></th>
                                                <td><?=$histo->IP_HOST_LOGIN?></td>
                                                <td>EDGE</td>
                                                 
                                                <td><?=$histo->DATE_CREATION?></td>
                                                <td><?=$histo->prenom.' '.$histo->nom_user.' a '.$histo->ACTION.' / '.$histo->TYPE.' / '.$histo->ELEMENT?></td>
                                                <td><?=$histo->HOSTNAME?></td>
                                                </tr>
                                               <?php endforeach?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                
                                </div>

                    
    
    
                            <!--div class="row">
                               
                                <div class="col-lg-12">
    
                                    <div class="card-box">
                                        <h4 class="header-title">Affichage du Log</h4>
                                         <div class="table-responsive">
                                           
                                                <table id="datatable-buttons" class="table table-striped table-condensed table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                               
                                            <th>Ref</th>
                                            <th>IP machine</th>
                                            <th>MAC</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            <th>HOSTNAME</th>
                                            
                                        
                                            </tr>
                                            </thead>
                                            <tbody>
                                             <tr>
                                                
                                            </tr>
                                            
                                            
                                        </table>
                                        </div>
                                    </div>
    
                                </div>

                </div> -- end content -->
                
                                           
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include_once'Public/Modals/Users/add_user.php';
              include_once 'Public/Modals/Users/edit_user.php'; ?>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php include 'Public/Includes/foot.php'; ?>
</body>

<!--Pour les javascript-->
<script type="text/javascript" src="Public/JS/Users/users.js"></script>
 <!-- Table Editable plugin-->
        <script src="assets/libs/jquery-tabledit/jquery.tabledit.min.js"></script>

        <!-- Table editable init-->
        <script src="assets/js/pages/tabledit.init.js"></script>
</html>