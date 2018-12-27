
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo teacher_base(); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Default</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Lessons</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo teacher_base('lessons'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">List</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo teacher_base('lessons/add'); ?>" class="waves-effect waves-dark">
                            <span class="pcoded-mtext">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo teacher_base('subjects'); ?>" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-menu"></i>
                </span>
                <span class="pcoded-mtext">Subjects</span>
            </a>
            </li>
            <li class="">
                <a href="<?php echo teacher_base('your_students'); ?>" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-menu"></i>
                </span>
                <span class="pcoded-mtext">Your Students</span>
            </a>
            </li>
            <li class="">
                <a href="<?php echo teacher_base('quiz'); ?>" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-menu"></i>
                </span>
                <span class="pcoded-mtext">Your Quizes / Exams</span>
            </a>
            </li>
        </ul>