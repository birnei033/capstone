<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Register Your Student');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Default Password is "changeme"</h5>
                    <span>They have to change it on first login.</span>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="" action="<?php echo teacher_base('student_registration/add') ?>" method="post">
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
                        <div class="form-group form-default ">
                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
                        <?php
                            foreach ($programs as $key => $val) {
                            echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        ?>
                        </select>
                        </div>
                        <div class="form-group  ">
                            <input type="text" name="s-full-name" class="form-control" placeholder="Enter Student's Full Name" required="">
                            <!-- <span class="form-bar"></span>
                            <label class="float-label">Student's Full Name</label> -->
                        </div>
                        <button type="submit" id="" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
       