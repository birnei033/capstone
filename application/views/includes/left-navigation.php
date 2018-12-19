<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <!-- <div class="main-menu-header">
                <img class="img-menu-user img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <p id="more-details"><?php echo isset($this->session->userdata['loged_in']) ? $this->session->userdata['loged_in']['name']: "Name" ?><i class="feather icon-chevron-down m-l-10"></i></p>
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
        </div> -->
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo teacher_base('dashboard'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Default</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Lessons</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo teacher_base('lessons'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">List</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo teacher_base('lessons/add'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class=" ">
                <a href="<?php echo base_url(); ?>lessons" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-menu"></i>
                </span>
                <span class="pcoded-mtext">Lessons</span>
            </a>
            </li> -->
            <li class="">
                <a href="<?php echo teacher_base('subjects'); ?>" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-menu"></i>
                </span>
                <span class="pcoded-mtext">Subjects</span>
            </a>
            </li>
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Your Students</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo teacher_base('your_students'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Student List</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo teacher_base('student_registration'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Add Your Student</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- [ navigation menu ] start -->

<!-- [ navigation menu ] end -->
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10" id="page-title">Dashboard</h4>
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