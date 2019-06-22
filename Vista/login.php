<?php
require'../Modelo/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="assets/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}
footer {
  background-color: black;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: white;
}
        
    </style>
        
</head>

<body>

    <div class="container">
        <div class="row">
       
            <div class="col-md-4 col-md-offset-4">
           
                <div class="login-panel panel panel-default">
                <?php
				if(isset($errMsg)){
					echo '<div class="alert alert-danger">'.$errMsg.'</div>';
                }
                
                               
			?>
                    <div class="panel-heading">
                        <h3 class="panel-title">Por Favor inicia Sesión</h3>
                    </div>
                    <div style=" border: solid 1px #006D9C; " align="left">
			
                    <div class="panel-body">
                        <form role="form"  method="post" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="usuario" name="usuario" id="usuario" type="text" autofocus />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" >
                                </div>                               
                                <input type="submit" name="login"class="btn btn-lg btn-success btn-block" value="Ingresar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container">
          <div class="row row-30">
              <div class="col-md-3 col-xl-5"></div>
            <div class="col-md-6 col-xl-5">
                <h4 style="color:white">
                    Desarrollado por MIguel Angel Zha&#241;ay Guam&#224;n
                </h4>
                <!-- Rights-->
              </div>
              <div class="col-md-3 col-xl-5">
            </div>
            
            
          </div>
        </div>
        </footer>
    <!-- Login -->
    <script src="assets/js/login.js"></script>
    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
