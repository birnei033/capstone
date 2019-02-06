<?php page_header("Exercises") ?>
<?php card_open(
            // ' <button onclick="reset_add_student_form(\'#student-form\')" class="btn btn-primary  waves-effect md-trigger" data-modal="modal-add-student">Add Your Student</button>'
        ) ?>
         <?php hide_header() ?>
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
            'text'=>'<i class="ti-plus"></i> Add Exercise',
            'type'=>"inverse btn-outline-inverse \" ".tooltip("Add a Exercise")
        )).btn(array(
            // 'href'=> "#",
            'text'=>'<i class="ti-trash"></i> Trashed <span id="badge-trash-count" class="badge badge-lg"></span>',
            'type'=>"danger btn-outline-danger \" id='view-trash-bin' ".tooltip("View Trashed")." data-modal='trash-bin' type='button'",
            'class'=>'float-right md-trigger',
        ))) ?>

<?php include "modals/trash_bin.php"; ?>
<div class="md-overlay"></div>
<script>
    var ex_list;
$(document).ready(function () {
    ex_list = $('#ex-list').DataTable({
        initComplete: function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();
            // console.log(json);
            
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
    $('#badge-trash-count').text('<?php echo $count ?>');
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
                swal('An exercise will be trashed!',{
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
                                // console.log(response);
                                ex_list.ajax.reload();
                                $.ajax({
                                    type: "GET",
                                    url: location.pathname+"get_trashed_exerceercises",
                                    // data: "data",
                                    dataType: "JSON",
                                    success: function (response) {
                                        var l = response.trashed.length;
                                        console.log(response.trashed.length);
                                        $('#trashed-item').html("");
                                        response.trashed.forEach(e => {
                                            console.log(e);
                                            var out = "";
                                            out  += '<tr>';
                                            out  += '<td class="p-1">';
                                            out  +=    e.ex_name;
                                            out  +=    '<button  <?php echo tooltip("Delete permanently") ?> lesson_id="'+e.id+'" onclick="delete_permanently($(this))"  class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>';
                                            out  +=    '<button onclick="load_trashed($(this))" <?php echo tooltip("Recover") ?> lesson_id="'+e.id+'" id="undo" class="btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>';
                                            out  += '</td>';
                                            out  += '</tr>';
                                            $('#trashed-item').append(out);
                                            $('[data-toggle="tooltip"]').tooltip();
                                        });
                                        $('#badge-trash-count').text(l);
                                    }
                                });
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