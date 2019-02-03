
<?php page_header("Exercises Report") ?>
<div class="row">
    <?php //var_dump($subjects);
    foreach ($subjects as $subject) {
        $lesson_count = $this->db->query('SELECT COUNT(subject_id) AS \'lesson\' FROM lessons WHERE subject_id = '.$subject->subject_id )->result()[0]->lesson;
        card_open($subject->subject_title,"6 col-xl-4");
            echo $lesson_count;
        card_close(" ", "bg-inverse");
    }
    
    ?>
</div>

