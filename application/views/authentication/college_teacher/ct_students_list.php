<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Your Students');
        });
        
    </script>
     <?php hide_header() ?>
  <link rel="stylesheet" type="text/css" href="<?php echo themf() ?>css/component.css">
        <?php card_open(
            
        ) ?>
            <div class="table-responsive dt-responsive">
            <div hidden id="sel">
            </div>
            <div hidden id="sear">
            </div>
                <table id="alt-pg-test" class="table  table-hover nowrap" style="100%">
                    <thead>
                        <tr>
                            <!-- <th>Student ID #</th> -->
                            <th>School ID</th>
                            <th>Login Name</th>
                            <th>Student Full Name</th>
                            <th>Password</th>
                            <th>Program</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php card_close(' <button onclick="reset_add_student_form(\'#student-form\')" class="btn btn-inverse btn-outline-inverse  waves-effect md-trigger" data-modal="modal-add-student"><i class="ti-plus"></i> Add Your Student</button>'.
            '<button class="btn btn-danger btn-outline-danger float-right md-trigger" data-modal="trashed_student_list" ><i class="ti-trash"></i>Trashed<span id="badge-trash-count" class="badge badge-lg">0</span></button>'
        ) ?>
        <script>
            // jQuery(document).ready(function ($) {
                $('#sear').html('<input type="text" class="form-control" placeholder="Search" id="searchit">');
                $('#sel').html('<?php echo select($subjects, "f-subject", 'class="select-subject form-control col-sm-12" id="filter-by-subject"',"",true) ?>');
            // });
        </script>
        <div class="md-modal md-effect-1" id="modal-add-student">
                        <div class="md-content">
                            <div class="card p-0">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-block" style="position: relative;">
                                <?php echo loader('trash-loader-adding', 0, 'position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 9; background-color: #f5f5f5; margin:0 ;height: 100%; pointer-event: none;'); ?>
                                    <form class="" id="student-form">
                                        <div class="form-group form-default ">
                                        <?php
                                                echo select($programs, "s-program", 'class="select-programss form-control col-sm-12"', "Select Program");
                                            ?>
                                        </div>
                                        <div class="form-group form-default ">
                                        <?php
                                                echo select($subjects, "s-subject", 'class="select-subject form-control col-sm-12"',"Select Subject");
                                            ?>
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
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <div class="btns text-right">
                                        <button type="button" method onclick="_action('<?php echo teacher_base() ?>', '#student-form')" id="student-submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                                    </div>                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="md-overlay"></div> -->
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
                                <?php
                                    echo select($programs, "s-program", 'class="select-programss form-control col-sm-12"');
                                ?>
                            </div>
                            <div class="form-group form-default ">
                                <?php
                                    echo select($subjects, "s-subject", 'class="select-subject form-control col-sm-12"');
                                ?>
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

        <div class="md-modal md-effect-1" id="trashed_student_list">
            <div class="md-content">
                <?php card_open('<h5>Trash bin</h5><a class=" float-right md-close mt-1" style="cursor:pointer;" ><i class="ti-close bg-danger p-1"></i></a>',"12 p-0","","","p-1 pl-3 pr-4") ?>
                <?php echo loader('trash-loader', 0, 'position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 9; background-color: #f5f5f5; margin:0 ;height: 100%; pointer-event: none;'); ?>
                    <ul id="student_trashed" class="cards card-list list-group-flush list-group p-0" style="min-height: 250px">
                    </ul>
                <?php card_close(" ", "bg-danger") ?>
            </div>
        </div>
        <!-- <div class="md-overlay"></div> -->

        <?php echo loader_modal('loader-modal', ''); ?>