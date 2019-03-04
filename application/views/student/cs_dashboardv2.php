<?php page_header("Welcome to your dashboard, ".student_session('student_login_name').".") ?>

<div class="row">
    <?php card_open("","12 col-xl-4"); ?>
    <p><strong>ID Number: </strong><?php echo student_session('school_id') ?></p>
    <p><strong>Full Name: </strong><?php echo student_session('student_full_name') ?></p>
    <p><strong>Program: </strong><?php echo student_session('student_program') ?></p>
    <p><strong>Subject: </strong><?php echo student_session('student_subject') ?></p>
    <p><strong>Instructor: </strong><?php echo student_session('instructor') ?></p>
    <?php card_close(" ", "bg-success"); ?>

    <?php card_open("Lessons","6 col-xl-4", "","","pt-0 p-2"); ?>
    <ul class="basic-list cards" style="padding:0; min-height: 300px">
    <?php 
    foreach ($lessons as $lesson) {
        echo "<li class='pl-0 p-1' style='padding: 7px 17px'><p class='d-inline-block' style='color:#000'><a href='".student_base('student/lesson?lesson='.$lesson)."'>".$lesson."</a></p>".
       "</p></li>";
    }
    ?>
    </ul>

    <?php if (count($lessons) != 0) { 
        $exercise_btn = btn(array(
            'text'=> "View all Lessons <span class=\"badge\">".count($lessons)."</span>",
            'class'=>'p-1',
            'href'=>student_base('student/lesson')
        ));
    }else{
        $exercise_btn = "";
    } ?>
    <?php card_close($exercise_btn); ?>
    <?php
        if (count($exercises) != 0) { 
            $lesson_btn = '<button id="view-exercises" data-modal="modal-exercises-list" class="md-trigger p-1  btn btn-danger">Exercises <span id="ex-count" class="badge"> count($exercises) /span></button>';
        }else{
            $lesson_btn = "";
        }
    ?>
    <?php card_open("Exercises Results","6 col-xl-4", "","","pt-0 p-2"); ?>
    <ul class="basic-list cards" style="padding:0; min-height: 300px">
    <?php 
        rsort($exercises);
        foreach ($exercises as $exercise) {
            $r = false;
            $score = 0;
            $total = 0;
            $date_array = date_array(json_decode($exercise->ex_schedule)->start_date);
            // var_dump($answered);
            foreach ($answered as $answer) {
                if ($answer->ex_id == $exercise->id) {
                $r=true;
                $score = $answer->ex_score;
                $total = $answer->ex_total_item;
                $id = $answer->id;
                }
            }
            $day =  $date_array['day'] == "0" ? "No" : $date_array['day'];
            $year = $date_array['year'] == "0" ? "" : $date_array['year'];
            $hour = $date_array['day'] == "0" ? "" : " @ ".$date_array['hour_format'];
            if ($r) {
                // if ($answer->ex_id == $exercise->id) {
                    echo "<li class='pl-0 p-1' style='padding: 7px 17px'><p class='d-inline-block' style='color:#000'><a onclick='open_exercise_review_modal(\"".api_base()."student/Ajax_Finished_Exercise/?id=". $id."\")'  href='#'>".$exercise->ex_name."</a></p>".
                     "<p class='float-right'><strong>Score:</strong> ".$score."/".$total.
                    "</p></li>";    
                // }
               }else{

               }
        }
    ?>
    </ul>
    <?php card_close($lesson_btn); ?>
</div>
<?php 
include "modals/cs_exercises_list.php"; 
include "modals/cs_exercise_review.php"; 

?>
<div class="md-overlay"></div>

<script>
    function open_exercise_review_modal(url){  
        $('#review-loader').show();
    $.ajax({
        url : url,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // console.log(Object.values(data.data));
            // console.log(data);
            var out = "";
            $('#exercise-preview-table').html("Loading data...");
            $.each(data.data, function (i, e) {
                console.log(e);
                if (i == "mc_choice") {
                    
                    out += e.answer.length != 0 ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>Multiple Choice</li>" : "";
                    $.each(e.answer, function (a_i, a_e) { 
                        // console.log(e.question[a_i]); 
                             out += "<li class='list-group-item m-0' style='padding: 7px 17px;'>";
                             out += "<p class='p-0'>"+a_i+". "+e.question[a_i]+"</p>";
                             out += "<p class='p-0'><small><strong>Your answer: </strong>"+e.answer[a_i]+"</small> <br> <small><strong>Correct answer: </strong>"+e.correct[a_i]+"</small></p>";
                             out += "</li>";
                    });
                }
                if (i == "tf_choice") {
                    out += e.answer.length != 0 ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>True or False</li>": "";
                    $.each(e.answer, function (a_i, a_e) { 
                        // console.log(e.question[a_i]); 
                        out += "<li class='list-group-item m-0' style='padding: 7px 17px;'>";
                        out += "<p class='p-0'>"+a_i+". "+e.question[a_i]+"</p>";
                        out += "<p class='p-0'><small><strong>Your answer: </strong>"+e.answer[a_i]+"</small> <br> <small><strong>Correct answer: </strong>"+e.correct[a_i]+"</small></p>";
                        out += "</li>";
                    });
                }

                if (i == "written") {
                    out +=  e.answer.length != 0 ? "<li class='list-group-item pl-0 p-1 color-success text-green' style='padding: 7px 17px'>Written</li>": "";
                    $.each(e.answer, function (a_i, a_e) { 
                        // console.log(e.question[a_i]); 
                        out += "<li class='list-group-item m-0 ' style='padding: 7px 17px; '>";
                        out += "<p class='p-0'>"+a_i+". "+e.question[a_i]+"</p>";
                        var answer = e.answer[a_i] != "" ? e.answer[a_i] : "No Answer"
                        out += "<p class='p-0'><small>Your answer:<br>"+answer+"</small></p>";
                        out += "</li>";
                    });
                }
                 
                $('#review-loader').hide();
            });
            // {
            // });
            out += "<li></li>";
            $('#exercise-preview-table').html(out);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // console.log("false");
            // swal(textStatus+" "+errorThrown);
        }
    });
    $('#exercise-review').addClass('md-show');
}
$(document).ready(function () {
    $('.md-close').click(function (e) { 
        e.preventDefault();
        $('#exercise-review').removeClass('md-show');
        $('#exercise-preview-table').html("");
    });
});
</script>