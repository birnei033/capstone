
<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Add Your Lesson');
        });
    </script>

        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="<?php  echo base_url(); ?>teacher/lessons/save" method="post">
                <div class="card row" style="max-width: 900px; margin:auto">
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
                        <textarea name="lesson-content" contenteditable="true" id="editor2" cols="30" rows="10"><h4>Click here to add content.</h4></textarea>
                        <!-- <div id="lesson-editor" contenteditable="true">
                            <h4>Ckick here to insert content.</h4>
                        </div> -->
                       
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="save" value="save">
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </div>
            </form>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                
                
                // Turn off automatic editor creation first.
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.inline( 'editor2' );
            });
            

           </script>
       
        <!-- <script src="<?php echo base_url() ?>assets/js/add-section.js"></script> -->