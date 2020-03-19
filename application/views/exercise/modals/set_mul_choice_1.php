<div class="md-modal md-effect-1" id="set-mul-choice" >
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Multiple Choice</h5>
                    <a class=" float-right md-close" style="cursor:pointer;" ><i class="ti-close"></i></a>
                </div>
            </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-sm-12">
                       
                    </div>
                </div>
                <div class="card-block accordion-block color-accordion-block cards mb-5"  style="min-height: 550px">
                    <small>Click to edit</small>
                    <div id="editor1" class="p-2 mb-2" contenteditable="true" style="border: 1px solid #eee">
                        <h4>Multiple Choice.</h4>
                    </div>
                    <div class="raw-questionairewrapper">
                        <textarea name="raw-questionaire" id="raw-questionaire" cols="30" rows="4" class="form-control"></textarea>
                        <a target="_blank" href="<?=site_url('instructions')?>">Click here for instructions on how to use this feature.</a><br>
                        <button class="btn btn-primary" id="generate-questions">Generate</button>
                    </div>
                    <div class="color-accordion " id="color-accordion" >
                        
                    </div>
                </div>
                <div class="card-footer">
                
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button id="ex-mul-choice-add-a-question" class="btn btn-success btn-outline-success " type="button"><i class="ti-plus"></i> Add a Question</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button id="ex-mul-choice-submit" class="btn btn-inverse btn-outline-inverse" type="button"><i class="ti-check"></i> Insert</button>
                            <!-- <button type="button" class="btn btn-danger btn-outline-danger waves-effect md-close"><i class="ti-close"></i> Close</button> -->
                        </div>
                        
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


        $('#generate-questions').click(function (e) { 
            e.preventDefault();
            
            var data = document.getElementById('raw-questionaire').value; 
            var dataArray = data.split(/[0-9]\./gm);
            dataArray.forEach(data => {
                var data2 = data.split(/[a-d]\./);
                var qqq = [];
                var answer = "";
                var i = 0;
                data2.forEach((d) => {
                    if(d.search(">>>") != -1){
                        answer = d.replace('>>>', '').trim();
                    }else{
                        qqq[i] = d.trim();
                        i++;
                    }

                });
                if(data2 != ""){
                    var count = 1;
                    $('#set-mul-choice .accordion-msg').each(function (index, element) {
                        count++;
                    }); 
                    var accordion =         '<a class="ui-state-active accordion-msg waves-effect waves-dark">Question '+count+'</a>';
                        accordion +=            '<div class="accordion-desc">';
                        accordion +=                '<div class="form-group form-default">';
                        accordion +=                    '<label for="ex-mc-question">Question</label>';             
                        accordion +=                    '<textarea contenteditable="true" class="form-control" rows="3" name="ex-mc-question" id="ex-mc-question">'+qqq[0]+'</textarea>';
                        accordion +=                '</div>';
                        accordion +=                '<div class="form-group">';
                        accordion +=                    '<label for="ex-mc-correct-anwser">Correct Answer</label>';
                        accordion +=                    '<input class="ex-mc-correct-anwsers form-control" value="'+answer+'" type="text">';
                        accordion +=                '</div>';
                        accordion +=                '<div class="form-group">';
                        accordion +=                    '<label for="ex-mc-wrong1">Wrong Answers</label>';
                        accordion +=                    '<input id="ex-mc-wrong1" value="'+qqq[1]+'" class="ex-mc-wrong1 form-control m-b-1" type="text">';
                        accordion +=                    '<input id="ex-mc-wrong2" value="'+qqq[2]+'" class=" ex-mc-wrong2 form-control" type="text">';
                        accordion +=                    '<input id="ex-mc-wrong3" value="'+qqq[3]+'" class=" ex-mc-wrong3 form-control" type="text">';
                        accordion +=                '</div>';
                        accordion +=            '</div>';
                        $('#set-mul-choice #color-accordion').append(accordion);
                        document.getElementById('raw-questionaire').value = "";
                }else{
                    console.log('Please insert data');
                }
            });

        });
    });
</script>