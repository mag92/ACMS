﻿<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Messages - ACMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo "/acms/assets/css/AdminLTE.css"; ?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.min.css"; ?>"  rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.css"; ?>"  rel="stylesheet">
   
    <!-- Custom CSS -->
    <link href="<?php echo "/acms/assets/css/custom.css"; ?>"  rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/responsive-tables.css"; ?>"  rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap-toggle.min.css"; ?>"  rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:0px; width:100%; background-color: #337ab7; color: white"  role="navigation">
        <div class="container" style="text-align:center">
            <a class="navbar-brand acms" href="student_home.html">ACMS</a>
        </div>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="text-align:center">
                <button type="button" style="border:none; position:relative; text-align:center" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-chevron-down" style="color:white"></span>
                </button>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="text-align:center; margin: 0 auto; float:none; border:none">
                <ul class="nav navbar-nav" style="text-align:center; display:inline-block; margin: auto; float:none; border:none">
                    <li style="text-align:center" class="li li-collapsed">
                        <a href="/acms/professor"><span class="header-item"> Attendance </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="/acms/professor/announcements"><span class="header-item"> Make an Announcement </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="/acms/professor/messages"><span class="header-item"> Messages </span></a>
                    </li>
                    <!--<li style="text-align:center" class="li-collapsed">
                        <a href="student_responses.html"><span class="header-item"> Responses </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="student_schedule.html"><span class="header-item"> Schedule </span></a>
                    </li>-->
                    <li style="text-align:center" class="li-collapsed">
                        <a href="#"><span class="header-item"> Buses </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="/acms/index.php/logout"><span class="header-item"> Logout </span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" style="margin-top:80px">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12" style="text-align:center">
                <h1 class="page-header">Hello, Prof. <?= $_SESSION['name']; ?></h1>
            </div>
        </div>
        <div style="text-align:center">
            <h5 style="display:inline">Allow students to send you messages?&nbsp;&nbsp;</h5>
            <input type="checkbox" id="message-allow" data-toggle="toggle" data-offstyle="danger" data-onstyle="success" data-on="Yes" data-off="No">
        </div>
        
        <div id="messages" style="margin-top:20px;">
            <div class="col-md-6 portfolio-item" style="width:100%">
                
                <?php
                foreach($messages as $message)
                {
                    ?>
                
                <div class="box box-danger" style="position:relative">
                    <div class="announcement">
                        <p style="display:inline;"><small>from: </small><?=$message->sender_name?><small style="font-size:10px"><!--(id: 15x22)--></small></p>
                        <p style="float:right; font-size:15px; margin-right:10px;"> 2 Days Ago</p><br />
                        <span> - </span> <span style="font-size:20px;"><?=$message->body?></span>
                        <button class="btn btn-success" style="position:absolute; right:5px; font-size:12px" onclick="showMessaege('1')">Respond</button>
                    </div>
                </div>

                <div id="response1" style="position:relative; display:none">
                    <div class="row">
                        <form class="col-lg-6 text-center" style="margin-bottom: 5px" method="post">
                            <textarea name="message" style="min-height:50px; width:80%; margin-top:5px;" rows="8"></textarea> <br />
                            <input type="hidden" value="<?=$message->id?>" name="messageid">
                            <input class="btn btn-primary" type="submit" value="Send!" />
                        </form>
                    </div>
                    </div> 
                <?php
                }
                ?>
<!--                <div class="box box-danger" style="position:relative">
                    <div class="announcement">
                        <p style="display:inline;"><small>from: </small>Hassan Ibrahim &nbsp;<small style="font-size:10px">(id: 15x22)</small></p>
                        <p style="float:right; font-size:15px; margin-right:10px;"> 5 Days Ago</p><br />
                        <span> - </span> <span style="font-size:20px;">What about the next lecture's task?</span>
                        <button class="btn btn-success" style="position:absolute; right:5px; font-size:12px" onclick="showMessaege('2')">Respond</button>
                    </div>
                </div> /.box 
                <div id="response2" style="position:relative; display:none">
                    <div class="row">
                        <form class="col-lg-6 text-center" style="margin-bottom: 5px">
                            <textarea name="message" style="min-height:50px; width:80%; margin-top:5px;" rows="8"></textarea> <br />
                            <input class="btn btn-primary" type="submit" value="Send!" />
                        </form>
                    </div>
                </div> -->


            </div>

       
            </div>
        <!-- Footer -->
        
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo "/acms/assets/js/jquery.js"; ?>" ></script>
    <script src="<?php echo "/acms/assets/js/responsive-tables.js"; ?>" ></script>
    <script src="<?php echo "/acms/assets/js/custom.js"; ?>" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo "/acms/assets/js/bootstrap.min.js"; ?>" ></script>
    <script src="<?php echo "/acms/assets/js/bootstrap-toggle.min.js"; ?>" ></script>

</body>

</html>
