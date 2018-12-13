
  <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('<?php echo  $lessons[0]->lesson_title ?>');
        });
    </script>

        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="<?php  echo base_url(); ?>lessons/edit" method="post">
                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" placeholder="Lesson Title" value="<?php echo $lessons[0]->lesson_title ?>" name="lesson-title" class="form-control">
                            </div>            
                            <div class="col-sm-6">
                                <select name="lesson-subject" id="" class="form-control">
                                    <option value="1">Subject 1</option>
                                    <option value="2">Subject 2</option>
                                    <option value="3">Subject 3</option>
                                    <option value="4">Subject 77</option>
                                </select>
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
                   CKEDITOR.instances.editor.setData('<?php echo preg_replace( "/\r|\n/", "", $lessons[0]->lesson_content ) ?>');
            });

           </script>