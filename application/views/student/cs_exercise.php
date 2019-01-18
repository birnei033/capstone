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

