   <!-- list css -->
   <link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>pages/list-scroll/list.css">
    <link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>bower_components/stroll/css/stroll.css">

<div class="md-modal md-effect-1" id="modal-exercises-list">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header p-1 pl-4 pr-2">
                <p class="d-inline-block p-0">You have <strong class="d-inline-block text-success" id="ex-count-head"></strong> available Exercise/s</p> 
                <a class=" float-right md-close pt-1" style="cursor:pointer;"><i class="ti-close p-1 bg-danger"></i></a>
            </div>
            <div class="card-block pr-1 pl-2">
                <ul class="basic-list cards" style="padding:0;">
                <?php
                $count = 0;
                
                    rsort($exercises);
                    foreach ($exercises as $exercise) {
                        $r = false;
                        $score = 0;
                        $total = 0;
                        $date_array = date_array(json_decode($exercise->ex_schedule)->start_date);
                       foreach ($answered as $answer) {
                            if ($answer->ex_id == $exercise->id) {
                            $r=true;
                            $score = $answer->ex_score;
                            $total = $answer->ex_total_item;
                            }
                       }
                       $day =  $date_array['day'] == "0" ? "No" : $date_array['day'];
                       $year = $date_array['year'] == "0" ? "" : $date_array['year'];
                       $hour = $date_array['day'] == "0" ? "" : " @ ".$date_array['hour_format'];
                       if ($r) {
                        // if ($answer->ex_id == $exercise->id) {
                            // echo "<li style='padding: 7px 17px'><h5 style='color:#000'>".$exercise->ex_name."</h5><small class=''>Scheduled: <strong>"
                            // .$date_array['str_month']." ".
                            // $day.", ". 
                            // $year." ".$hour."</strong></small>".
                            //  "<span class='float-right'><strong>Score:</strong> ".$score."/".$total.
                            // "</span></li></p>";    
                        // }
                       }else{
                            echo "<li style='padding: 7px 17px'><h5 style='color:#000'>".$exercise->ex_name."</h5><small class=''>Scheduled: <strong>".
                            $date_array['str_month']." ".
                            $day.", ". 
                            $year." ".$hour."</strong></small>".
                            btn(array(
                                'text'=> "Start Exercise",
                                'class'=>'p-1 float-right',
                                'type'=>'link',
                                'href'=>student_base('take_exercise/?ex_id='.$exercise->id)
                            )).
                            "</li>";
                            $count++;
                       } 
                    //    $count = $count == 0 ? "no" : $count;
                    }
                ?>
                <script>
                    $(document).ready(function () {
                        var count = "<?php echo $count ?>";
                        if (count == 0) {
                            $('#ex-count').hide();
                        }
                        $('#ex-count, #ex-count-head').text("<?php echo $count ?>");
                        // $('#ex-count-head').html("<?php echo $count ?>");
                        // console.log("<?php echo $count ?>");
                        
                    });
                </script>
                </ul>
                <div class="btns text-right">
                    <!-- <button class="btn btn-primary" id="submit-text" type="button">Insert</button> -->
                </div>
            </div>
            <div class="card-footer bg-c-green">
             
            </div>
        </div>
    </div>
</div>
<!-- list-scroll js -->
<script src="<?php echo themf(); ?>bower_components/stroll/js/stroll.js"></script>
<script type="text/javascript" src="<?php echo themf(); ?>pages/list-scroll/list-custom.js"></script>
