<?php
$start_date = json_decode($preview[0]->ex_schedule)->start_date;
// var_dump(json_encode(date_array($start_date)));
$end_date = json_decode($preview[0]->ex_schedule)->end_date;

// var_dump($end_date_minute);
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
<?php echo loader_modal('exercise-loader'); ?>
<script>
    const start_date = JSON.parse('<?php echo json_encode(date_array($start_date)) ?>');
    const end_date = JSON.parse('<?php echo json_encode(date_array($end_date)) ?>');
</script>