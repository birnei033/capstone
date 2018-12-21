
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
                            Subject List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="subjects-table" class="table  table-hover nowrap" style="100%">
                                    <thead>
                                        <tr>
                                            <th>Subject ID #</th>
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
                    <button onclick="addSubject('<?php echo teacher_base() ?>')" class="btn btn-primary waves-effect">
                        Add Subject
                    </button>
                     
                </div>
                    <!-- /.col-lg-12 -->
                </div>


<script>
    jQuery(document).ready(function ($) {   
        // $('.open-modal').each(function (index, element) {
        //     $(this).click(function (e) { 
        //         e.preventDefault();
        //         var method = $(this).attr('data');
        //         var url = "";
        //         if (method == "add") {
        //             url = "<?php echo teacher_base('subjects/add/'); ?>";
        //             $('#modal-form').attr('action', url);
        //             $('#modal-form #subj-name').val("");
        //             $('#modal-form-update').text(method);
        //         }else if(method == "update"){
        //             var id = $(this).attr('subj_id');
        //             url = "<?php echo teacher_base('subjects/getbyid/'); ?>"+id;
        //             $('#modal-form').attr('action', url);
        //             $('#modal-form-update').text(method);
        //             $.ajax({
        //             url : url,
        //             type: "POST",
        //             dataType: "JSON",
        //             success: function(data)
        //             {
        //                $('#modal-form #subj-name').val(data.subject.subject_title);
        //             },
        //             error: function (jqXHR, textStatus, errorThrown)
        //             {
        //                 alert(textStatus+" "+errorThrown);
        //             }
        //         });
        //         url = "<?php echo teacher_base('subjects/update/'); ?>"+id;
        //         $('#modal-form').attr('action', url);
        //         }
        //     });
        // });
    });

   
 // ajax adding data to database
</script>