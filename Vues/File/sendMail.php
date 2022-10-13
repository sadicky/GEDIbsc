<?php $title = "Send mail";
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

                        <!-- Right Sidebar -->
                        <div class="col-lg-12">
                            <div class="card-box">
                                <!-- Left sidebar -->
                                <div class="inbox-leftbar">

                                    <a href="#"
                                        class="btn btn-primary btn-block waves-effect waves-light">Send</a>

                                    <div class="mail-list mt-3">
                                        <a href="<?=WEBROOT?>from_mail" class="list-group-item border-0 text-danger"><i
                                                class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span
                                                class="badge badge-danger float-right ml-2">8</span></a>
                                        
                                       
                                        <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-send font-18 align-middle mr-2"></i>Sent Mail</a>
                                        <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                    </div>

                                </div>
                                <!-- End Left sidebar -->

                                <div class="inbox-rightbar">

 
                                        <form class="form-horizontal p-t-20" id="sendMailToUserForm" enctype="multipart/form-data" method="post" action="<?=WEBROOT?>sendMailToUser">
                                           
                                            <div class="row">
                                             <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="sujet" name="sujet" class="form-control" placeholder="Subject">
                                            </div>
                                                
                                                  <div class="form-group row">
                                                   
                                                    <div class="col-sm-12">
                                                       <label for="exampleInputuname3" class="col-sm-3 control-label">Message</label>
                                                         <textarea class="form-control" name="message" id="message" cols="50" rows="4"></textarea>
                                                  </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="exampleInputuname3" class="col-sm-3 control-label">Attach file</label>
                                                <input type="file" name="attachFile" id="attachFile" class="filestyle" data-btnClass="btn-primary">
                                            </div>
                                                <div class="form-group">
                                                     <label for="exampleInputuname3" class="col-sm-3 control-label">Group Name *</label>
                                                  <select class="form-control select2" id="sendGroup" name="sendGroup">
                                                    <option></option>
                                                    <?php 
                                                    foreach ($groupUser as $data)
                                        
                                                    {?>
                                                        <option value="<?php echo $data->ID_group?>"><?php echo $data->groupName?>
                                                        </option>
                                                    <?php
                                                    }?>
                                                </select>
                                            </div>
                                            <!--div class="form-group">
                                                     <label for="exampleInputuname3" class="col-sm-3 control-label">All Users*</label>
                                                <input id="checkbox4" name="sendForAll" type="checkbox" class="checkbox checkbox-info">
                                            </div-->
                                            </div>
                                        </div>
                                     
                                
                                    <div class="form-group">
                                        <span id="sendmail-response"></span>
                            <button type="button" class="btn btn-primary waves-effect text-left font-light text-white" onclick="verifyData_send($('#sujet').val(),$('#message').val(),$('#sendGroup').val()/*,$('#checkbox4').val()*/)"><span>Send</span> <i class="mdi mdi-send ml-1"></i></button>
                                            
                                        </div>
                                   <?php
                                        if(ISSET($_SESSION['status'])){
                                            if($_SESSION['status'] == "ok"){
                                    ?>
                                                <div class="alert alert-info"><?php echo $_SESSION['result']?></div>
                                    <?php
                                            }else{
                                    ?>
                                                <div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
                                    <?php
                                            }
                                            
                                            unset($_SESSION['result']);
                                            unset($_SESSION['status']);
                                        }
                                    ?>

                                        </form>
                                    </div> <!-- end card-->

                                </div>

                                <div class="clearfix"></div>
                            </div>

                        </div> <!-- end Col -->

                    </div><!-- End row -->

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
<script type="text/javascript" src="Public/JS/File/file.js"></script>
</html>