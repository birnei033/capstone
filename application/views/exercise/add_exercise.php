<link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>pages/list-scroll/list.css">
<link rel="stylesheet" type="text/css" href="<?php echo themf(); ?>bower_components/stroll/css/stroll.css">
<?php card_open("Select element below.") ?>
<button data-modal="set-time" class="md-trigger btn btn-dark m-1" type="button">Set Time</button>
<!-- <button data-modal="set-instruction" class="md-trigger waves-effect btn btn-secondary m-1" type="button">Text</button> -->
<button data-modal="set-mul-choice"  class="md-trigger btn btn-success m-1" type="button">Multiple Choice</button>
<button data-modal="set-true-false" class="md-trigger btn btn-success m-1" type="button">True or False</button>
<button data-modal="set-written" class="md-trigger btn btn-success m-1" type="button">Written</button>
<input id="ex-submit" type="submit" class="btn btn-primary float-right" value="Save">
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
',"","card-center") ?>
    <div  id="questions" class="table-responsive">
        <div id="timer-wrapper" class="text-center mb-4">
        
        </div>
        <style>
        #clock-icon{
            background-image: url(<?php echo images('alarm-clock.png') ?>);
        }
  </style>
        <table class="table ">
            <tbody id="ex-elems" >
                <tr>
                    <td class="p-0">
                        <table class="table table-hover">
                            <tbody id="ex-elems-m-choice"></tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="p-0">
                        <table class="table table-hover">
                            <tbody id="ex-elems-tf"></tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="p-0">
                        <table class="table table-hover">
                            <tbody id="ex-elems-written"></tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
 
</form>
<?php card_close(); ?>

<?php
include "modals/set_instruction.php";
include "modals/set_mul_choice_1.php";
include "modals/set_time.php";
include "modals/set_written.1.php";
include "modals/set_true_false.1.php";

?>
<div class="md-overlay"></div>

<script>
    // Turn off automatic editor creation first.
    // CKEDITOR.disableAutoInline = true;
    // CKEDITOR.inline( 'ex-mc-question' );
        // swiches
        $(document).ready(function () {
            // var elemsingle = document.querySelector('.js-single');
            // var switchery = new Switchery(elemsingle, { color: '#4099ff', jackColor: '#fff' });
        });
</script>

<!-- Accordion js -->
<script type="text/javascript" src="<?php echo themf() ?>pages/accordion/accordion.js"></script>
<script src="<?php echo themf(); ?>bower_components/stroll/js/stroll.js"></script>
<script type="text/javascript" src="<?php echo themf(); ?>pages/list-scroll/list-custom.js"></script>