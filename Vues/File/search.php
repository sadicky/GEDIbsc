<?php $title = "Search File";
include 'Public/Includes/head.php';

if(isset($_POST['action'])){
    if($_POST['action']=="searchByCat"){
        $categoryId=$_POST['category'];
        $fileList = $getFile->getFilesByCategory($categoryId);
    }
    if($_POST['action']=="searchByKW"){
        $kw=$_POST['keyword'];
        $fileList = $getFile->getFilesByKeyWord($kw);
    }
    if($_POST['action']=="searchByDate"){
        $from=$_POST['from'];
        $to=$_POST['to'];
        $fileList = $getFile->getFilesByDate($from,$to);
    }
    if($_POST['action']=="searchByFolder"){
        $folderId=$_POST['folder'];
        $fileList = $getFile->getFilesByFolder($folderId);
    }
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
                            <div class="card-box table-responsive">
                                <div class="card-box">
                                    <ul class="nav nav-tabs nav-bordered nav-justified">
                                        <li class="nav-item">
                                            <a href="#gI" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            SEARCH DOCUMENT
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="gI">
                                            <br>
                                        <?php if(isset($_POST['submit'])):?>
                                            <div class="row">                                                
                                                <h5 style="color:red;"><?=count($fileList); ?> result(s)</h5><br>
                                                <ul class="well">
                                                <?php foreach ($fileList as $value): ?>
                                                    <li class="fileLink"><a href="index.php?p=file&id=<?= $value['ID'] ?>"> <?= $value['NAMEVIEW']; ?></a></li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <?php endif?><br>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Search Document by Keyword</h5>
                                                        <div class="card-body">
                                                            <p class="card-text">                                                                
                                                                <form class="form-inline" method="post">
                                                                    <input type="hidden" name="action" value="searchByKW" /> 
                                                                    <input type="text" class="form-control" name="keyword">
                                                                    <button type="submit" class="btn btn-md btn-primary" name="submit"><i class="fe-search"></i></button>                                                                    
                                                                </form>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Search Document by Date of Creation</h5>
                                                        <div class="card-body">
                                                            <div class="card-text">                                                               
                                                                <form class="form-inline" id="formsearcat" method="post">
                                                                    <input type="hidden" name="action" value="searchByDate" />
                                                                        <div class="form-group">
                                                                            <label>From</label>
                                                                            <input type="date" name="from" class="form-control">
                                                                        </div>	
                                                                        <div class="form-group">
                                                                            <label>To</label>
                                                                            <input type="date" name="to" class="form-control">
                                                                        </div>	
                                                                    <button type="submit" class="btn btn-md btn-primary"  name="submit"><i class="fe-search"></i></button>                                                                     
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue ;color:white">Search Document by Category</h5>
                                                        <div class="card-body">
                                                            <div class="card-text">                                                              
                                                                <form class="form-inline" method="post">
                                                                    <input type="hidden" name="action" value="searchByCat" /> 
                                                                    <select class="form-control select2" name="category">
                                                                        <option value="0">Not&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
                                                                        <?php foreach ($getC as $ve): ?>
                                                                        <option value="<?= $ve->ID ?>"><?= $ve->CATEGORIE ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <button type="submit" class="btn btn-xs btn-primary"  name="submit"><i class="fe-search"></i></button>                                                                     
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card">
                                                        <h5 class="card-header" style="background-color:dodgerblue; color:white">Search Document by Folder</h5>
                                                        <div class="card-body">
                                                            <div class="card-text">                       
                                                                <form class="form-inline"  method="post">
                                                                    <input type="hidden" name="action" value="searchByFolder" /> 
                                                                    <select class="form-control select2" name="folder">
                                                                        <option value="0">Not&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
                                                                        <?php foreach ($getF as $ve): ?>
                                                                        <option value="<?= $ve->ID ?>"><?=$ve->FOLDER?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <button type="submit" class="btn btn-xs btn-primary"  name="submit"><i class="fe-search"></i></button>                                                                     
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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