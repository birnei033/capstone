    <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Lessons Test Only');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Lesson List
                        
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-block">
                        <?php echo $content; ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <button data-modal="modal-2" data="add" class="btn btn-primary waves-effect md-trigger open-modal">
                        Add Lesson
                    </button>
            </div>
        </div>
  
        <div class="md-modal md-effect-8" id="modal-2">
            <div class="md-content">
                <h3>Add Subject</h4>
                <div>
                    <form action="#" ajax="false" id="modal-form" method="post">
                        <div class="form-group">
                        <div id="subject-alert">
                        </div>
                            <input placeholder="Lesson Title" type="text" name="subj-name" id="subj-name" class="form-control" placeholder="" aria-describedby="helpId">
                            <input type="hidden" name="data-type" value="ajax" id="data-type">
                        </div>
                        <button type="button" class="btn btn-secondary waves-effect md-close">Close</button>
                        <button type="submit" id="modal-form-update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

<script>
    jQuery(document).ready(function ($) {
        $(".delete").each(function (index, element) {
            
            $(this).click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('subj_id');
                var url = "<?php echo base_url(); ?>lessons/delete/";
                var data = {
                    data_type: "ajax",
                    subj_id: $(this).attr('subj_id')
                };
                console.log(data);
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