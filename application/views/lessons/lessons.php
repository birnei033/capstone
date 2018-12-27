    <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Lessons');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?php echo teacher_base() ?>lessons/add" class="btn btn-primary">Add Your Lesson</a>  
                        <!-- <input class="form-control" id="daterange">                     -->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="alt-pg-lessons" class="table  table-hover nowrap" style="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Lesson ID #</th> -->
                                        <th>Lesson Title</th>
                                        <th>Author</th>
                                        <th>Subject</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>

<script>
    jQuery(document).ready(function ($) {

//         $('#daterange').daterangepicker({
//             timePicker: true,
//             singleDatePicker: true,
//             startDate: moment().startOf('minutes'),
//             // endDate: moment().startOf('hour').add(32, 'hour'),
//             locale: {
//             format: 'M/DD hh:mm A'
//         }
//   }).on('apply.daterangepicker', function(ev, picker){
//     console.log(picker.startDate.format('YYYY-MM-DD'));
//     var diff = (moment() / 1000) - (picker.endDate / 1000);
//   console.log(Math.floor(diff));
      
//   });

        $(".delete").each(function (index, element) {
            
            $(this).click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('lesson_id');
                var url = "<?php echo teacher_base('lessons/delete')?>";
                var data = {
                    data_type: "ajax",
                    subj_id: $(this).attr('lesson_id')
                };
                console.log(data+url);
                $.ajax({
                    url : url,
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    success: function(data)
                    {
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(textStatus+" "+errorThrown);
                    }
                });
            });
        });

        $('.open-modal').each(function (index, element) {
            $(this).click(function (e) { 
                e.preventDefault();
                var method = $(this).attr('data');
                var url = "";
                if (method == "add") {
                    url = "<?php echo base_url(); ?>lessons/add/";
                    $('#modal-form').attr('action', url);
                    $('#modal-form #subj-name').val("");
                    $('#modal-form-update').text(method);
                }else if(method == "update"){
                    var id = $(this).attr('subj_id');
                    url = "<?php echo base_url(); ?>lessons/getbyid/"+id;
                    $('#modal-form').attr('action', url);
                    $('#modal-form-update').text(method);
                    $.ajax({
                    url : url,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                       $('#modal-form #subj-name').val(data.subject.subject_title);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(textStatus+" "+errorThrown);
                    }
                });
                url = "<?php echo base_url(); ?>subjects/update/"+id;
                $('#modal-form').attr('action', url);
                }
            });
        });
        $('#modal-form-update').click(function (e) { 
            e.preventDefault();
            // ajax adding data to database
                // console.log($('#modal-form').serialize());
                var url = $('#modal-form').attr('action'),
                    data = $('#modal-form').serialize();
                $.ajax({
                    url : url,
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    success: function(data)
                    {
                        if (!data.status) {
                            $('#subject-alert').html(data.alert);
                            // console.log(data.alert);
                            $('#subject-alert').show();
                        }else{
                            location.reload();// for reload a page
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
        });
       
    });

   
 // ajax adding data to database
</script>