<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="<?php echo "/acms/assets/css/bootstrap.css"; ?>" />

</head>
<body>
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">ACMS Login</div>
					</div>
					
					<div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="login" class="form-horizontal" role="form" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="university email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <input type="submit" id="btn-login" href="#" class="btn btn-success" onclick="document.getElementById('login').submit()" value="Login">
                                     

                                    </div>
                                </div>
                            </form>     



                        </div>                     
                    </div>  
        </div>

<script type="text/javascript" src="<?php echo "/acms/assets/js/jquery-2.2.0.js"; ?>"></script>
<script type="text/javascript" src="<?php echo "/acms/assets/js/bootstrap.js"; ?>"></script>

</body>
</html>

