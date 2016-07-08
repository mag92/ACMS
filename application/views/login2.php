<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo "/acms/assets/css/AdminLTE.css";?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.min.css";?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/bootstrap.css";?>" rel="stylesheet">
   
    <!-- Custom CSS -->
    <link href="<?php echo "/acms/assets/css/custom.css";?>" rel="stylesheet">
    <link href="<?php echo "/acms/assets/css/stylish-portfolio.css";?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>

<body >

    
    <header id="top" class="header">
        <div class="text-vertical-center" style="position:relative">
            <div style="font-family:Ailerons; color:white; letter-spacing:10px; font-style:normal; font-size:100px;"> ACMS </div>
            <div id="description" class="text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Quisque feugiat tincidunt erat sed ullamcorper. Fusce aliquet justo a pretium molestie.
                Donec commodo pretium nisl, nec suscipit nisi vehicula id. Curabitur neque ipsum,
                dapibus a vestibulum ut, porttitor sit amet orci. Mauris sed nulla luctus, rutrum ipsum id,
            </div>
        </div> 
        
        <div class="container" id="login-forms" style="font-family:Helvetica1; margin-top:20px">
            <div class="row">
                <div>
                    <h3 style="text-align:center">
                        Login
                    </h3>
                    <div class="col-bg-6 col-md-6 col-sm-8 box trans text-center" >

                        <!-- form start -->
                        <form id = "login" role="form" method="post">
                            <div class="box-body" style="background-color:rgba(0, 0, 0, 0.25); width:100%">
                                <div class="form-group " style="text-align:center; width:100%; display:none">*Wrong username and password combination!</div>
                                <div class="form-group " style="text-align:center">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="email" class="form-control" style="text-align:center; color:#337ab7" id="exampleInputEmail1" placeholder="Enter Username">
                                </div>
                                <div class="form-group" style="text-align:center">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" style="text-align:center; color:#337ab7" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <div class="checkbox" >
                                    <label style="float: left">
                                        <input type="checkbox" id="rememberMe"> Remember Me!
                                    </label>
                                    <input class="btn btn-default btn-submit" id="teacher-login" type="submit" value="Login"/>

                                </div>
                            </div><!-- /.box-body -->

                        </form>
                    </div><!-- /.box -->


                </div>
            </div>
        </div>
       
    </header>
    

    <script src="<?php echo "/acms/assets/js/jquery.js";?>"></script>
    <script src="<?php echo "/acms/assets/js/custom.js";?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo "/acms/assets/js/bootstrap.min.js";?>"></script>

</body>

</html>
