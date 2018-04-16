<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Halaman Administrator</title>

    <!-- Bootstrap CSS -->    
    <link href="css_login/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css_login/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css_login/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css_login/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css_login/css/style.css" rel="stylesheet">
    <link href="css_login/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body background="css_login/bgg.png">

    <div class="container">

      <form class="login-form" action="proses-login.php" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" autofocus name="username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
             <button class="btn btn-danger btn-lg btn-block" type="reset">Reset</button>
        </div>
      </form>

    </div>


  </body>
</html>