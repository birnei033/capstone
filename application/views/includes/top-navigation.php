
<nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div  class="navbar-logo">
                        <a <?php echo tooltip('Hide Navigation') ?> class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="feather icon-toggle-right"></i>
                    </a>
                    <a href="<?php echo base_url() ?>">
                        <img width="36" class="img-fluid" src="<?php echo images('hccs_logo.png'); ?>" alt="" /><span> HCCSI eLearning</span>
                    </a>
                        <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <!-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                                    </div>
                                </div>
                            </li> -->
                            <li>
                                <a <?php echo tooltip('Toggle Full Screen') ?> href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span id="bandge-notif-count" class="badge bg-c-red">5</span>
                                    </div>
                                    <ul id="notification" style="max-height: 388px; overflow-x: auto;" class="show-notification notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        
                                        
                                        <!-- <li>
                                            <div class="media">
                                                <img class="img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                    <script>
                                        $(document).ready(function () {
                                            function update_notif(){
                                                var o = '';
                                                o  += '<li>';
                                                o  += '<h6>Notifications</h6>';
                                                // o  += '<label class="label label-danger">New</label>';
                                                o  += '</li>';
                                                $('.notification').html(o);
                                                $.ajax({
                                                    type: "GET",
                                                    url: '<?php echo api_base() ?>/teacher/ajax_finished_exercises/exercise_answers/<?php echo teacher_session("id"); ?>/?checked=0',
                                                    // data: "data",
                                                    dataType: "JSON",
                                                    success: function (response) {
                                                        var answers = response.ex_cs_answers;
                                                        $('#bandge-notif-count').html(answers.length);
                                                        // console.log(answers);
                                                        for (let i = 0; i < answers.length; i++) {
                                                            var subject = answers[i].student_subject;
                                                            var cs_name = answers[i].student_name;
                                                            var ex_name = answers[i].ex_name;
                                                            var cs_id = answers[i].cs_id;
                                                            var ex_id = answers[i].ex_id;
                                                            var message = answers[i].student_name+" has finished the quiz/exam ("+ex_name+").";
                                                            var out = '<li><a href="<?php echo teacher_base(); ?>?action=view quiz result&cs_id='+cs_id+'&ex_id='+ex_id+'">';
                                                            out += '<div class="media">';
                                                            // out += '<img class="img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" alt="Generic placeholder image">';
                                                            out += '<div class="media-body">';
                                                            out += '<h5 class="notification-user"><strong>['+subject+'] '+cs_name+'</strong></h5>';
                                                            out += '<p class="notification-msg">'+message+'</p>';
                                                            out += '</div>';
                                                            out += '</div>';
                                                            out += '</a></li>';
                                                        $('.notification').append(out);
                                                        }
                                                    }
                                                });
                                            }
                                            update_notif()
                                            setInterval(function(){update_notif()}, 30000);
                                            });
                                    </script>
                                </div>
                            </li>
                            <!-- <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li> -->
                           
                            <?php if(isset($this->session->userdata['logged_in'])) { ?>
                             <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- <img src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> -->
                                        <span><?php echo $this->session->userdata['logged_in']['name'] ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <!-- <li>
                                            <a href="#!">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                            <i class="feather icon-mail"></i> My Messages
                                        </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                            <i class="feather icon-lock"></i> Lock Screen
                                        </a>
                                        </li> -->
                                        <li>
                                            <a href="<?php echo teacher_base('login/logout')?>">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                        </li>
                                    </ul>
                                </div> 
                             </li> 
                            <?php }else{?>
                            <li>
                                <?php echo anchor('admin', 'Login', array('class'=>'btn btn-primary')) ?>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- [ Header ] end -->
            
            <!-- [ Header ] start -->
            <!-- [ chat user list ] start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                <i class="feather icon-x"></i>
                            </a>
                                <div class="right-icon-control">
                                    <form class="form-material">
                                        <div class="form-group form-primary">
                                            <input type="text" name="footer-email" class="form-control" id="search-friends" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">
                                            <i class="feather icon-search m-r-10"></i>Search Friend
                                        </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                    <img class="media-object img-radius img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-3.jpg" alt="Generic placeholder image ">
                                    <div class="live-status bg-success"></div>
                                </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2" data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3" data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-4.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4" data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-3.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-default"></div>
                                </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5" data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="<?php echo base_url(); ?>assets/themf/images/avatar-2.jpg" alt="Generic placeholder image">
                                    <div class="live-status bg-default"></div>
                                </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ chat user list ] end -->

            <!-- [ chat message ] start -->
            <!-- <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                    <i class="feather icon-x"></i> Josephin Doe
                </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url(); ?>assets/themf/images/avatar-2.jpg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="<?php echo base_url(); ?>assets/themf/images/avatar-2.jpg" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <form class="form-material">
                            <div class="form-group form-primary">
                                <input type="text" name="footer-email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">
                                <i class="feather icon-search m-r-10"></i>Share Your Thoughts
                            </label>
                            </div>
                        </form>
                        <div class="form-icon ">
                            <button class="btn btn-success btn-icon  waves-effect waves-light">
                            <i class="feather icon-message-circle"></i>
                        </button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- [ chat message ] end -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
              