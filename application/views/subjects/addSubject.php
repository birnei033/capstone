
        <!-- Page Content -->
        <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Subjects');
        });
    </script>
    <?php card_open(
        btn(array(
            'onclick'=> "addSubject('".teacher_base()."')",
            'text'=>"Add Subject"
        ))); ?>
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
    <?php card_close(); ?>
