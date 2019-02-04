<?php hide_header() ?>
        <!-- Page Content -->
        <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Subjects');
        });
    </script>
    <?php card_open(); ?>
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
    <?php card_close(btn(array(
            'onclick'=> "addSubject('".teacher_base()."')",
            'text'=>'<i class="ti-plus"></i> Add Subject',
            'type'=>"inverse btn-outline-inverse \" ".tooltip("Add a Lesson")
        ))); ?>
