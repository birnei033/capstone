<?php 
page_header("Result");
?>
<div class="row">
    <?php card_open( "", 4   ) ?>
        <div id="results" class="report">
            
        </div>
    <?php card_close(); ?>
    <?php card_open( "", 8   ) ?>
        <div id="written" class="report">
            
        </div>
    <?php card_close(); ?>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "<?php echo api_base() ?>teacher/ajax_finished_exercises/?cs_id=<?php echo $get['cs_id'] ?>&ex_id=<?php echo $get['ex_id'] ?>",
            // data: "data",
            dataType: "JSON",
            success: function (response) {
                var mc_answer = response['answers']; 
                var written = response.written_answers;
                var written_answers = response.written_answers;
                console.log(response);
                var out = "";
                out += '<p>Name: <strong>'+mc_answer.student_full_name+'</strong></p>';
                out += '<p>Subject: <strong>'+mc_answer.subject_title+'</strong></p>';
                out += '<p>Quiz/Exam: <strong>'+mc_answer.ex_name+'</strong></p>';
                out += '<p>Date: <strong>'+mc_answer.date_exercise_taken+'</strong></p>';
                out += '<p>Score: <strong>'+mc_answer.ex_score+"/"+mc_answer.ex_total_item+'</strong></p>';
                $('#results').html(out);
                for (let i = 0; i < written.length; i++) {
                    var question = written[i].written_answers.correct_answer['written-'+(i+1)].question;
                    var answer = written[i].written_answers.cs_answer[(i+1)];
                    var max_points = written[i].written_answers.correct_answer['written-'+(i+1)].points;
                    var out2 = "<p>"+(i+1)+". "+question+"</p>";
                    out2 += "<p><strong>Answer:</strong></p><p>"+answer+"</p>";
                    out2 += "Input  score: <input type='number' value='"+max_points+"' style='max-width: 120px;' class=' form-control' name='written-"+(i+1)+"'><br>";
                    
                    $('#written').append(out2);
                }
                var btnout = "<button id='submit-written-score' class='mt-4 float-right btn btn-primary'>Submit</button>";
                $('#written').append(btnout);
            }
        });
    });
</script>