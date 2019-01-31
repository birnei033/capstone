<section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                            <div class="auth-box card" style="max-width: --615px">
                            <div class="card-header">
                                    <div class="text-center">
                                        <img src="<?php echo images('hccs_logo.jpg') ?>" width="150" alt="logo.png">
                                    </div>
                                    <h4 class="text-center" style="color:#000;">
                                        Welcome  <?php
                                        //   var_dump(student_session());
                                        echo student_session('student_login_name') ?>! 
                                    </h4>
                            </div>
                                <div class="card-block">
                                
                                    <!-- <hr> -->
                                    <p><strong>ID Number: </strong><?php echo student_session('school_id') ?></p>
                                    <p><strong>Full Name: </strong><?php echo student_session('student_full_name') ?></p>
                                    <p><strong>Program: </strong><?php echo student_session('student_program') ?></p>
                                    <p><strong>Subject: </strong><?php echo student_session('student_subject') ?></p>
                                    <p><strong>Instructor: </strong><?php echo student_session('instructor') ?></p>
                                </div>
                                <div class="card-footer">
                                    <?php
                                    if (count($lessons) != 0) {
                                    echo btn(array(
                                        'text'=> "Start Lesson <span class=\"badge\">".count($lessons)."</span>",
                                        'class'=>'p-1',
                                        'href'=>student_base('student/lesson')
                                    ));
                                    }
                                    ?>
                                    <?php if (count($exercises) != 0) { ?>
                                    <button data-modal="modal-exercises-list" class="md-trigger p-1  btn btn-danger">Exercises <span id="ex-count" class="badge"><?php echo count($exercises) ?></span></button>
                                    <?php } ?>
                                    <?php echo btn(array(
                                        'text'=> "logout",
                                        'class'=>'p-1 float-right',
                                        'type'=>'link',
                                        'href'=>student_base('login/logout')
                                    )) ?>
                                </div>
                            </div>
                          
                <?php include "modals/cs_exercises_list.php"; ?>
                <div class="md-overlay"></div>
                               
                        
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>