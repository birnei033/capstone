


        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="<?php  echo base_url(); ?>lessons/save" method="post">
                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" placeholder="Lesson Title" name="lesson-title" class="form-control ">
                            </div>            
                            <div class="col-sm-6">
                                <select name="lesson-subject" id="" class="form-control js-example-basic-hide-search">
                                    <!-- <optgroup label="Subjects"> -->
                                    <option value="0">Select Subject</option>
                                    <?php foreach ($subjects as $subject) { ?>
                                        <option value="<?php echo $subject->subject_id ?>"><?php echo $subject->subject_title; ?></option>
                                        <?php } ?>
                                    <!-- </optgroup> -->
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