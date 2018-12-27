
        <!-- Page Content -->
        <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Subjects');
        });
    </script>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        <button onclick="addSubject('<?php echo teacher_base() ?>')" class="btn btn-primary waves-effect">
                            Add Subject
                        </button>
                     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="subjects-table" class="table  table-hover nowrap" style="100%">
                                    <thead>
                                        <tr>
                                            <!-- <th>Subject ID #</th> -->
                                            <th>Subject Title</th>
                                            <th>Number of Lessons</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                    <!-- /.col-lg-12 -->
                </div>

