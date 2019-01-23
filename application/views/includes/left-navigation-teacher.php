
                
<ul class="pcoded-item pcoded-left-item">
    <?php
        nav_item(array(
            'title'=>'Dashboard',
            'link'=>teacher_base()
        ));

        nav_item(array(
            'drop'=>true,
            'title'=>"Lessons",
            'icon'=>'ti-book',
            'list'=>array(
                'View All' => array(
                    'link' => teacher_base('lessons')
                ),
                'Add' => array(
                    'link' => teacher_base('lessons/add')
                ),
            ),
        ));
        nav_item(array(
            'title'=>'Subjects',
            'link'=>teacher_base('subjects'),
            'icon'=>'ti-archive'
        ));
        nav_item(array(
            'title'=>'Your Students',
            'link'=>teacher_base('your_students'),
            'icon'=>'ti-face-smile'
        ));
        nav_item(array(
            'drop'=>true,
            'title'=>'Exercises',
            'icon'=>'ti-write',
            'list'=>array(
                'View All'=>array(
                    'link'=>teacher_base('exercise/'),
                ),
                'Add'=>array(
                    'link'=>teacher_base('exercise/add')
                )

            ),
        ));
    ?>
</ul>