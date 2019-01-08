<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <!-- <img class="img-menu-user img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" alt="User-Profile-Image"> -->
                <div class="text-center">
                    <img style="width: 100px;" src="<?php echo images('hccs_logo.jpg') ?>"  alt="logo.png">
                </div>
                <div class="user-details">
                    <p id=""><?php echo isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['name']: "Name" ?>
                    <!-- <i class="feather icon-chevron-down m-l-10"></i> -->
                    </p>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html">
                        <i class="feather icon-user"></i>View Profile
                    </a>
                        <a href="#!">
                        <i class="feather icon-settings"></i>Settings
                    </a>
                        <a href="auth-normal-sign-in.html">
                        <i class="feather icon-log-out"></i>Logout
                    </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <?php if (is_admin()) {  
            include "left-navigation-teacher.php";
             } ?>
    </div>
</nav>

<!-- [ navigation menu ] start -->

<!-- [ navigation menu ] end -->
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
    <div class="page-block" style="    padding-bottom: 0;
    position: relative;
    bottom: -2px;
    left: 14px;
    color: #fff;">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h2 class="m-b-10" id="page-title">Teacher <?php echo teacher_session('name') ?> Dashboard</h2>
                    </div>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="feather icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!">Dashboard</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
        <div class="page-wrapper">
        <div class="page-body">