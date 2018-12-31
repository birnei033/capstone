
<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Add Your Lesson');
        });
    </script>

        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="<?php  echo base_url(); ?>teacher/lessons/save" method="post">
                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                            <?php echo validation_errors(); ?>
                                <input type="text" placeholder="Lesson Title" name="lesson-title" class="form-control ">
                            </div>            
                            <div class="col-sm-6">
                                
                                        <?php echo select($subjects, "lesson-subject") ?>
                                    <!-- </optgroup> -->
                                <!-- </select> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        
                        <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                        <textarea name="lesson-content" id="editor" cols="30" rows="10"></textarea>
                        <input type="hidden" name="save" value="save">
                        <hr>
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <!-- <script>
             ClassicEditor
                .create( document.querySelector( '#editor'), {
                    ckfinder: {
                                uploadUrl: 'assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            },
                            toolbar: [  'heading', '|', 'ckfinder', 'imageUpload', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script> -->
        <script src="<?php echo base_url() ?>assets/js/add-section.js"></script>