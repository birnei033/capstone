<?php page_header("Exercises") ?>
<?php card_open(
            // ' <button onclick="reset_add_student_form(\'#student-form\')" class="btn btn-primary  waves-effect md-trigger" data-modal="modal-add-student">Add Your Student</button>'
        ) ?>
    <div class="table-responsive dt-responsive">
    <div hidden id="sel">
    </div>
    <div hidden id="sear">
    </div>
        <table id="ex-list" class="table  table-hover nowrap" style="100%">
            <thead>
                <tr>
                    <!-- <th>Student ID #</th> -->
                    <th>Title</th>
                    <th>Subjct</th>
                    <th>Author</th>
                    <th>Date Created</th>
                    <!-- <th>Program</th> -->
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
<?php card_close() ?>

<script>

var ex_list;
$(document).ready(function () {
    ex_list = $('#ex-list').DataTable({
        initComplete: function(settings, json) {
            // $('[data-toggle="tooltip"]').tooltip();
            // var elem = $('#sel').html();
            // var sear = $('#sear').html();
            // $('#sel').remove(); $('#sear').remove();
            // $('#ex-select-subject').html('<div class="row m-0"><div class="col-sm-4 text-right" style="padding-top: 7px;">Your Subject:</div><div class="col-sm-8">'+elem+'</div></div>');
            // $('#ex-search-box').html(sear);
            // ex_list.search($('#ex-filter-by-subject option:selected').val()).draw();

            // $('#ex-filter-by-subject').change(function (e) { 
            //     e.preventDefault();
            //     ex_list.search($('#ex-filter-by-subject option:selected').val()).draw();
            //     console.log($('#ex-filter-by-subject option:selected').val());
            // });
            // $('#ex-searchit').on('input',function (e) { 
            //     e.preventDefault();
            //     ex_list.search($('#ex-filter-by-subject option:selected').val()+' '+$(this).val()).draw();
            // });
        },
        dom: '<"row"<"#ex-search-box.col-sm-6" ><"#ex-select-subject.col-sm-6" >>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
        ajax: {
            url: location.pathname+"ajax_get_exercise_data",
            type: "post",
        },
        columns: [
            { "data": "ex_name" },
            { "data": "subject_id" },
            { "data": "author" },
            { "data": "date_created" },
            { "data": "tool" }   
        ],
        pagingType: "full_numbers",
        responsive: true
    });
});
</script>