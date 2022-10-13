<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="align-middle"><?=$lang['Language']?> <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="dashboard?Lang=fr" class="dropdown-item notify-item">
                    <img src="Assets/images/flags/fr.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Français</span>
                </a>
                <a href="dashboard?Lang=en" class="dropdown-item notify-item">
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

                <div class="slimscroll noti-scroll">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="Assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                <span class="ml-1">Samuel <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
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

<script>
    function setLanguage(){
        var l = $('#language').val();
        window.location.href="/dashboard?Lang="+l;
    }
</script>