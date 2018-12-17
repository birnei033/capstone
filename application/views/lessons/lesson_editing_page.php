
  <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('<?php echo  $title ?>');
        });
    </script>

        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="<?php  echo base_url(); ?>lessons/edit_submited" method="post">
                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                        <?php if (isset($_GET['result'])) {
                            if ($_GET['result'] == 1) { ?>
                            <div class="col-sm-12">
                                <div class="alert alert-success icons-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled"></i>
                                    </button>
                                    <p><strong>Success!</strong>Lesson Edited Successfully!</p>
                                </div>
                            </div>
                          <?php  }
                        } ?>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Lesson Title" value="<?php echo $title ?>" name="lesson-title" class="form-control">
                                <input type="hidden" name="lesson-id" value="<?php echo $id ?>">
                            </div>            
                            <div class="col-sm-3">
                                <select name="lesson-subject" id="" class="form-control js-example-basic-hide-search">
                                    <?php
                                    foreach ($subjects as $subject) {
                                        $selected = $subject["subject_id"] == $subject_id ? "selected" : "" ;
                                        echo '<option '.$selected.' value="'.$subject["subject_id"].'">'.$subject["subject_title"].'</option>';
                                    }
                                    
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="col-sm-3">
                                    <a href="<?php echo base_url() ?>lessons/lesson_preview?preview=<?php echo $title; ?>" class="btn btn-primary">Preview</a>
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
       
        <script src="<?php echo base_url() ?>assets/js/add-section.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                   CKEDITOR.instances.editor.setData('<?php echo preg_replace( "/\'|\r|\n/", "", $content ) ?>');
            });

           </script>