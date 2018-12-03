
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Subject</h1>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    Subject Title
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <form action="#" id="form" method="post">
                                            <div class="form-group">
                                            <!-- <label for="subj-name">Subject Title</label> -->
                                            <input type="text" name="subj-name" id="subj-name" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php  
                                                    foreach ($subjects as $subject) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $subject->id; ?></td>
                                                        <td><?php echo $subject->subject_title; ?></td>
                                                        <td><a class="update" subj_id="<?php echo $subject->id; ?>" href="#">Edit</a></td>
                                                        <td><a class="delete" subj_id="<?php echo $subject->id; ?>" href="#">Delete</a></td>
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
<script>
    jQuery(document).ready(function ($) {
        $(".delete").each(function (index, element) {
            
            $(this).click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('subj_id');
                var url = "<?php echo base_url(); ?>subjects/delete/"+id;
                $.ajax({
                    url : url,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        alert("Deleted")
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(textStatus+" "+errorThrown);
                    }
                });
            });
            
        });

        $('#submit').click(function (e) { 
            e.preventDefault();
            // ajax adding data to database
            var url = "<?php echo base_url(); ?>subjects/add/";
            console.log($('#form').serialize());
            $.ajax({
                url : url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    location.reload();// for reload a page
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