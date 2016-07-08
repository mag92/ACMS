<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $_SESSION['name']; ?> - ACMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo "/acms/assets/css/AdminLTE.css"; ?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.min.css"; ?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.css"; ?>" rel="stylesheet">
   
   
    <!-- Custom CSS -->
    <link href="<?php echo "/acms/assets/css/custom.css"; ?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/responsive-tables.css"; ?>" rel="stylesheet">

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
                <h1 class="page-header">Hello, Prof. <?= $_SESSION['name']; ?></h1>
            </div>
        </div>


        <!-- /.row -->

        <!-- Projects Row -->
      
      

        <!-- Pagination -->
        <div>
                  <div class="dropdown text-center" style="z-index:30; position:relative">
                        <input class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="true" value="Choose a Course" />
                          
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="position:absolute">
                            <?php
                            foreach ($courses as $course)
                                {
                                ?>
                            <li role="presentation"><a id="xx<?php echo $course->id; ?>" role="menuitem" tabindex="-1" href="#" onclick="show_attendance('<?=$course->id?>')"><?=$course->name?></a></li>
                             <?php
                            
                                }
                            ?>
                                 </ul>
  
                    </div>
        </div>
        <h6 class="my_hint" style="text-align:center; color:#ff5151; display:none">Scroll left and right in both names and attendance fields</h6>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="attendance_table" style="z-index:20;position:relative ;display:none">
            <table class="table table-bordered table-hover responsive">
                <thead style="text-align:center">
                    <tr>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">no.</th>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center">15/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">4/1</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">25/1</th>
                        <th style="text-align:center">7/2</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">18/12</th>
                        <th style="text-align:center">Total</th>
                    </tr>
                </thead>
                <tbody style="font-size:11px;">
                    <?php
                    foreach ($students as $student)
                    {
                        ?>
                    <tr>
                        <td><?=$student->name?></td>
                        <td>1</td>
                        <td>x12e</td>
                        <td><span class="glyphicon glyphicon-ok"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td><span class="glyphicon glyphicon-remove"></span></td>
                        <td>1/10 (10%)</td>
                    </tr>
                            <?php
                            
                    }
                         ?>
                    


            </table>
        </div>

       

        <!-- Footer -->
        
    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo "/acms/assets/js/jquery.js";?>"></script>
    <script src="<?php echo "/acms/assets/js/responsive-tables.js";?>"></script>
    <script src="<?php echo "/acms/assets/js/custom.js";?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo "/acms/assets/js/bootstrap.min.js";?>"></script>

</body>

</html>
