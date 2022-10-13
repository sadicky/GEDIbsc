<div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="<?=WEBROOT?>dashboard">
                    <i class="fe-airplay"></i>
                    <span> <?=$lang['Dashboard']?> </span>
                </a>
            </li>
            <li>
                <a href="<?=WEBROOT?>search">
                    <i class="fe-search"></i>
                    <span><?=$lang['Search Documents']?></span>
                </a>
            </li>

            <li>
                <a href="<?=WEBROOT?>files">
                    <i class="fe-list"></i>
                    <span><?=$lang['All Documents']?> </span><span class="badge badge-primary badge-pill float-right"><?=count($files)?></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fe-file"></i>
                    <span> <?=$lang['Documents Uploads']?> </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="icons-dripicons.html"><?=$lang['Scanned Documents']?></a></li>
                    <li><a href="icons-fontawesome.html"><?=$lang['From Mail']?></a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-folder-open"></i>
                    <span> <?=$lang['Folders']?> </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="<?=WEBROOT?>foldercreate"><?=$lang['Create']?></a></li>
                    <li><a href="<?=WEBROOT?>folderall"><?=$lang['All folders']?></a></li>
                </ul>
            </li>
            
            <li>
                <a href="<?=WEBROOT?>categories">
                    <i class="fe-briefcase"></i>
                    <span> <?=$lang['Documents Categories']?> </span>
                </a>
            </li>
            <li>
                <a href="<?=WEBROOT?>users">
                    <i class="fe-users"></i>
                    <span> <?=$lang['Users']?> </span>
                </a>
            </li>
            <li>
                <a href="<?=WEBROOT?>trash">
                    <i class="fe-trash"></i>
                    <span> <?=$lang['Trash']?> </span><span class="badge badge-danger badge-pill float-right"><?=count($list)?></span>
                </a>
            </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>