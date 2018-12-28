    <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Lessons');
        });
    </script>
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
                    <th>Author</th>
                    <th>Subject</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
    <?php card_close(); ?>
        
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