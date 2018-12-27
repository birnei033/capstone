<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Your Students');
        });
    </script>
  <link rel="stylesheet" type="text/css" href="<?php echo themf() ?>css/component.css">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                        <button onclick="reset_add_student_form('#student-form')" class="btn btn-primary  waves-effect md-trigger" data-modal="modal-add-student">Add Your Student</button>
                    </div>
                    <!-- MODAL - ADD - STUDENT -->
                    
                    <div class="md-modal md-effect-1" id="modal-add-student">
                        <div class="md-content">
                            <div class="card p-0">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-block">
                                    <form class="" id="student-form">
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
                                            <select name="s-subject" class="select-subject form-control col-sm-12" >
                                            <?php
                                                foreach ($subjects as $key => $val) {
                                                echo '<option value="'.$key.'">'.$val.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-login-name" class="form-control" placeholder="Enter Student's Login Name" required="">
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-school-id" class="form-control" placeholder="Enter Student's School ID" required="">
                                        </div>
                                        <div class="form-group  ">
                                            <input type="text" name="s-full-name" class="form-control" placeholder="Enter Student's Full Name" required="">
                                        </div>
                                        <div class="btns text-right">
                                            <button type="button" method onclick="_action('<?php echo teacher_base() ?>', '#student-form')" id="student-submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                                        </div>                 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md-overlay"></div>
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="alt-pg-test" class="table  table-hover nowrap" style="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Student ID #</th> -->
                                        <th>School ID</th>
                                        <th>Login Name</th>
                                        <th>Student Full Name</th>
                                        <th>Student Subject</th>
                                        <th>Program</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

         <!-- MODAL - UPDATE - STUDENT -->
                    
         <div class="md-modal md-effect-1" id="modal-update-student">
                        <div class="md-content">
                            <div class="card p-0">
                                <div class="card-header">
                                <h5>Student Update</h5>
                                </div>
                                <div class="card-block">
                                    <form class="" id="student-update-form">
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
                                            <select name="s-subject" class="select-subject form-control col-sm-12" >
                                                <?php
                                                    foreach ($subjects as $key => $val) {
                                                    echo '<option value="'.$key.'">'.$val.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-login-name" class="form-control" placeholder="Enter Student's Login Name" required="">
                                        </div>
                                        <div class="form-group form-default ">
                                            <input type="text" name="s-school-id" class="form-control" placeholder="Enter Student's School ID" required="">
                                        </div>
                                        <div class="form-group  ">
                                            <input type="text" name="s-full-name" class="form-control" placeholder="Enter Student's Full Name" required="">
                                        </div>
                                        <div class="btns text-right">
                                            <button type="button" method onclick="submit_updated_student('<?php echo teacher_base() ?>', '#modal-update-student')" id="student-submit-update" class="btn btn-primary">Save</button>
                                            <button type="button" onclick="close_modal('#modal-update-student')" class="btn btn-danger waves-effect md-close">Close</button>
                                        </div>                 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md-overlay"></div>