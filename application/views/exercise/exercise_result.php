<?php 
page_header("Result");
?>
<div class="row">
    <?php card_open( "", 4   ) ?>
        <div id="results" class="report">
            
        </div>
    <?php card_close("<a class='btn btn-success' href='".teacher_base('exercise/report')."'><< Back to Reports</a>"); ?>
    <?php card_open( "", 8   ) ?>
        <ul id="mc" class="list-group" style="padding:0;">
            
        </ul>
        
    <?php card_close(); ?>
</div>
<?php echo loader_modal('loader-modal', ''); ?>
<script>
    $(document).ready(function () {
        $('#loader-modal').addClass('md-show');
        $.ajax({
            type: "GET",
            url: "<?php echo api_base() ?>teacher/Ajax_Finished_Exercises/?cs_id=<?php echo $get['cs_id'] ?>&ex_id=<?php echo $get['ex_id'] ?>",
            // data: "data",
            dataType: "JSON",
            success: function (response) {
                $('#loader-modal').removeClass('md-show');
                var mc_answer = response['answers']; 
                console.log(mc_answer);
                var written = response.written_answers;
                var written_answers = response.written_answers;
                var out = "";
                out += '<p>Name: <strong>'+mc_answer.student_full_name+'</strong></p>';
                out += '<p>Subject: <strong>'+mc_answer.subject_title+'</strong></p>';
                out += '<p>Quiz/Exam: <strong>'+mc_answer.ex_name+'</strong></p>';
                out += '<p>Date: <strong>'+mc_answer.date_exercise_taken+'</strong></p>';
                out += '<p>Score: <strong>'+mc_answer.ex_score+"/"+mc_answer.ex_total_item+'</strong></p>';
                $('#results').html(out);
                var your_answer = JSON.parse(mc_answer.ex_cs_answers).cs_answer;
                var questions = JSON.parse(response.answers.ajax_questions);
                var corrects = JSON.parse(mc_answer.ex_cs_answers).correct_answers;
                var out2 = "";
                $.each(questions, function (i, value) { 
                     if (i == 'mc_ajax_questions') {
                            console.log(value);
                        out2 += !isEmpty(value) ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>Multiple Choice</li>" : "";
                         $.each(value, function (i, v) { 
                            out2 += '<li class="list-group-item">';
                            out2 += "<p>"+i+". "+v+"</p>";
                            out2 += '<div class="row">';
                            out2 += '<div class="col-sm-6">';
                            out2 += "<p><strong>Student's answer:</strong></p><p>"+your_answer.mc_answers['mchoice-'+i]+"</p>";
                            out2 += '</div><div class="col-sm-6">';
                            out2 += "<p><strong>Correct answer:</strong></p><p>"+corrects.mc_answers['mchoice-'+i]+"</p>";
                            out2 += '</div></div>';
                            out2 += '</li>';
                         });
                         
                     }

                     if (i == 'tf_ajax_questions') {
                           out2 += !isEmpty(value) ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>True or False</li>": "";
                           console.log(isEmpty(value));
                           $.each(value, function (i, v) { 
                            out2 += v == 'undefined' ? "<li>No Data.</li>":"";
                            out2 += '<li class="list-group-item">';
                            out2 += "<p>"+i+". "+v+"</p>";
                            out2 += '<div class="row">';
                            out2 += '<div class="col-sm-6">';
                            out2 += "<p><strong>Student's answer:</strong></p><p>"+your_answer.tf_answers['tf-'+i]+"</p>";
                            out2 += '</div><div class="col-sm-6">';
                            out2 += "<p><strong>Correct answer:</strong></p><p>"+corrects.tf_answers['tf-'+i]+"</p>";
                            out2 += '</div></div>';
                            out2 += '</li>';
                         });
                         
                     }

                     if (i == 'written_ajax_questions') {
                           out2 += !isEmpty(value) ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>Written</li>": "";
                         $.each(value, function (i, v) { 
                            console.log(v);
                            out2 += '<li class="list-group-item">';
                            out2 += "<p>"+i+". "+v+"</p>";
                            out2 += '<div class="row">';
                            out2 += '<div class="col-sm-12">';
                            var answer =  JSON.parse(mc_answer.ex_cs_answers).cs_answer.written_answers[i] != "" ? JSON.parse(mc_answer.ex_cs_answers).cs_answer.written_answers[i] : "No Answer.";
                            out2 += "<p><strong>Student's answer:</strong></p><p>"+answer+"</p>";
                            // out2 += '</div><div class="col-sm-6">';
                            // out2 += "<p><strong>Correct answer:</strong></p><p>"+corrects.tf_answers['tf-'+i]+"</p>";
                            out2 += '</div></div>';
                            out2 += '</li>';
                         });
                         
                     }
                     
                });
                // console.log(written);
                
                for (let i = 0; i < written.length; i++) {
                    // var question = written[i].written_answers.correct_answer['written-'+(i+1)].question;
                    // var answer = written[i].written_answers.cs_answer[(i+1)];
                    // var max_points = written[i].written_answers.correct_answer['written-'+(i+1)].points;
                    // out2 += '<li>';
                    // out2 += "<p>"+(i+1)+". "+question+"</p>";
                    // out2 += "<p><strong>Answer:</strong></p><p>"+answer+"</p>";
                    // out2 += "Input  score: <input type='number' value='"+max_points+"' style='max-width: 120px;' class=' form-control' name='written-"+(i+1)+"'><br>";
                    // out2 += '</li>';
                }
                var btnout = "<button id='submit-written-score' class='mt-4 float-right btn btn-primary'>Submit</button>";
                $('#mc').append(out2);
                // $('#mc').append(btnout);
                $('#loader-modal').removeClass('md-show');
            },
            error: function(){
                $('#loader-modal').removeClass('md-show');
            }
        });
    });
</script>