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
                        <button class="btn btn-primary  waves-effect md-trigger" data-modal="modal-add-student">Add Your Student</button>
                    </div>
                    <!-- MODAL - ADD - STUDENT -->
                    <div class="md-modal md-effect-1" id="modal-add-student">
                        <div class="md-content">
                            <div class="card p-0">
                                <div class="card-header">
                                    <h5>Default Password is "changeme"</h5>
                                    <span>They have to change it on first login.</span>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="" action="<?php echo teacher_base('student_registration/add') ?>" method="post">
                                        <div class="form-group form-default ">
                                            <select name="s-program" class="select-programss form-control col-sm-12" >
                                            <?php
                                                foreach ($programs as $key => $val) {
                                                echo '<option value="'.$key.'">'.$val.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-login-name" class="form-control" placeholder="Enter Student's Login Name" required="">
                                            <!-- <span class="form-bar"></span>
                                            <label class="float-label">Students' Login Name</label> -->
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-school-id" class="form-control" placeholder="Enter Student's School ID" required="">
                                            <!-- <span class="form-bar"></span>
                                            <label class="float-label">Student's School ID</label> -->
                                        </div>
                                        <div class="form-group  ">
                                            <input type="text" name="s-full-name" class="form-control" placeholder="Enter Student's Full Name" required="">
                                            <!-- <span class="form-bar"></span>
                                            <label class="float-label">Student's Full Name</label> -->
                                        </div>
                                        <button type="submit" id="" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="alt-pg-test" class="table  table-hover nowrap" style="100%">
                                <thead>
                                    <tr>
                                        <th>Student ID #</th>
                                        <th>School ID</th>
                                        <th>Login Name</th>
                                        <th>Student Full Name</th>
                                        <th>Program</th>
                                        <th>Password Reset</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>