<body>

<section id="container" >


<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.php" class="logo">
        <img src="images/Slogo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div style="display:none;" class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">You have 8 pending tasks</p>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>25% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Product Delivery</h5>
                                <p>45% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Payment collection</h5>
                                <p>87% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>33% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
	
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!--li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li-->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" id ='logouter' class="dropdown-toggle" href="#">
                <img width="29" height="29" alt="" src="images/Female_User.png">
                <span class="username"><?=$_SESSION["user"]?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <!--li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li-->
                <li><a   href="javascript:;"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <!--li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li-->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
 <?php require_once("views/menu_sinistra.php");?> 
<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div id="modale"></div>
            <div id="module">
			 <?php
			// if (isset ($_GET["c"])) require_once ("views/calendarTest.php");
			require_once("views/calendar.php");
			 ?> 
			</div>
       <!-- page end-->
        </section>
    </section>
    <div class="plizwait"><!-- Place at bottom of page --></div>
	    <!--Modal logout -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_logout" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><span name="lbl" caption="Scegli la Lettera">Logout</span></h4>
            </div>
            <div class="modal-body">
			Siete sicuri di voler effettuare il logout ?<br>
			Così facendo verranno persi tutti i cambiamenti non salvati.<br><br>
                 <a href="index.php?logout=1" id="YES"  class="btn btn-warning btn-sm "><span name="lbl" caption="Edit">Si</span></a>
                 <a href="javascript:;" id="NO" data-dismiss="modal" class="btn btn-warning btn-sm "><span name="lbl" caption="No">No</span></a>
            </div>
        </div>
    </div>
</div>
<!--/Modal-->
<!--main content end-->


</section>
     <!-- Placed js at the end of the document so the pages load faster -->
        <!--Core js-->


<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>


<!--script src="js_sw/demone.js"></script-->
 <script>
    jQuery(document).ready(function() {
		$("#logouter").click(function (){
			//localStorage.setItem('id_interesse', $(this).attr("id"));
			$("#modal_logout").modal('show');
			
		});
        
        
        $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
         ajaxStop: function() { $body.removeClass("loading"); }    
    });
        
        
		});
		</script>
</body>

</html>  

    