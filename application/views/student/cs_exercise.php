<?php
$start_date = json_decode($preview[0]->ex_schedule)->start_date;
$end_date = json_decode($preview[0]->ex_schedule)->end_date;
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
    $(document).ready(function () {
        var now = new Date();
        var start_date = '<?php echo $start_date ?>';
        var end_date = '<?php echo $end_date ?>';
        var millisTill10 = new Date(2019, 0, 30, 14, 0, 0, 0) - now;
        if (millisTill10 < 0) {
            alert("go now");
            millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
        }else if(millisTill10 > 0){
            console.log("running pa");
        }
        setTimeout(function(){alert("Time's up")}, millisTill10);
    });
</script>