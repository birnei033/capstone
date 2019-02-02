<?php echo page_header("<strong>Hi there ".teacher_session('name')."! What do you want to do today?</strong>") ?>
<!-- <div class="row">
    <?php card_open("","12","bg-c-green text-white") ?>
    <h4>Hi there <?php echo teacher_session('name')?>! What do you want to do today?</h4>
    <?php card_close(); ?>
</div> -->

<div class="row">
    <?php card_open( "","6 col-xl-4",""   ) ?>
    <div class="row">
            <div class="col-sm-8">
                <h1 class="text-c-red">
                <?php echo $lessons ?>    
                </h1> 
                <h6 class="text-muted m-b-0">Total Lessons Added</h6>
            </div>
            <div class="col-sm-4 text-center">
                <i class="ti-book text-c-red" style="font-size: 49px;"></i>
            </div>
        </div>
    <?php card_close(btn(array(
        'text'=>'<i class="ti-arrow-right"></i>',
        'href'=>teacher_base()."lessons",
        'type'=>"danger \" ".tooltip("Go to lessons"),
        'class'=>'text-c-black'
    ))."|<a href='".teacher_base('lessons/add')."' ".tooltip("Add a Lesson")." class='btn btn-danger'><i class='fa fa-plus'></i></a>", "bg-c-red text-center text-white"); ?>

    <?php card_open("","6 col-xl-4",""   ) ?>
        <div class="row">
            <div class="col-sm-8">
                <h1 class="text-c-yellow">
                    <?php echo $subjects ?>    
                </h1> 
                <h6 class="text-muted m-b-0">Total Subjects Added</h6>
            </div>
            <div class="col-sm-4 text-center">
                <i class="ti-archive text-c-yellow" style="font-size: 49px;"></i>
            </div>
        </div>
    <?php card_close(btn(array(
        'text'=>'<i class="ti-archive"></i>Go to Subjects',
        'href'=>teacher_base()."your_students",
        'type'=>"warning",
        'class'=>'text-c-black'
    )), "bg-c-yellow text-center"); ?>

    <?php card_open("","6 col-xl-4",""   ) ?>
    <div class="row">
            <div class="col-sm-8">
                <h1 class="text-c-green">
                <?php echo $students ?>
                </h1> 
                <h6 class="text-muted m-b-0">Total Students Added</h6>
            </div>
            <div class="col-sm-4 text-center">
                <i class="ti-face-smile text-c-green" style="font-size: 49px;"></i>
            </div>
        </div>    
    <?php card_close(btn(array(
        'text'=>'<i class="ti-write"></i>Go to Students',
        'href'=>teacher_base()."your_students",
        'type'=>"outline-primary btn-primary",
        'class'=>'bg-green'
    )), "bg-c-green text-center"); ?>

    <?php card_open("","6 col-xl-4",""   ) ?>
    <div class="row">
            <div class="col-sm-8">
                <h1 class="text-c-inverse">
                <?php echo $exercises ?>
                </h1> 
                <h6 class="text-muted m-b-0">Total Exercises Added</h6>
            </div>
            <div class="col-sm-4 text-center">
                <i class="ti-write text-c-inverse" style="font-size: 49px;"></i>
            </div>
        </div>    
    <?php card_close(btn(array(
        'text'=>'<i class="ti-arrow-right"></i>',
        'href'=>teacher_base()."exercise/",
        'type'=>"inverse \" ".tooltip("Go to Exercises"),
        'class'=>'text-c-black'
    ))."|<a href='".teacher_base('exercise/add')."' ".tooltip("Add an Exercise")." class='btn btn-inverse'><i class='fa fa-plus'></i></a>"
    ."|".btn(array(
        'text'=>'<i class="ti-archive"></i>',
        'href'=>teacher_base()."exercise/report",
        'type'=>"inverse \" ".tooltip("View report"),
        'class'=>'text-c-black'
    )), "bg-inverse text-center"); ?>

<?php card_open("","12 col-xl-8",""   ) ?>
    <div class="row">
            <div class="col-sm-12">
                <ul class="notification basic-list" style="max-height: 388px; overflow-x: auto; list-style: none; padding: 0;">
                
                </ul>
            </div>
        </div>    
    <?php card_close(); ?>
</div>
