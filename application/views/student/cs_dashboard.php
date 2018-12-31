<section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/themf/images/logo.png" alt="logo.png">
                            </div>
                            <h4 class="text-center m-4" style="color:#fff;">
                                Welcome  <?php
                                //   var_dump(student_session());
                                echo student_session('student_login_name') ?>! 
                            </h4>
                            <div class="auth-box card" style="max-width: --615px">
                                <div class="card-block">
                                    <p><strong>ID Number: </strong><?php echo student_session('school_id') ?></p>
                                    <p><strong>Full Name: </strong><?php echo student_session('student_full_name') ?></p>
                                    <p><strong>Program: </strong><?php echo student_session('student_program') ?></p>
                                    <p><strong>Subject: </strong><?php echo student_session('student_subject') ?></p>
                                    <p><strong>Instructor: </strong><?php echo student_session('instructor') ?></p>
                                    <p><strong>Status: </strong></p>
                                    <?php echo btn(array(
                                        'text'=> "Start Lesson",
                                        'class'=>'p-1',
                                        'href'=>student_base('student/lesson')
                                    )) ?>
                                </div>
                            </div>
                            <div class="auth-box " style="max-width: --615px">
                                <div class="card-block">
                                    <?php echo btn(array(
                                        'text'=> "logout",
                                        'class'=>'p-1 float-right',
                                        'href'=>student_base('login/logout')
                                    )) ?>
                                    
                                </div>
                            </div>
                        
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>