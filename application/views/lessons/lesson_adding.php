<script src="<?php echo base_url() ?>assets/js/add-section.js"></script>

        <!-- <div class="lessons sidebar"> -->
        <div class="">
            <form action="lesson" method="post">
                <div class="card row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" placeholder="Lesson Title" name="lesson-title" class="form-control">
                            </div>            
                            <div class="col-sm-6">
                                <select name="subject" id="" class="form-control">
                                    <option value="">Subject 1</option>
                                    <option value="">Subject 2</option>
                                    <option value="">Subject 3</option>
                                    <option value="">Subject 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        
                        <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                        <textarea name="lesson-content" id="editor" cols="30" rows="10"></textarea>
                        <hr>
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </div>
            </form>
        </div>