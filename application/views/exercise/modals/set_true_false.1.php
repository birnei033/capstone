<div class="md-modal md-effect-1" id="set-true-false">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <h5>True or False</h5>
                    <a class=" float-right md-close" style="cursor:pointer;" ><i class="ti-close"></i></a>
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
                </div>
                <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <button id="ex-tf-add-a-question" class="btn btn-success btn-outline-success" type="button">Add a Question</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-inverse btn-outline-inverse" id="ex-tf-submit" type="button">Insert</button>
                        <!-- <button type="button" class="btn btn-danger waves-effect md-close">Close</button> -->
                    </div>
                </div>
                </div>
            </form>
            <!-- <div class="card-block"> -->
            <!-- <form method="post">
                <div class="form-group form-default">
                    <label for="ex-tf-question">Question</label>
                    <textarea class="form-control" rows="3" name="ex-tf-question" id="ex-tf-question"></textarea>
                </div>
                <div class="form-group form-default">
                    <span class="d-block m-b-2" style="margin-bottom: 8px;">Select Correct Answer</span>
                    <span>False</span>
                    <input type="checkbox" id="ex-tf-answer" checked class="js-single"  />
                    <span>True</span>
                </div> -->
                <!-- <div class="btns text-right">
                    <button class="btn btn-primary" id="ex-tf-submit" type="button">Insert</button>
                    <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                </div> -->
            <!-- </form> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#set-true-false #ex-tf-add-a-question').click(function (e) {
            var count = 1;
            $('#set-true-false .accordion-msg').each(function (index, element) {
                count++;
            }); 
            e.preventDefault();
            var accordion =         '<a class="ui-state-active accordion-msg waves-effect waves-dark">Question '+count+'</a>';
            accordion +=            '<div class="accordion-desc">';
            accordion +=                '<div class="form-group form-default">';
            accordion +=                    '<label for="ex-tf-question">Question</label>';
            accordion +=                    '<textarea class="form-control" rows="3" name="ex-tf-question" id="ex-tf-question"></textarea>';
            accordion +=                 '</div>';
            accordion +=                "<form>";
            accordion +=                    "<div class='form-radio'>";
            accordion +=                       '<div class="radio radio-inline">';
            accordion +=                        '<label>';
            accordion +=                            '<input value="true" name="ex-tf-answer" id="ex-tf-answer" type="radio">';
            accordion +=                            '<i class="helper"></i>True';
            accordion +=                        '</label>';
            accordion +=                        '</div>';
            accordion +=                        '<div class="radio radio-inline">';
            accordion +=                            '<label>';
            accordion +=                                '<input value="false" id="ex-tf-answer" name="ex-tf-answer" type="radio">';
            accordion +=                                '<i class="helper"></i>False';
            accordion +=                            '</label>';
            accordion +=                        '</div>';
            accordion +=                     "</div>";
            accordion +=                "</form>";
            accordion +=            '</div>';
            $('#set-true-false #color-accordion').append(accordion);
        });
    });
</script>