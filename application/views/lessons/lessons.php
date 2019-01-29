    <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Lessons');
        });
    </script>
    <div  id="lessonsel">
            </div>
            <div  id="lessonsear">
            </div>
    <?php 
    card_open(btn(array(
        'text'=>'Add Your Lesson',
        'href'=> teacher_base('lessons/add')
    ))); ?>
    <div class="table-responsive dt-responsive">
        <table id="alt-pg-lessons" class="table  table-hover nowrap" style="100%">
            <thead>
                <tr>
                    <!-- <th>Lesson ID #</th> -->
                    <th>Lesson Title</th>
                    <!-- <th>Author</th> -->
                    <th>Subject</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
    
            <script>
            jQuery(document).ready(function ($) {
                $('#lessonsear').html('<input type="text" class="form-control" placeholder="Search" id="lesson-searchit">');
                $('#lessonsel').html('<?php echo select($subjects, "f-subject", 'class="select-subject form-control col-sm-12" id="lesson-filter-by-subject"',"",true) ?>');
            });
        </script>
    <?php card_close(); ?>
        <!-- ADD SUBJECT IF NOT SET  -->
        <div class="md-modal md-effect-1" id="modal-add-subject">
            <div class="md-content">
                    <?php card_open('Select a Subject') ?>
                        <form action="" method="post">
                        <div class="form-group  ">
                        <?php
                            echo select($subjects, "s-subject", 'class="select-subject form-control col-sm-12"');
                        ?>
                        </div>
                        </form>
                <div class="btns text-right">
                                    <button type="button" method onclick="submit_lesson_update_subject('<?php echo teacher_base() ?>')" id="student-submit-subject_title" class="btn btn-primary">Save</button>
                                    <button type="button" onclick="close_modal('#modal-add-subject')" class="btn btn-danger waves-effect md-close">Close</button>
                                </div>
                    <?php card_close() ?>
                </div>
            </div>
            <div class="md-overlay"></div>
<script>

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

        // $('.open-modal').each(function (index, element) {
        //     $(this).click(function (e) { 
        //         e.preventDefault();
        //         var method = $(this).attr('data');
        //         var url = "";
        //         if (method == "add") {
        //             url = "<?php echo base_url(); ?>lessons/add/";
        //             $('#modal-form').attr('action', url);
        //             $('#modal-form #subj-name').val("");
        //             $('#modal-form-update').text(method);
        //         }else if(method == "update"){
        //             var id = $(this).attr('subj_id');
        //             url = "<?php echo base_url(); ?>lessons/getbyid/"+id;
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
        //         url = "<?php echo base_url(); ?>subjects/update/"+id;
        //         $('#modal-form').attr('action', url);
        //         }
        //     });
        // });
        // $('#modal-form-update').click(function (e) { 
        //     e.preventDefault();
        //     // ajax adding data to database
        //         // console.log($('#modal-form').serialize());
        //         var url = $('#modal-form').attr('action'),
        //             data = $('#modal-form').serialize();
        //         $.ajax({
        //             url : url,
        //             type: "POST",
        //             data: data,
        //             dataType: "JSON",
        //             success: function(data)
        //             {
        //                 if (!data.status) {
        //                     $('#subject-alert').html(data.alert);
        //                     // console.log(data.alert);
        //                     $('#subject-alert').show();
        //                 }else{
        //                     location.reload();// for reload a page
        //                 }
        //             },
        //             error: function (jqXHR, textStatus, errorThrown)
        //             {
        //                 alert('Error adding / update data');
        //             }
        //         });
        // });
       
    // });

   
 // ajax adding data to database
</script>