<section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                        <form class="md-float-material form-material" action="<?php echo student_base() ?>login/login_submit/" method="post">
                        <!-- <?php echo form_open('cs_login/login') ?> -->
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <img src="<?php echo images('hccs_logo.jpg') ?>" width="150" alt="logo.png">
                                            </div>
                                            <h3 class="text-center">Student Sign In</h3>
                                            <ol>
                                                <?php echo validation_errors(); ?>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="form-group form-default form-static-label">
                                        <input type="text" placeholder="Enter Your User Name" value="<?php echo set_value('cs_login_name') ?>" name="cs_login_name" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your User Name</label>
                                    </div>
                            
                                    <div class="form-group form-default form-static-label">
                                        <input type="password" placeholder="Enter Your Password" name="cs_password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <!-- <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div> -->
                                            <div class="forgot-phone text-center">
                                                <a href="#iforgotmypassword" <?php echo tooltip("Please contact your instructor/teacher for your password.") ?> class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Thank you.</p>
                                            <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="<?php echo base_url() ?>assets/themf/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>