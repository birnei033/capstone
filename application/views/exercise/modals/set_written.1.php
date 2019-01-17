<div class="md-modal md-effect-1" id="set-written">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Written</h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="btns text-right">
                            <button id="ex-written-submit" class="btn btn-primary" type="button">Insert</button>
                            <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="card-block accordion-block color-accordion-block cards mb-5"  style="min-height: 550px">
                    <div id="editor1" class="p-2 mb-2" contenteditable="true" style="border: 1px solid #eee">
                        <h4>Ckick here to add an instruction.</h4>
                    </div>
                    <div class="color-accordion " id="color-accordion" >
                        
                    </div>
                    <div class="btns text-right mb-4">
                        <button id="ex-tf-add-a-question" class="btn btn-primary" type="button">Add a Question</button>
                    </div>
                </div>
            </form>
            <!-- <div class="card-block">
                <div class="form-group form-default ">
                    <label for="ex-written-question">Question/Instruction</label>
                    <textarea class="form-control" name="ex-written-question" id="ex-written-question"></textarea>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#set-written #ex-tf-add-a-question').click(function (e) {
            var count = 1;
            $('#set-written .accordion-msg').each(function (index, element) {
                count++;
            }); 
            e.preventDefault();
            var accordion =         '<a class="ui-state-active accordion-msg waves-effect waves-dark">Question '+count+'</a>';
            accordion +=            '<div class="accordion-desc">';
            accordion +=                '<div class="form-group form-default ">';
            accordion +=                    '<label for="ex-written-question">Question/Instruction</label>';
            accordion +=                    '<textarea class="form-control" name="ex-written-question" id="ex-written-question"></textarea>';
            accordion +=                '</div>';
            accordion +=            '</div>';
            $('#set-written #color-accordion').append(accordion);
        });
    });
</script>