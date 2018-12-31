<section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                        <form class="md-float-material form-material" action="<?php echo student_base() ?>change_password/submit" method="post">
                        <!-- <?php echo form_open('cs_login/login') ?> -->
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/themf/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h5 class="text-center">Please Change Your Password</h5>
                                            <ol>
                                                <?php echo validation_errors(); ?>
                                            </ol>
                                        </div>
                                    </div>    
                                    <div class="form-group form-default form-static-label">
                                        <input type="password" placeholder="Enter Your Password" name="cs_password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="form-group form-default form-static-label">
                                        <input type="password" placeholder="Confirm Your Password" name="cs_passconf" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Confirm Your Password</label>
                                    </div>
                                    
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Change Password</button>
                                        </div>
                                        <div class="col-md-12">
                                            <a type="button" href="<?php echo student_base() ?>" class="btn btn-danger btn-md btn-block waves-effect waves-light text-center m-b-20">Not Now</a>
                                        </div>
                                    </div>
                                    <hr>
                                    
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