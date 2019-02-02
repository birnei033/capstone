<?php echo page_header("Exercise Report"); ?>
<div class="row">
<?php
    foreach ($subjects as $subject) {
        card_open("Subject: <strong>". strtoupper($subject->subject_title)."</strong>","12");
        ?>
        <div class="table-responsive">
        <table id="" class="report table-hover table table-light">
                        <thead>
                            <tr>
                                
                                <th style="min-width: 157px">Exercise Name</th>
                                <th>Name of Student</th>
                                <th style="min-width: 90px">Score</th>
                                <th>Dated</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php
            $count = 1;
        foreach ($results as $result){
            if ($result->subject_id == $subject->subject_id) {
                ?>
                            <tr>
                                
                                <td>
                                    <?php echo "<small hidden >".$count."</small>". strtoupper($result->ex_name) ?>
                                </td>
                                <td>
                                    <?php 
                                        echo strtoupper($result->student_full_name);
                                    ?>
                                </td>
                                    <td>
                                    <?php  echo $result->ex_score.'/'.$result->ex_total_item ?>
                                </td>
                                </td>
                                    <td>
                                    <?php  echo $result->date_exercise_taken ?>
                                </td>
                                </td>
                                    <td>
                                    <a class="btn btn-inverse  pl-3 pb-1 pt-1 pr-4" href="<?php echo teacher_base('/?action=view quiz result&cs_id='.$result->cs_id.'&ex_id='.$result->ex_id) ?>" <?php  echo tooltip("View full details")?>><i class="ti-eye"></i> View</a>
                                </td>
                            </tr>
                       
                <?php
                $count++;
            }
        }
        ?>
         </tbody>
                    </table></div>
        <?php
            
        card_close(" ", "bg-inverse"); 
        
    }
?>
</div>
<script>
$(document).ready(function () {
    $('.report').dataTable();
});
</script>
