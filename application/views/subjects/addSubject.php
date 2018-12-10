
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Subject</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <button data-toggle="modal" data-target="#myModal" data="add" class="btn btn-primary open-modal">
                                    Add Subject
                                </button>
                                <hr>
                            </div>
                            
                            <!-- <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    Subject Title
                                    </div> -->
                                    <!-- /.panel-heading -->
                                    <!-- <div class="panel-body">
                                        <form action="#" id="form" method="post">
                                            <div class="form-group"> -->
                                            <!-- <label for="subj-name">Subject Title</label> -->
                                            <!-- <input placeholder="Subject Title" type="text" name="subj-name" id="subj-name" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Subject List
                                        
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Subject ID #</th>
                                                        <th>Subject Title</th>
                                                        <th>Number of Lessons</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php  
                                                    foreach ($subjects as $subject) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $subject->subject_id; ?></td>
                                                        <td><?php echo $subject->subject_title; ?></td>
                                                        <td><?php echo $subject->number_of_lessons; ?></td>
                                                        <td><a class="update open-modal" data-toggle="modal" data="update" data-target="#myModal" subj_id="<?php echo $subject->subject_id; ?>" href="#">Edit</a></td>
                                                        <td><a class="delete" subj_id="<?php echo $subject->subject_id; ?>" href="#">Delete</a></td>
                                                    </tr>
                                                    <?php  }  ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- /modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                    <form action="#" ajax="false" id="modal-form" method="post">
                        <div class="form-group">
                        <div id="subject-alert">
                        </div>
                            <input placeholder="Subject Title" type="text" name="subj-name" id="subj-name" class="form-control" placeholder="" aria-describedby="helpId">
                            <input type="hidden" name="data-type" value="ajax" id="data-type">
                        </div>
                   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="modal-form-update" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<script>
    jQuery(document).ready(function ($) {
        $(".delete").each(function (index, element) {
            
            $(this).click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('subj_id');
                var url = "<?php echo base_url(); ?>subjects/delete/";
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
                    url = "<?php echo base_url(); ?>subjects/add/";
                    $('#modal-form').attr('action', url);
                    $('#modal-form #subj-name').val("");
                    $('#modal-form-update').text(method);
                }else if(method == "update"){
                    var id = $(this).attr('subj_id');
                    url = "<?php echo base_url(); ?>subjects/getbyid/"+id;
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