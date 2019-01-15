<?php card_open("Select element below.") ?>
<button data-modal="set-time" class="md-trigger btn btn-dark m-1" type="button">Set Time</button>
<button data-modal="set-instruction" class="md-trigger waves-effect btn btn-secondary m-1" type="button">Text</button>
<button data-modal="set-mul-choice"  class="md-trigger btn btn-success m-1" type="button">Multiple Choice</button>
<button data-modal="set-true-false" class="md-trigger btn btn-success m-1" type="button">True or False</button>
<button data-modal="set-written" class="md-trigger btn btn-success m-1" type="button">Written</button>
<?php card_close(); ?>
<form action="" method="post">
<!-- <form action="<?php echo teacher_base('exercise/add')?>" method="post"> -->

<?php card_open('
<div class="row">
    <div class="col-sm-6">
        <input id="ex-title" class="form-control" placeholder="Enter Exercise Title" style="max-width: 500px;" type="text" name="exercise-title" id="exercise-title">
    </div>
    <div class="col-sm-6">
        '.select($subjects, "ex-subject", "id='ex-subject'", "Select Subject").'
    </div>
</div>
') ?>
    <div  id="questions" class="table-responsive">
        <table class="table table-hover">
            <tbody id="ex-elems"></tbody>
        </table>
    </div>
    <input id="ex-submit" type="submit" class="btn btn-primary float-right" value="Save">
</form>
<?php card_close(); ?>

<?php
include "modals/set_instruction.php";
include "modals/set_mul_choice.php";
include "modals/set_time.php";
include "modals/set_written.php";
include "modals/set_true_false.php";

?>
<div class="md-overlay"></div>

<script>
    // Turn off automatic editor creation first.
    // CKEDITOR.disableAutoInline = true;
    // CKEDITOR.inline( 'ex-mc-question' );
        // swiches
    var elemsingle = document.querySelector('.js-single');
    var switchery = new Switchery(elemsingle, { color: '#4099ff', jackColor: '#fff' });
</script>