<?php
include 'conn.php';
ob_start();
 error_reporting(0);
 ?>


<?php
$message="";

session_start();
	if (isset($_POST['btn_login']) && !empty($_POST['txt_username']) && !empty($_POST['txt_password'])) {
           
        $username=$_POST['txt_username'];
        $password=MD5($_POST['txt_password']);
        
        $username=stripslashes($username);
        $password=stripslashes($password);
        
        $username = mysqli_real_escape_string($link,$username);
        $password = mysqli_real_escape_string($link,$password);

		$sql = "SELECT * FROM user_master WHERE user_nme = '$username' and password = '$password' and finact=0";
		$result = mysqli_query($link,$sql);
		while($row=mysqli_fetch_array($result)){

		   $unme=$row['user_nme'];
		   $pass=$row['password'];
		   $ukey=$row['usermaster_key'];
		   $user_level=$row['user_level'];
		 
		}
    
		if($unme == $username && $pass == $password){
			if($password=="8af95fe2ab1a54b488ef8efb3f3b0797"){ //9900
                    $flag="true";
                    $_SESSION['login_user'] = $username;
                    $_SESSION['user_level'] = $user_level;
					$_SESSION['user_keye'] = $ukey;

                    header("location:newpassword.php");
                    session_register("username","user_level","user_keye");
            }
            else{
                    $_SESSION['login_user'] = $username;
                    $_SESSION['user_level'] = $user_level;
					$_SESSION['user_keye'] = $ukey;
					
                    header("location:home.php");
                    session_register("username","user_level","user_keye");
            }
        }
		else{
			$message = "Your UserName or Password is invalid";
		}
		
	}
	else{
        
        $message = "Login";
        
	}
      


?>

<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
		<link rel="stylesheet" media="screen" href="css/common.css">
        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(images/a2.jpg);">
        <br>
		<br>
        <div class="container">
			
            <div class="row">
				<div class="col-lg-8 col-sm-3 col-md-9">
				</div>
                <div class="col-lg-3 col-sm-6 col-md-3">
					<section class="panel-primary panel-transparent">
						<div class="panel-body">
								<form method="post" >
									<?php
									if($message==""){
									?>
								
										<h3>Login</h3>
									
									<?php
									}
									else{
									?>
									
									  <h3><?php echo $message; ?></h3>
									
								   <?php
									}
								   ?>
									
									<div class="form-group">
										<input class="form-control" type="text" name="txt_username" placeholder="Username">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="txt_password" placeholder="Password">
									</div>
									
									<button class="btn btn-lg btn-primary btn-block" name='btn_login' type="submit">Login</button>
								</form>
							</div>
					</section>
                </div>
				<div class="col-lg-1 col-sm-3 col-md-9">
				</div>
            </div>
        </div>

       <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var alert = $('.alert');
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));

                if (isNaN(alertPadding)) {
                    alertPadding = parseInt($(alert).css('padding-left'));
                }

                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>
