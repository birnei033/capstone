<div class="md-modal md-effect-1" id="set-mul-choice" >
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Multiple Choice</h4>
                </div>
                <div class="col-sm-6">
                    <div class="btns text-right">
                        <button id="ex-mul-choice-submit" class="btn btn-primary" type="button">Insert</button>
                        <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                    </div>
                </div>
            </div>
            </div>
            <form method="post">
                <div class="card-block accordion-block color-accordion-block cards mb-5"  style="min-height: 550px">
                    <div class="color-accordion " id="color-accordion" >
                        
                    </div>
                    <div class="btns text-right mb-4">
                        <button id="ex-mul-choice-add-a-question" class="btn btn-primary" type="button">Add a Question</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#ex-mul-choice-add-a-question').click(function (e) {
            var count = 1;
            $('#set-mul-choice .accordion-msg').each(function (index, element) {
                count++;
            }); 
            e.preventDefault();
            var accordion =         '<a class="ui-state-active accordion-msg waves-effect waves-dark">Question '+count+'</a>';
            accordion +=            '<div class="accordion-desc">';
            accordion +=                '<div class="form-group form-default">';
            accordion +=                    '<label for="ex-mc-question">Question</label>';             
            accordion +=                    '<textarea contenteditable="true" class="form-control" rows="3" name="ex-mc-question" id="ex-mc-question"></textarea>';
            accordion +=                '</div>';
            accordion +=                '<div class="form-group">';
            accordion +=                    '<label for="ex-mc-correct-anwser">Correct Answer</label>';
            accordion +=                    '<input class="ex-mc-correct-anwsers form-control" type="text">';
            accordion +=                '</div>';
            accordion +=                '<div class="form-group">';
            accordion +=                    '<label for="ex-mc-wrong1">Wrong Answers</label>';
            accordion +=                    '<input id="ex-mc-wrong1" class="ex-mc-wrong1 form-control m-b-1" type="text">';
            accordion +=                    '<input id="ex-mc-wrong2" class=" ex-mc-wrong2 form-control" type="text">';
            accordion +=                    '<input id="ex-mc-wrong3" class=" ex-mc-wrong3 form-control" type="text">';
            accordion +=                '</div>';
            accordion +=            '</div>';
            $('#set-mul-choice #color-accordion').append(accordion);
        });
    });
</script>