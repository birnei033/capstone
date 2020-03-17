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
                    <small>Click to edit</small>
                    <div id="editor1"  class="p-2 mb-2" contenteditable="true" style="border: 1px solid #eee">
                        <h4>True or False.</h4>
                    </div>
                    <div class="form-group">
                        <textarea name="raw-questionaire" id="raw-questionaire-tf" cols="30" rows="4" class="form-control"></textarea>
                        <a href="#" class="btn btn-primary" id="generate-questions-tf">Generate</a>
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
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
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



        $('#generate-questions-tf').click(function (e) { 
            console.log('test');
            
                e.preventDefault();
                var data = document.getElementById('raw-questionaire-tf').value;
                var dataArray = data.split(/[0-9]\./gm); 
                dataArray.forEach(data => {
                var data2 = data.split(">>>");    
                var qqq = data2[0].trim();
                var answer = data2[1];
                var i = 0;
                if(data2[0] != ""){
                    var count = 1;
                    $('#set-true-false .accordion-msg').each(function (index, element) {
                        count++;
                    }); 
                    var anstrue = answer.trim() == "true" ? 'checked' : '';
                    var ansfalse = answer.trim() == "false" ? 'checked' : '';
                    var accordion =         '<a class="ui-state-active accordion-msg waves-effect waves-dark">Question '+count+'</a>';
                    accordion +=            '<div class="accordion-desc">';
                    accordion +=                '<div class="form-group form-default">';
                    accordion +=                    '<label for="ex-tf-question">Question</label>';
                    accordion +=                    '<textarea class="form-control" rows="3" name="ex-tf-question" id="ex-tf-question">'+qqq+'</textarea>';
                    accordion +=                 '</div>';
                    accordion +=                "<form>";
                    accordion +=                    "<div class='form-radio'>";
                    accordion +=                       '<div class="radio radio-inline">';
                    accordion +=                        '<label>';
                    accordion +=                            '<input value="true" '+anstrue+' name="ex-tf-answer" id="ex-tf-answer" type="radio">';
                    accordion +=                            '<i class="helper"></i>True';
                    accordion +=                        '</label>';
                    accordion +=                        '</div>';
                    accordion +=                        '<div class="radio radio-inline">';
                    accordion +=                            '<label>';
                    accordion +=                                '<input value="false" '+ansfalse+' id="ex-tf-answer" name="ex-tf-answer" type="radio">';
                    accordion +=                                '<i class="helper"></i>False';
                    accordion +=                            '</label>';
                    accordion +=                        '</div>';
                    accordion +=                     "</div>";
                    accordion +=                "</form>";
                    accordion +=            '</div>';
                    $('#set-true-false  #color-accordion').append(accordion);
                }
            });
        });
    });
</script>