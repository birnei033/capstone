   <!-- list css -->
   <link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>pages/list-scroll/list.css">
    <link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>bower_components/stroll/css/stroll.css">

<div class="md-modal md-effect-1" id="modal-exercises-list">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header">
                <h4>You have <?php echo count($exercises) ?> available Exercises</h4>
            </div>
            <div class="card-block">
                <ul class="scroll-list cards" style="padding: 0;">
                <?php
                $count = 0;
                    foreach ($exercises as $exercise) {
                        $r = false;
                        $score = 0;
                        $total = 0;
                       foreach ($answered as $answer) {
                            if ($answer->ex_id == $exercise->id) {
                            $r=true;
                            $score = $answer->ex_score;
                            $total = $answer->ex_total_item;
                            }
                       }
                       if ($r) {
                        // if ($answer->ex_id == $exercise->id) {
                            echo "<li style='padding: 12px 20px'>".$exercise->ex_name.
                             "<span class='float-right'><strong>Score:</strong> ".$score."/".$total.
                            "</span></li>";    
                        // }
                       }else{
                            echo "<li style='padding: 12px 20px'>".$exercise->ex_name.
                            btn(array(
                                'text'=> "Start Exercise",
                                'class'=>'p-1 float-right',
                                'type'=>'link',
                                'href'=>student_base('take_exercise/?ex_id='.$exercise->id)
                            )).
                            "</li>";
                            $count++;
                       } 
                    }
                ?>
                <script>
                    $(document).ready(function () {
                        $('#ex-count').text("<?php echo $count ?>");
                    });
                </script>
                </ul>
                <div class="btns text-right">
                    <!-- <button class="btn btn-primary" id="submit-text" type="button">Insert</button> -->
                    <button type="button" class="btn btn-danger waves-effect md-close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- list-scroll js -->
<script src="<?php echo themf(); ?>bower_components/stroll/js/stroll.js"></script>
<script type="text/javascript" src="<?php echo themf(); ?>pages/list-scroll/list-custom.js"></script>
