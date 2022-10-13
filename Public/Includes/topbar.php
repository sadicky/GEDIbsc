<?php  require_once('Models/user.class.php'); $user = new Users();?>
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                <img src="Assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Francais <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="Assets/images/flags/us.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English</span>
                </a>

            </div>
        </li>


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                            <a href="#" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

             s

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <?php
                         foreach ($user->image_user($_SESSION['ID_user']) as  $value) 
                        {
                            ?>
                        <img src="<?=WEBROOT?>image_profil/<?php echo $value->photo?>" class="rounded-circle" width="200" />
                        <?php
                        }
                    ?>
                <span class="ml-1"><?php echo($_SESSION['userName']);?> <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item href="<=WEBROOT;?>myprofil-<=$_SESSION['ID_user'];?>"-->
                <a href="myprofil" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <!-- item-
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!- item--
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a-->

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="<?=WEBROOT;?>deconnexion" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
             <li class="dropdown notification-list">
              
                  <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <span class="ml-1"><i class="fe-settings"></i><i class="mdi mdi-chevron-down"></i> </span>
                 </a>
             <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Parametre!</h6>
                </div>
                  <!-- item-->
                <ul class="nav-second-level" aria-expanded="false">
                    
                    <span class="menu-arrow"><i class="fe-users">Users</i></span>
                    <li><a href="<?=WEBROOT?>users">Users</a></li>
                    <li><a href="<?=WEBROOT?>group_users">Group users</a></li>
                </ul>
                <a href="<?=WEBROOT?>historique" class="dropdown-item notify-item">
                   
                    <span>Log</span>
                </a>
                
                <a href="<?=WEBROOT?>loggedUser" class="dropdown-item notify-item">
                   
                    <span>Logged in user</span>
                </a>
                 <a href="<?=WEBROOT?>backup" class="dropdown-item notify-item">
                   
                    <span>Backup</span>
                </a>
            </div>
               
            </li>


    </ul>

     <!-- LOGO -->
    <div class="logo-box">
        <a href="<?=WEBROOT?>dashboard" class="logo text-center">
            <span class="logo-lg">
                <img src="Assets/images/logo-light.png" alt="" height="54" style="color: white">
                <span class="logo-lg-text-light">IBSC</span>
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="Assets/images/logo-sm.png" alt=""  style="color: white" height="54">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>