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
        )).'<button class="btn btn-danger btn-outline-danger float-right md-trigger" data-modal="modal-subject-trash" ><i class="ti-trash"></i>Trashed<span id="badge-trashed-subject-count" class="badge badge-lg">0</span></button>'); ?>

<div class="md-modal md-effect-1" id="modal-subject-trash">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header p-1 pl-3 pr-2">
            <h5>Trash bin</h5>
            <a class=" float-right md-close mt-1" style="cursor:pointer;" ><i class="ti-close p-1 bg-danger"></i></a>
            </div>
            <div class="card-block cards" style="min-height: 250px">
                <?php echo loader('trash-loader', 0, 'position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 9; background-color: #f5f5f5; margin:0 ;height: 100%; pointer-event: none;'); ?>
                <ul class="list-group list-group-flush p-0" id="subject-trashed">
                   
                    <li class="list-group-item">Item</li>
                </ul>
            </div>
            <div class="card-footer bg-danger">
            </div>
        </div>
    </div>
</div>
<div class="md-overlay"></div>

<?php echo loader_modal('loader-modal', ''); ?>