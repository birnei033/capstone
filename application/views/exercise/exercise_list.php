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
                    <th>Subject</th>
                    <th>Author</th>
                    <th>Date Created</th>
                    <!-- <th>Program</th> -->
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
<?php card_close(btn(array(
            'href'=> teacher_base("exercise/add"),
            'text'=>'<i class="ti-plus"></i> Add Subject',
            'type'=>"inverse btn-outline-inverse \" ".tooltip("Add a Lesson")
        ))) ?>

<script>

var ex_list;
$(document).ready(function () {
    ex_list = $('#ex-list').DataTable({
        initComplete: function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        // dom: '<"row"<"#ex-search-box.col-sm-6" ><"#ex-select-subject.col-sm-6" >>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
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
    function onload(){
        $('.delete_exercise').each(function (index, element) {
            var id = $(this).attr('delete_exercise');
                var url = location.pathname;
                var data = {
                    id: id,
                    delete: 'delete'
                };
            $(this).click(function (e) { 
                e.preventDefault();
                // console.log(index);
                swal('An exercise will be deleted!',{
                    icon: 'warning',
                    buttons: ['Cancel', 'Proceed']
                }).then((val)=>{
                    if (val == true) {
                         $.ajax({
                            type: "POST",
                            url: url,
                            data: data,
                            dataType: "JSON",
                            success: function (response) {
                                console.log(response);
                                ex_list.ajax.reload();
                            }
                        });
                    }
                });
                
            });
            
        });
    }
    setInterval(function(){
        onload();
    },1000);

});
</script>