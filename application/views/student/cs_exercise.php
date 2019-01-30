<?php
var_dump(json_decode("{}"));
$start_date = json_decode($preview[0]->ex_schedule)->start_date;
if ($start_date != 0) {
    $start_date_array = explode('-',$start_date);
    $start_date_year = $start_date_array[0];
    $start_date_month = $start_date_array[1];
    $start_date_day = explode('T',$start_date_array[2])[0];
    $start_date_hour = explode(':', explode('T',$start_date_array[2])[1])[0];
    $start_date_minute = explode(':', explode('T',$start_date_array[2])[1])[1];
}else{
    $start_date_array = 0;
    $start_date_year = 0;
    $start_date_month = 0;
    $start_date_day = 0;
    $start_date_hour = 0;
    $start_date_minute = 0;
}
    $end_date = json_decode($preview[0]->ex_schedule)->end_date;
if ($end_date != 0) {
    $end_date_array = explode('-',$end_date);
    $end_date_year = $end_date_array[0];
    $end_date_month = $end_date_array[1];
    $end_date_day = explode('T',$end_date_array[2])[0];
    $end_date_hour = explode(':', explode('T',$end_date_array[2])[1])[0];
    $end_date_minute = explode(':', explode('T',$end_date_array[2])[1])[1];
}else{
    $end_date_array = 0;
    $end_date_year = 0;
    $end_date_month = 0;
    $end_date_day = 0;
    $end_date_hour = 0;
    $end_date_minute = 0;
}
var_dump($end_date_minute);
// var_dump($end_date) 
?>
<?php page_header($preview[0]->ex_name, "text-center"); ?>
<?php card_open("",12,'exercise exercise-'.$preview[0]->id) ?>
<form action="<?php echo teacher_base('exercise') ?>" method="post">
    <div class="table-responsive">
        <table class="table">
        <tbody>
            <?php echo $preview[0]->ex_questions ?>
        </tbody>
        </table>
        <button id="ex_submit" sub-id="<?php echo $preview[0]->subject_id ?>" ex-id="<?php echo $preview[0]->id ?>" type="button" name="ex_submit" value="submit" class="btn btn-primary float-right">Submit</button>
</form>
</div>

<?php card_close() ?>

<script>

        const start_date = {
            year:   '<?php echo $start_date_year ?>',
            month:   '<?php echo $start_date_month ?>',
            day:   '<?php echo $start_date_day ?>',
            hour:   '<?php echo $start_date_hour ?>',
            minute:   '<?php echo $start_date_minute ?>'
        };
        const end_date = {
            year:   '<?php echo $end_date_year ?>',
            month:   '<?php echo $end_date_month ?>',
            day:   '<?php echo $end_date_day ?>',
            hour:   '<?php echo $end_date_hour ?>',
            minute:   '<?php echo $end_date_minute ?>'
        };
    $(document).ready(function () {
        
    });
</script>