<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Your Students');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                      
                        
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-de table-hover">
                                <thead>
                                    <tr>
                                        <th style=" max-width: 24px; width: 107px;">Student ID #</th>
                                        <th>School ID</th>
                                        <th>Login Name</th>
                                        <th>Student Full Name</th>
                                        <th>Program</th>
                                        <th>Password Reset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($students as $student) { ?>
                                        <tr>
                                            <td><?php echo $student->student_id ?></td>
                                            <td><?php echo $student->school_id ?></td>
                                            <td><?php echo $student->student_login_name ?></td>
                                            <td><?php echo $student->student_full_name ?></td>
                                            <td><?php echo $programs[$student->student_program] ?></td>
                                            <td><a class="btn btn-danger" href="<?php echo teacher_base('your_student/password_reset/').$student->student_id ?>">Reset</a></td>
                                        </tr>
                                   <?php }
                                ?>
                                    
                                </tbody>
                            </table>
                           
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- <button data-modal="modal-2" data="add" class="btn btn-primary waves-effect md-trigger open-modal">
                        Add Lesson
                    </button> -->
            </div>
        </div>