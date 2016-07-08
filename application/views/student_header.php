<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?> - ACMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo "/acms/assets/css/AdminLTE.css";?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.min.css";?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.css";?>" rel="stylesheet">
   
    <!-- Custom CSS -->
    <link href="<?php echo "/acms/assets/css/custom.css";?>" rel="stylesheet">
    
    

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
                        <a href="<?php echo base_url(); ?>"><span class="header-item"> Attendance </span></a>
                    </li>
                    <li  style="text-align:center" class="li-collapsed">
                        <a href="<?php echo site_url("student/announcements"); ?>"><span class="header-item"> Announcements </span></a>
                    </li>
                    <li  style="text-align:center" class="li-collapsed">
                        <a href="<?php echo site_url("student/messages"); ?>"><span class="header-item"> Send a message </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="<?php echo site_url("student/responses"); ?>"><span class="header-item"> Responses </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="#"><span class="header-item"> Schedule </span></a>
                    </li>
                    <li style="text-align:center" class="li-collapsed">
                        <a href="/acms/buses"><span class="header-item"> Buses </span></a>
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
                <h1 class="page-header">Hello, <?= $_SESSION['name']; ?></h1>
            </div>
        </div>
        <!-- /.row -->
